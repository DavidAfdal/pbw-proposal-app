<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head', ['title' => "Klinik Penelitian"])
</head>
<body>
    <main>
        @include('includes/navbar')
        <div class="background">
            <div class="center">
              <div class="form-box">
                <h3>Form Penambahan Anggota Peneliti</h3>
                @if(session('message'))
                <div class="alert alert-success">
                   {{ session('message') }}
                </div>
              @endif
                <div class="d-flex justify-content-end mt-4">
                    <div class="d-flex gap-4">

                            <div class="switch active" onclick="showForm(this,'mahasiswa')">Mahasiswa</div>

                             <div class="switch" onclick="showForm(this,'dosen')">Dosen</div>
                             <div class="switch" onclick="showForm(this,'mitra')">
                            Mitra
                            </div>
                    </div>
                </div>
                <form action="{{route("tambah.anggotaMahasiswa", ["id" => $id])}}" method="POST" style="display: flex;" id="formMahasiswa">
                    @csrf
                  <label for="">NPM </label>
                  <input type="text" name="npm" id="">
                  <label for="">Nama</label>
                  <input type="text" name="nama" id="">
                  <div class="d-flex justify-content-center gap-4">
                    <button class="btn-tambah" type="submit">
                        Tambah
                       </button>
                       <a href="/sukses">
                        <button class="btn-selesai" type="button">
                            Selesai
                        </button>
                    </a>
                  </div>
                </form>
                <form  action="{{route("tambah.anggotaDosen", ["id" => $id])}}" method="POST" style="display: none;" id="formDosen">
                    @csrf
                  <label for="">NIDN </label>
                  <input type="text" name="nidn" id="">
                  <label for="">Nama</label>
                  <input type="text" name="nama" id="">
                  <div class="d-flex justify-content-center gap-4">
                    <button class="btn-tambah" type="submit">
                        Tambah
                       </button>
                    <a href="/sukses">
                        <button class="btn-selesai" type="button" >
                            Selesai
                        </button>
                    </a>
                  </div>
                </form>
                <form action="{{route("tambah.mitra", ["id" => $id])}}" style="display: none;" method="POST" id="formMitra">
                  <label for="">Mitra </label>
                  <input type="text" name="nama" id="">
                  <label for="">Nama Pemimpin</label>
                  <input type="text" name="pemimpin" id="">
                  <div class="d-flex justify-content-center gap-4">
                    <button class="btn-tambah" type="submit">
                        Tambah
                       </button>
                       <a href="/sukses">
                        <button class="btn-selesai" type="button">
                            Selesai
                        </button>
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @include('includes.footer')
    </main>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
