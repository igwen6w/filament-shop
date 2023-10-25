<?php

namespace Igwen6w\FilamentShop\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ShopProductCustomField extends Model
{
    use Translatable;

    public $translationModel = ShopProductCustomFieldTranslation::class;

    public $translationForeignKey = 'shop_product_custom_field_id';

    public array $translatedAttributes = [
        'value',
        'value_unit',
    ];

    protected $fillable = [
        'shop_product_id',
        'shop_custom_field_id',
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(ShopProduct::class);
    }

    public function customField()
    {
        return $this->belongsTo(ShopCustomField::class);
    }

}
