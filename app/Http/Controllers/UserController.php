<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\Penyewaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view("welcome");
    }

    public function index()
    {
        $role = auth()->user()->role;
        if ($role == "admin") {
            $dataPenyewaan = Penyewaan::all();
        } else if ($role == "pihak menyetujui level 1") {
            $dataPenyewaan = Penyewaan::where("pihak_menyetujui_level_1", auth()->user()->id)
                ->where("status", "Menunggu Persetujuan Pihak Level 1")
                ->where('status', '!=', 'Ditolak')
                ->where('status', '!=', 'Pengajuan Penyewaan Diterima')
                ->get();
        } else {
            $dataPenyewaan = Penyewaan::where("pihak_menyetujui_level_2", auth()->user()->id)
                ->where("status", "Menunggu Persetujuan Pihak Level 2")
                ->where('status', '!=', 'Ditolak')
                ->where('status', '!=', 'Pengajuan Penyewaan Diterima')
                ->get();
        }

        return view("welcome", [
            "title" => ($role == "admin") ? "Dashboard" : "Daftar Pengajuan",
            "css" => ($role == "admin") ? "welcome.css" : "daftar-pengajuan.css",
            "dataPenyewaan" => $dataPenyewaan,
            "jumlahData" => [
                "angkutanOrang" => Penyewaan::where("kendaraan_id", "1")->count(),
                "angkutanBarang" => Penyewaan::where("kendaraan_id", "2")->count(),
            ],
        ]);
    }

    public function formTambahSewa()
    {
        $dataKendaraan = Kendaraan::all();
        $dataDriver = Driver::all();
        $pihakLevel1 = User::where('role', 'pihak menyetujui level 1')->get();
        $pihakLevel2 = User::where('role', 'pihak menyetujui level 2')->get();

        return view("form-tambah-sewa", [
            "title" => "Form Tambah Sewa",
            "css" => "form-tambah-sewa.css",
            "dataKendaraan" => $dataKendaraan,
            "dataDriver" => $dataDriver,
            "dataPihakMenyetujuiLevel1" => $pihakLevel1,
            "dataPihakMenyetujuiLevel2" => $pihakLevel2,
        ]);
    }

    public function tampilLogin()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect("/");
        } else {
            return redirect()->back()->with("notifikasi", [
                "jenis" => "gagal",
                "pesan" => "Username atau Password Salah!",
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }
}
