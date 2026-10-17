<?php

namespace App\Enums;

enum RoomStatus: string
{
    case Available = 'available';
    case Maintenance = 'maintenance';

    public function label(): string
    {
        if ($this === self::Available) {
            return 'Доступен';
        } elseif ($this === self::Maintenance) {
            return 'На обслуживании';
        }
    }
}
