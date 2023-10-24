<?php

namespace Igwen6w\FilamentShop\Models;

use Igwen6w\FilamentShop\Casts\ShopProductStatus;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    protected $fillable = [
        'title',
        'description',
        'detail',
        'specification',
        'parameter',
        'image',
        'images',
        // 成本价
        'price_cost',
        // 原始价
        'price_origin',
        // 售价
        'price_sale',
        'sold_count',
        'sold_count_real',
        'review_count',
        'review_count_real',
        'inventory_count',
        'status',
        'rating'
    ];

    protected $casts = [
        'specification' => 'json',
        'status' => ShopProductStatus::class
    ];


}
