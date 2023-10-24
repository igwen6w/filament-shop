<?php

namespace Igwen6w\FilamentShop\Enums;

enum ShopProductStatus: int
{
    case Editing = 0;

    // 待发售
    case Publishable = 1;

    case OnSale = 2;

    case StopSale = 3;

    case SoldOut = 4;

    case InReservation = 5;

    case SecKilling = 6;

    case OffLined = 7;

    case Deleted = 8;

    case SaleCountingDown = 9;

    case Undefined = 99;

    public static function formatString(int $value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case->toString();
            }
        }
        return self::Undefined->toString();
    }

    public static function formatInt(string $value): int
    {
        foreach (self::cases() as $case) {
            if ($case->toString() === $value) {
                return $case->value;
            }
        }
        return self::Undefined->value;
    }

    public function toString(): string
    {
        return match ($this) {
            self::Editing => trans('filament-shop::filament-shop.shop_product_status.Editing'),
            self::Publishable => trans('filament-shop::filament-shop.shop_product_status.Publishable'),
            self::OnSale => trans('filament-shop::filament-shop.shop_product_status.OnSale'),
            self::StopSale => trans('filament-shop::filament-shop.shop_product_status.StopSale'),
            self::SoldOut => trans('filament-shop::filament-shop.shop_product_status.SoldOut'),
            self::InReservation => trans('filament-shop::filament-shop.shop_product_status.InReservation'),
            self::SecKilling => trans('filament-shop::filament-shop.shop_product_status.SecKilling'),
            self::SaleCountingDown => trans('filament-shop::filament-shop.shop_product_status.SaleCountingDown'),
            self::OffLined => trans('filament-shop::filament-shop.shop_product_status.OffLined'),
            self::Deleted => trans('filament-shop::filament-shop.shop_product_status.Deleted'),
            default => trans('filament-shop::filament-shop.shop_product_status.Undefined'),
        };
    }

}
