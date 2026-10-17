<?php

namespace App\Enums;

enum UserRole: string
{
    case Guest = 'guest';
    case Admin = 'admin';
}
