<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes/head')
</head>
<body>
    <main>
        <div class="background">
            <div class="center">
              <h2 class="">Klinik Penelitian</h2>
              <div class="box">
                <form action="{{route('proposal.tambah')}}" method="POST">
                  <label for="">Nama Peneliti</label>
                  <input type="text" name="nama" id="" required>
                  <label for="">Judul Peneliti</label>
                  <input type="text" name="judul" id="" required>
                  <label for="">Tanggal Pembuatan Proposal</label>
                  <input type="date" name="tanggal" id="" required>
                  <label for="">Skema</label>
                  <input type="text" name="skema" id="" required>
                  <label for="">Topik</label>
                  <input type="text" name="topik" id="" required>
                  <label for="">Bidang Ilmu</label>
                  <input type="text" name="bidangIlmu" id="" required>
                  <label for="">Upload Proposal (PDF)</label>
                  <input type="file" name="" id="file" accept="application/pdf,application/vnd.ms-excel">
                  <div class="d-flex justify-content-end">
                    <input type="submit" value="Kirim Proposal">
                  </div>

                </form>

              </div>
            </div>
          </div>

    </main>
</body>
</html>
