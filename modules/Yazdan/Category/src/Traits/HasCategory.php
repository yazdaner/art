<?php

namespace Yazdan\Category\Traits;

use Yazdan\Category\App\Models\Category;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;

trait HasCategory
{
    use HasRelationships;

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
