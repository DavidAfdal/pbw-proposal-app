<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <main>
        @include('includes/navbar')
        <div class="background">
            <div class="center">
              <div class="form-box">
                <h3>Form Penambahan Anggota Peneliti</h3>
                <div class="d-flex justify-content-end mt-4">
                    <div class="d-flex gap-4">

                            <div class="switch active" onclick="showForm(this,'mahasiswa')">Mahasiswa</div>

                             <div class="switch" onclick="showForm(this,'dosen')">Dosen</div>
                             <div class="switch" onclick="showForm(this,'mitra')">
                            Mitra
                            </div>


                    </div>
                </div>
                <form action="" style="display: flex;" id="formMahasiswa">
                  <label for="">NPM </label>
                  <input type="text" name="" id="">
                  <label for="">Nama</label>
                  <input type="password" name="" id="">
                  <div class="d-flex justify-content-center gap-4">
                    <button class="btn-tambah" type="submit">
                        Tambah
                       </button>
                    <button class="btn-selesai" type="cancel">
                        Selesai
                    </button>
                  </div>
                </form>
                <form action="{{route('tambah.anggotadosen', ['id'=>$id])}}" method="POST" style="display: none;" id="formDosen">
                  <label for="">NIDN </label>
                  <input type="text" name="nidn" id="">
                  <label for="">Nama</label>
                  <input type="text" name="nama" id="">
                  <div class="d-flex justify-content-center gap-4">
                    <button class="btn-tambah" type="submit">
                        Tambah
                       </button>
                    <button class="btn-selesai" type="cancel">
                        Selesai
                    </button>
                  </div>
                </form>
                <form action="" style="display: none;" id="formMitra">
                  <label for="">Mitra </label>
                  <input type="text" name="" id="">
                  <label for="">Nama Pemimpin</label>
                  <input type="text" name="" id="">
                  <div class="d-flex justify-content-center gap-4">
                    <button class="btn-tambah" type="submit">
                        Tambah
                       </button>
                    <button class="btn-selesai" type="cancel">
                        Selesai
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @include('includes.footer')
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
</body>
</html>
