<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes/head')
</head>
<body>
    <main>
        @include('includes/navbar')
        <div class="background">
            <div class="center">
              <h2 class="">Klinik Penelitian</h2>
              <div class="box">
                @if(session('error'))
                  <div class="alert alert-danger">
                     {{ session('error') }}
                  </div>
                @endif
                <form action="{{route('proposal.tambah')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <label for="">Nama Peneliti :</label>
                  <input type="text" name="nama" id="" placeholder="Nama Peneliti" required>
                  <label for="">Judul Penelitian :</label>
                  <input type="text" name="judul" id="" placeholder="Judul Penelitian" required>
                  <label for="">Tanggal Pembuatan Proposal</label>
                  <input type="date" name="tanggal" id="" required placeholder="Tanggal Pembuatan Proposal">
                  <label for="">Skema</label>
                  <input type="text" name="skema" id="" required placeholder="Skema">
                  <label for="">Topik</label>
                  <input type="text" name="topik" id="" required placeholder="Topik">
                  <label for="">Bidang Ilmu</label>
                  <input type="text" name="bidangIlmu" id="" required placeholder="Bidang Ilmu">
                  <div></div>
                  <label for="">Upload Proposal (PDF)</label>
                  <input type="file" name="file" id="file" accept="application/pdf">
                  <div class="d-flex justify-content-end">
                    <button type="submit">Kirim Proposal</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        @include('includes.footer')
    </main>

</body>
</html>
