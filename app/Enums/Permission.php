<?php

namespace App\Enums;

use App\Enums\Traits\BaseEnumTrait;

enum Permission: string
{
    use BaseEnumTrait;

    case UserView = 'user_view';
    case UserEdit = 'user_edit';
    case UserDelete = 'user_delete';
    case TravelView = 'travel_view';
    case TravelEdit = 'travel_edit';
    case TravelDelete = 'travel_delete';
    case TourView = 'tour_view';
    case TourEdit = 'tour_edit';
    case TourDelete = 'tour_delete';

    public static function permissions(Role $role): array
    {
        return match ($role) {
            Role::SuperAdmin => self::superAdmin(),
            Role::Admin => self::admin(),
            Role::Manager => self::manager(),
            Role::User => self::user(),
        };
    }

    public static function superAdmin(): array
    {
        return self::values();
    }

    public static function admin(): array
    {
        return [
            self::UserView->value,
            self::UserEdit->value,
            self::TravelView->value,
            self::TravelEdit->value,
            self::TourView->value,
            self::TourEdit->value,
            self::TourDelete->value,
        ];
    }

    public static function manager(): array
    {
        return [
            self::UserView->value,
            self::TravelView->value,
            self::TravelEdit->value,
            self::TourView->value,
            self::TourEdit->value,
        ];
    }

    public static function user(): array
    {
        return [
            self::UserView->value,
            self::TravelView->value,
            self::TourView->value,
        ];
    }
}
