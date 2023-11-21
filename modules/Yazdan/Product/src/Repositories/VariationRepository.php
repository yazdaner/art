<?php

namespace Yazdan\Product\Repositories;

use Yazdan\Product\App\Models\Variation;

class VariationRepository
{
    public static function getProductVariations($productId)
    {
        return Variation::where('product_id', $productId)->get();
    }

    public static function store($data)
    {
        Variation::create([
            'product_id' => $data->product_id,
            'title' => $data->title,
            'quantity' => $data->quantity,
            'price' => $data->price,
            'price2' => $data->price2 ?? null,
            'sku' => $data->sku,
        ]);
    }

    public static function update($id, $data)
    {
        Variation::whereId($id)->update([
            'title' => $data->title,
            'quantity' => $data->quantity,
            'price' => $data->price,
            'price2' => $data->price2 ?? null,
            'sku' => $data->sku,
        ]);
    }
}
