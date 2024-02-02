@extends('layouts.main')

@section('content')
    <div class="content">
        <form action="/tambah-penyewaan" method="post">
            @csrf
            <div class="form-item">
                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                <select name="jenis_kendaraan" id="jenis_kendaraan">
                    <option disabled selected value="">-- Pilih --</option>
                    @foreach ($dataKendaraan as $kendaraan)
                        <option value="{{ $kendaraan->id }}">{{ $kendaraan->jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-item">
                <label for="driver">Pilih Driver</label>
                <select name="driver" id="driver">
                    <option disabled selected value="">-- Pilih --</option>
                    @foreach ($dataDriver as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-item">
                <label for="pihak_meyetujui_level_1">Persetujuan Level 1</label>
                <select name="pihak_meyetujui_level_1" id="pihak_meyetujui_level_1">
                    <option disabled selected value="">-- Pilih --</option>
                    @foreach ($dataPihakMenyetujuiLevel1 as $pm)
                        <option value="{{ $pm->id }}">{{ $pm->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-item">
                <label for="pihak_meyetujui_level_2">Persetujuan Level 2</label>
                <select name="pihak_meyetujui_level_2" id="pihak_meyetujui_level_2">
                    <option disabled selected value="">-- Pilih --</option>
                    @foreach ($dataPihakMenyetujuiLevel2 as $pm)
                        <option value="{{ $pm->id }}">{{ $pm->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-item">
                <button>Tambah Penyewaan</button>
            </div>
        </form>
    </div>
@endsection
