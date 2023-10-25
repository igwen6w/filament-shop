<?php

namespace Igwen6w\FilamentShop\Models;

use Igwen6w\FilamentShop\Casts\ShopProductStatus;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    protected $fillable = [
        'cover',
        'slug',
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
        'rating',
        'like_count',
        'share_count',
    ];

    protected $casts = [
        'status' => ShopProductStatus::class
    ];

    public function categories()
    {
        return $this->belongsToMany(ShopCategory::class, 'shop_category_product');
    }

    public function images()
    {
//        return $this->hasMany();
    }

    public function intro()
    {
        return $this->hasOne(ShopProductIntro::class);
    }

    public function productCustomFields()
    {
        return $this->hasMany(ShopProductCustomField::class);
    }




}
