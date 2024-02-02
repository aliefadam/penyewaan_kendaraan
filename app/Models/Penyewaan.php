<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];
    protected $table = "penyewaan";

    use HasFactory;

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function pihakLevel1()
    {
        return $this->belongsTo(User::class, "pihak_menyetujui_level_1");
    }

    public function pihakLevel2()
    {
        return $this->belongsTo(User::class, "pihak_menyetujui_level_2");
    }
}
