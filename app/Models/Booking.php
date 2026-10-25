<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Enums\BookingStatus;

#[Fillable(['check_in', 'check_out', 'guests_count', 'comment', 'room_id'])]
class Booking extends Model
{
    public function casts() {
        return ['status' => BookingStatus::class];
    }
}
