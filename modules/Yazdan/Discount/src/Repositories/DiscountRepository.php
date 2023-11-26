<?php

namespace Yazdan\Discount\Repositories;

use Morilog\Jalali\Jalalian;
use Yazdan\Discount\App\Models\Discount;

class DiscountRepository
{

    const TYPE_ALL = "all";
    const TYPE_SPECIAL = "special";
    public static $types = [
        self::TYPE_ALL,
        self::TYPE_SPECIAL
    ];

    // get discounts functions
    public static function find($id)
    {
        return Discount::query()->find($id);
    }

    public static function findByCode($code)
    {
        return Discount::query()->where('code',$code)->first();
    }

    public static function paginateAll()
    {
        return Discount::query()->latest()->paginate();
    }

    // DB functions
    public static function store($data)
    {
        $discount = Discount::query()->create([
            "user_id" => auth()->id(),
            "code" => $data["code"],
            "percent" => $data["percent"],
            "usage_limitation" => $data["usage_limitation"],
            "max_amount" => $data["max_amount"],
            "quantity_limitation" => $data["quantity_limitation"],
            "expire_at" => $data["expire_at"] ? Jalalian::fromFormat("Y/m/d H:i", $data["expire_at"])->toCarbon() : null,
            "type" => $data["type"],
            "uses" => 0
        ]);

        if ($discount->type == self::TYPE_SPECIAL) {
            if(isset($data['courses'])) $discount->courses()->sync($data["courses"]);
            if(isset($data['products'])) $discount->products()->sync($data["products"]);
        }
    }

    public static function update($id, array $data)
    {
        Discount::query()->where("id", $id)->update([
            "code" => $data["code"],
            "percent" => $data["percent"],
            "usage_limitation" => $data["usage_limitation"],
            "max_amount" => $data["max_amount"],
            "quantity_limitation" => $data["quantity_limitation"],
            "expire_at" => $data["expire_at"] ? Jalalian::fromFormat("Y/m/d H:i", $data["expire_at"])->toCarbon() : null,
            "type" => $data["type"],
        ]);

        $discount = self::find($id);
        if ($discount->type == self::TYPE_SPECIAL) {
            isset($data['courses']) ? $discount->courses()->sync($data["courses"]) : $discount->courses()->sync([]);;
            isset($data['products']) ? $discount->products()->sync($data["products"]) : $discount->products()->sync([]);
        } else {
            $discount->courses()->sync([]);
            $discount->products()->sync([]);
        }
    }

    public static function getValidDiscountByCode($code, $product)
    {
        $id = $product->id;
        $table = $product->getTable();
        $query = Discount::query()
            ->where("code", $code);
            $query->where(function ($query) {
                $query->where("expire_at", ">", now())
                    ->orWhereNull("expire_at");
            });
            $query->where(function ($query) use ($id,$table) {
                return $query->whereHas($table, function ($query) use ($id) {
                    return $query->where("id", $id);
                })->orWhereDoesntHave('products')->whereDoesntHave('courses');

            })
            ->where(function ($query) {
                $query->where("usage_limitation", ">", "0")
                    ->orWhereNull("usage_limitation");
            });
            return $query->first();
    }

    public static function getValidCode($code)
    {
        $query = Discount::query()
            ->where("code", $code);
            $query->where(function ($query) {
                $query->where("expire_at", ">", now())
                    ->orWhereNull("expire_at");
            })
            ->where(function ($query) {
                $query->where("usage_limitation", ">", "0")
                    ->orWhereNull("usage_limitation");
            });
            return $query->first();
    }
}
