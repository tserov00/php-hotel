<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Enums\RoomStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['room_type_id', 'number', 'floor'])]
class Room extends Model
{
    protected function casts(): array {
        return ['status' => RoomStatus::class];
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
