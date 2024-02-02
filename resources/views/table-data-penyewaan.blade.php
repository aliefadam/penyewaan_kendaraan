<table cellspacing="0">
    <tr>
        <th>No</th>
        <th>Jenis Kendaraan</th>
        <th>Driver</th>
        @if (auth()->user()->role == 'admin')
            <th>Pihak Persetujuan Level 1</th>
            <th>Pihak Persetujuan Level 2</th>
        @endif
        <th>Tanggal Sewa</th>
        @if (auth()->user()->role == 'admin')
            <th>Status</th>
        @else
            <th>Aksi</th>
        @endif
    </tr>
    @foreach ($dataPenyewaan as $penyewaan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $penyewaan->kendaraan->jenis }}</td>
            <td>{{ $penyewaan->driver->nama }}</td>
            @if (auth()->user()->role == 'admin')
                <td>{{ $penyewaan->pihakLevel1->name }}</td>
                <td>{{ $penyewaan->pihakLevel2->name }}</td>
            @endif
            <td>{{ $penyewaan->tanggal_sewa }}</td>
            @if (auth()->user()->role == 'admin')
                @php
                    $class = '';
                    if ($penyewaan->status == 'Menunggu Persetujuan Pihak Level 1' || $penyewaan->status == 'Menunggu Persetujuan Pihak Level 2') {
                        $class = 'kuning';
                    } elseif ($penyewaan->status == 'Ditolak') {
                        $class = 'merah';
                    } else {
                        $class = 'hijau';
                    }
                @endphp
                <td class="{{ $class }}">{{ $penyewaan->status }} </td>
            @else
                <td>
                    <a class="tombol diterima konfirmasi" href="/terima/{{ $penyewaan->id }}"><i
                            class="bi bi-check-lg"></i>
                        Terima</a>
                    <a class="tombol ditolak konfirmasi" href="/tolak/{{ $penyewaan->id }}"><i class="bi bi-x-lg"></i>
                        Tolak</a>
                </td>
            @endif
        </tr>
    @endforeach
</table>
