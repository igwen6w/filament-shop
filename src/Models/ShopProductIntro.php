<?php

namespace Igwen6w\FilamentShop\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ShopProductIntro extends Model
{
    use Translatable;

    protected $fillable = [
        'shop_product_id',
    ];

    public $timestamps = false;

    public array $translatedAttributes = [
        'title',
        'description',
        'detail',
        'specification',
        'parameter',
        'service',
        'price_specification',
        'price_cost',
        'price_sale',
        'price_origin',
        'price_unit',
    ];

    public function product()
    {
        return $this->belongsTo(ShopProduct::class);
    }

}
