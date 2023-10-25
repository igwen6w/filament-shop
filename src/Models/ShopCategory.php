<?php

namespace Igwen6w\FilamentShop\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    protected $fillable = [
        'title',
        'rating',
        'parent_id',
        'description',
        'icon',
        'image'
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(ShopProduct::class, 'shop_category_product');
    }

}
