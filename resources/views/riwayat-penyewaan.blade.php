@extends('layouts.main')

@section('content')
    <div class="scroll">
        @if (App\Models\Penyewaan::count() == 0)
            <h1>Belum ada riwayat penyewaan</h1>
        @else
            <form class="search" action="/search" method="post">
                @csrf
                <div class="mulai">
                    <span>Dari :</span>
                    <input required type="date" name="tanggal_mulai" id=""
                        value="{{ isset($tanggal_mulai) ? $tanggal_mulai : '' }}">
                </div>
                <div class="akhir">
                    <span>Sampai :</span>
                    <input required type="date" name="tanggal_akhir" id=""
                        value="{{ isset($tanggal_akhir) ? $tanggal_akhir : '' }}">
                </div>
                <div class="filter">
                    <button name="button" value="filter"><i class="bi bi-funnel"></i> Filter</button>
                </div>
                <div class="tampilkan-semua">
                    <button name="button" value="tampilkan_semua"><i class="bi bi-eye"></i> Tampilkan Semua</button>
                </div>
            </form>

            @if ($dataPenyewaan->count() == 0)
                <h1>Tidak ada riwayat penyewaan dalam rentang tanggal ini</h1>
            @else
                @php
                    $url = $_SERVER['REQUEST_URI'];
                @endphp

                @if ($url == '/riwayat-penyewaan')
                    <div class="export">
                        <a href="/download-excel/all"><img src="{{ asset('imgs/excel-logo.png') }}" alt="">
                            Export</a>
                    </div>
                @else
                    <div class="export">
                        <a href="/download-excel/{{ "$tanggal_mulai,$tanggal_akhir" }}"><img
                                src="{{ asset('imgs/excel-logo.png') }}" alt=""> Export</a>
                    </div>
                @endif
                @include('table-data-penyewaan')
            @endif

        @endif
    </div>
@endsection
