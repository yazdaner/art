<?php

namespace Yazdan\Product\App\Models;

use Yazdan\Media\Traits\HasMedia;
use Yazdan\Comment\Trait\HasComments;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Category\Traits\HasCategory;

class Product extends Model
{
    use HasComments,HasMedia,HasCategory;

    protected $table = 'products';
    protected $guarded = [];

}
