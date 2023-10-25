<?php

namespace Igwen6w\FilamentShop\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCustomField extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
    ];

}
