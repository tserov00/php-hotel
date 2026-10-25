<?php

namespace App\Enums;

enum BookingStatus: string
{
    case confirmed = 'confirmed';
    case canceled = 'canceled';
}
