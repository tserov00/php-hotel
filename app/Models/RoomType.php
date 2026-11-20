<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'description', 'capacity', 'price_per_night', 'area', 'photo_path'])]
class RoomType extends Model
{

}
