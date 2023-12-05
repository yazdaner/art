<?php

namespace Yazdan\Course\App\Models;

use App\Models\User;
use Yazdan\Media\Traits\HasMedia;
use Yazdan\Media\Traits\HasVideo;
use Yazdan\Media\App\Models\Media;
use Yazdan\Comment\Trait\HasComments;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Payment\Traits\BuyDigitalProductTrait;

class Course extends Model
{
    use HasComments,HasMedia,HasVideo,BuyDigitalProductTrait;

    protected $guarded = [];
    protected $appends = ['sale_check'];

    public function incrementReadCount() {
        $this->views++;
        return $this->save();
    }

    public function path()
    {
        return route('courses.show',$this->slug);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPrice()
    {
        return $this->price2 ?? $this->price;
    }

    public function getSaleCheckAttribute() : bool
    {
        return $this->price2 != null ? true : false;
    }
}
