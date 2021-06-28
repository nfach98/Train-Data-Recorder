<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorCar extends Model
{
    use HasFactory;
    protected $table = "db_motorcar";
	public $timestamps = false;
}
