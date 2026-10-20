<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Enums\PaymentMethod;

#[Fillable(['booking_id', 'amount', 'method'])]
class Payment extends Model
{
    protected function casts(): array{
        return ['method' => PaymentMethod::class];
    }
}
