<?php

namespace Yazdan\Product\Repositories;

use Yazdan\Product\App\Models\Variation;

class VariationRepository
{
    public static function getProductVariations($productId)
    {
        return Variation::where('product_id',$productId)->get();
    }
}
