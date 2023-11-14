<?php

namespace Yazdan\Product\App\Models;

use Yazdan\Media\Traits\HasMedia;
use Yazdan\Comment\Trait\HasComments;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasComments,HasMedia;

    protected $table = 'products';
    protected $guarded = [];

}
