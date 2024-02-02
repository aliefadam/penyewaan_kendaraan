<nav>
    <div class="nama">
        <img src="{{ asset('imgs/more.png') }}" alt="" class="menu-button">
        <h1>Halo, {{ auth()->user()->name }}!</h1>
    </div>
    <div class="logout">
        <a href="/logout">
            <i class="bi bi-box-arrow-left"></i>
            Logout
        </a>
    </div>
</nav>
