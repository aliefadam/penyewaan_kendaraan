<div class="overlay">
    <div class="notifikasi">
        @if (session('notifikasi')['jenis'] == 'gagal')
            <img class="" src="{{ asset('imgs/cross.png') }}" alt="">
        @else
            <img class="" src="{{ asset('imgs/checked.png') }}" alt="">
        @endif
        <span>{{ session('notifikasi')['pesan'] }}</span>
        <i class="bi bi-x-lg"></i>
    </div>
</div>
