<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;
use App\Exports\PenyewaanExport;
use Maatwebsite\Excel\Facades\Excel;

class PenyewaanController extends Controller
{
    public function riwayatPenyewaan()
    {
        $dataPenyewaan = Penyewaan::orderBy("id", "DESC")->get();
        return view("riwayat-penyewaan", [
            "title" => "Riwayat Penyewaan",
            "css" => "riwayat-penyewaan.css",
            "dataPenyewaan" => $dataPenyewaan,
        ]);
    }

    public function tambahSewa(Request $request)
    {

        $kendaraanId = $request->jenis_kendaraan;
        $driverId = $request->driver;
        $pihakLevel1 = $request->pihak_meyetujui_level_1;
        $pihakLevel2 = $request->pihak_meyetujui_level_2;

        date_default_timezone_set("Asia/Jakarta");
        Penyewaan::create([
            "kendaraan_id" => $kendaraanId,
            "driver_id" => $driverId,
            "pihak_menyetujui_level_1" => $pihakLevel1,
            "pihak_menyetujui_level_2" => $pihakLevel2,
            "tanggal_sewa" => date("Y-m-d"),
            "status" => "Menunggu Persetujuan Pihak Level 1",
        ]);

        return redirect("/form-tambah-penyewaan")->with("notifikasi", [
            "jenis" => "berhasil",
            "pesan" => "Berhasil Menambahkan Penyewaan",
        ]);
    }

    public function getDataByTanggal(Request $request)
    {
        if ($request->button == "filter") {
            $tanggalMulai = $request->tanggal_mulai;
            $tanggalAkhir = $request->tanggal_akhir;
            if ($tanggalMulai == null || $tanggalAkhir == null) {
                return redirect("/riwayat-penyewaan");
            }
            $dataPenyewaan = Penyewaan::whereBetween("tanggal_sewa", [$tanggalMulai, $tanggalAkhir])->orderBy("id", "DESC")->get();
            return view("riwayat-penyewaan", [
                "title" => "Riwayat Penyewaan",
                "css" => "riwayat-penyewaan.css",
                "dataPenyewaan" => $dataPenyewaan,
                "tanggal_mulai" => $tanggalMulai,
                "tanggal_akhir" => $tanggalAkhir,
            ]);
        } else {
            return redirect("/riwayat-penyewaan");
        }
    }

    public function exportExcel($tanggal)
    {
        if ($tanggal == "all") {
            return Excel::download(new PenyewaanExport("", ""), "laporan-penyewaan.xlsx");
        } else {
            $tanggal = explode(",", $tanggal);
            $tanggalMulai = $tanggal[0];
            $tanggalAkhir = $tanggal[1];
            return Excel::download(new PenyewaanExport($tanggalMulai, $tanggalAkhir), "laporan-penyewaan.xlsx");
        }
    }

    public function terimaPenyewaan(Penyewaan $penyewaan)
    {
        $role = auth()->user()->role;
        $status = "";
        if ($role == "pihak menyetujui level 1") {
            $status = "Menunggu Persetujuan Pihak Level 2";
        } else {
            $status = "Pengajuan Penyewaan Diterima";
        }

        $penyewaan->update([
            "status" => $status,
        ]);

        return redirect()->back()->with("notifikasi", [
            "jenis" => "berhasil",
            "pesan" => "Penyewaan Diterima",
        ]);;
    }

    public function tolakPenyewaan(Penyewaan $penyewaan)
    {
        $status = "Ditolak";
        $penyewaan->update([
            "status" => $status,
        ]);
        return redirect()->back()->with("notifikasi", [
            "jenis" => "gagal",
            "pesan" => "Penyewaan Ditolak",
        ]);;
    }
}
