<?php

namespace App\Exports;

use App\Models\Penyewaan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PenyewaanExport implements FromView
{
    protected $tanggalMulai;
    protected $tanggalAkhir;
    protected $data;

    public function __construct($tanggalMulai, $tanggalAkhir)
    {
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalAkhir = $tanggalAkhir;
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        if ($this->tanggalMulai == "") {
            $dataPenyewaan = Penyewaan::orderBy("id", "DESC")->get();
        } else {
            $dataPenyewaan = Penyewaan::whereBetween("tanggal_sewa", [$this->tanggalMulai, $this->tanggalAkhir])->orderBy("id", "DESC")->get();
        }
        // $newData = [];
        // foreach ($dataPenyewaan as $d) {
        //     $id = $d->id;
        //     $jenisKendaraan = $d->kendaraan->jenis;
        //     $namaDriver = $d->driver->nama;
        //     $namaPihak1 = $d->pihakLevel1->name;
        //     $namaPihak2 = $d->pihakLevel2->name;
        //     $tanggalSewa = $d->tanggal_sewa;
        //     $status = $d->status;
        //     array_push($newData, [
        //         "id" => $id,
        //         "jenisKendaraan" => $jenisKendaraan,
        //         "namaDriver" => $namaDriver,
        //         "namaPihak1" => $namaPihak1,
        //         "namaPihak2" => $namaPihak2,
        //         "tanggal_sewa" => $tanggalSewa,
        //         "status" => $status,
        //     ]);
        // }
        return view("table-data-penyewaan", [
            "dataPenyewaan" => $dataPenyewaan,
        ]);
    }
}
