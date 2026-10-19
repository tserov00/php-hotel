<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['check_in', 'check_out', 'guests_count', 'comment'])]
class Booking extends Model
{
    //
}
