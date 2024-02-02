<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\Penyewaan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Kendaraan::create([
            "jenis" => "Angkutan Orang",
        ]);

        Kendaraan::create([
            "jenis" => "Angkutan Barang",
        ]);

        Driver::create([
            "nama" => "Hadi",
        ]);

        Driver::create([
            "nama" => "Susanto",
        ]);

        Driver::create([
            "nama" => "Purnomo",
        ]);

        Driver::create([
            "nama" => "Ahmad",
        ]);

        Driver::create([
            "nama" => "Bagus",
        ]);

        Driver::create([
            "nama" => "Tohir",
        ]);

        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin123"),
            "role" => "admin",
        ]);

        User::create([
            "name" => "Bowo",
            "email" => "bowo@gmail.com",
            "password" => bcrypt("bowo123"),
            "role" => "pihak menyetujui level 1",
        ]);

        User::create([
            "name" => "Tomy",
            "email" => "tomy@gmail.com",
            "password" => bcrypt("tomy123"),
            "role" => "pihak menyetujui level 1",
        ]);

        User::create([
            "name" => "Eva",
            "email" => "eva@gmail.com",
            "password" => bcrypt("eva123"),
            "role" => "pihak menyetujui level 2",
        ]);

        User::create([
            "name" => "Rudi",
            "email" => "rudi@gmail.com",
            "password" => bcrypt("rudi123"),
            "role" => "pihak menyetujui level 2",
        ]);

        User::create([
            "name" => "Nina",
            "email" => "nina@gmail.com",
            "password" => bcrypt("nina123"),
            "role" => "pihak menyetujui level 2",
        ]);

        Penyewaan::create([
            "kendaraan_id" => 1,
            "driver_id" => 3,
            "pihak_menyetujui_level_1" => 2,
            "pihak_menyetujui_level_2" => 5,
            "tanggal_sewa" => "2024-02-02",
            "status" => "Pengajuan Penyewaan Diterima"
        ]);

        Penyewaan::create([
            "kendaraan_id" => 2,
            "driver_id" => 5,
            "pihak_menyetujui_level_1" => 3,
            "pihak_menyetujui_level_2" => 6,
            "tanggal_sewa" => "2024-02-02",
            "status" => "Ditolak"
        ]);

        Penyewaan::create([
            "kendaraan_id" => 1,
            "driver_id" => 6,
            "pihak_menyetujui_level_1" => 2,
            "pihak_menyetujui_level_2" => 4,
            "tanggal_sewa" => "2024-02-02",
            "status" => "Pengajuan Penyewaan Diterima"
        ]);
    }
}
