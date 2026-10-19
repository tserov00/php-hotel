<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Enums\RoomStatus;

#[Fillable(['room_type_id', 'number', 'floor'])]
class Room extends Model
{
    protected function casts(): array {
        return ['status' => RoomStatus::class];
    }
}
