<header class="navbar">
  <nav class="d-flex justify-content-between align-items-center w-100" >
    <div class="d-flex gap-4 align-items-center">
         <img src={{asset("img/gunadarma.png")}} width="50" height="50" alt="gunadarama"/>
         <div>
             <p class="fw-bold">Klinik Proposal</p>
             <p class="fw-bold">Lembaga Penelitian Universitas Gunadarma</p>
         </div>
    </div>

    <ul class="d-flex align-items-center gap-4 nav-link" class="list-style:none;">
        @if (auth()->user()->role == "dosen")
        <li><a href="/home">Daftar Proposal</a></li>
        @elseif (auth()->user()->role == "peninjau")
        <li><a href="/peninjau/daftar-tinjauan">Tinjauan Proposal</a></li>
        @else
        <li><a href="/admin/dashboard">Daftar Proposal</a></li>
        @endif
        <li>
            <a href="/logout">Keluar</a>
        </li>
    </ul>
  </nav>
</header>

