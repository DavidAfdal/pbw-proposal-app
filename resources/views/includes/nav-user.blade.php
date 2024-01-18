<header class="bg-white w-100 p-4">
  <nav class="d-flex justify-content-between align-items-center w-100" >
    <p>Universitas Gunadarma</p>
    <ul class="d-flex align-items-center gap-4" class="list-style:none;">
        @if (auth()->user()->role == "dosen")
        <li><a href="/home">Daftar Proposal</a></li>
        @endif
        <li>
            <a href="/logout">Keluar</a>
        </li>
    </ul>
  </nav>
</header>

