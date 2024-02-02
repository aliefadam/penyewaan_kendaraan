<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    public $timestamps = false;
    protected $table = "kendaraan";
    protected $guarded = ["id"];

    use HasFactory;
}
