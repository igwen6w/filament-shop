<?php

namespace Igwen6w\FilamentShop\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class ShopProductStatus implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        return \Igwen6w\FilamentShop\Enums\ShopProductStatus::formatString($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        return \Igwen6w\FilamentShop\Enums\ShopProductStatus::formatInt($value);
    }

}
