<?php

namespace App\Enums;

use App\Enums\Traits\BaseEnumTrait;

enum Role: string
{
    use BaseEnumTrait;

    case SuperAdmin = 'super-admin';
    case Admin = 'admin';
    case Manager = 'manager';
    case User = 'user';

    public function permissions(): array
    {
        return Permission::permissions($this);
    }
}
