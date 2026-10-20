<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case cash = 'cash';
    case card = 'card';
}
