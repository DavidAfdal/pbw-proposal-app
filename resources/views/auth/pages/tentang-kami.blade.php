<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head', ['title' => "Klinik Penelitian"])
</head>
<body>
    <main>
        <div class="background">
            <div class="center-auth">
                <div class="box-tentang-kami" style="padding-block: 15px; padding-inline: 20px;">
                    <h1 class="fw-bold" style="color: #fff; margin:0">Tentang Kami</h1>
                    <div class="d-flex gap-4">
                        <a href="/register" style="color: #fff; font-size:18px;">Daftar</a>
                        <a href="/login" style="color: #fff; font-size:18px;">Masuk</a>
                    </div>
                </div>
                <div class="box-tentang-kami" style="margin-top:50px; padding-block:30px;">
                    <p style="color: #fff; font-size:24px; text-align:center;">Website ini dibuat untuk membantu para dosen meriview jurnal yang dibuat, dosen
                        dapat mengupload proposal dan akan di review oleh peninjau. Dosen dapat melihat
                        panduan pembuatan proposal dan mendapatkan review. Website ini dibuat oleh
                        kelas 3KA05</p>
                </div>
            </div>

            <div class="info" onclick="handleShowPanduan()">
                <a class="">
                  <i class='bx bx-info-circle'></i>
                </a>
              </div>

              <div class="panduan" id="panduan">
                <p class="mb-2">Panduan Pembuatan Proposal</p>
                <a href={{ route('downloadPanduan', ['filename' => "pedoman.pdf"]) }}>
                    <div class="file-panduan mb-4">
                        <i class="ri-file-line"></i>
                        <p>Panduan pembuatan Proposal.pdf</p>
                    </div>
                </a>
              </div>
        </div>

    </main>

    <script src="{{ asset('js/handlePassword.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
