<!DOCTYPE html>
<html lang="en">
<head>
    @include("includes.head")
</head>
<body>
    @include('includes.navbar')
    <section class="background">
        <div class="center">
            <div class="box">
                    @if (count($data) <= 0 )
                        <p class="text-white mb-0" style="font-size:32px; font-weight:400;  text-decoration: underline;">Daftar Proposal Saya :</p>
                        <div class="d-flex align-items-center justify-content-center" style="height: 400px">
                            <p class="text-white text-center" style="font-size:32px; font-weight:600 ">Anda Belum Memiliki Proposal Untuk Di Evaluasi</p>
                        </div>
                    @endif
            </div>
        </div>
    </section>
    @include('includes.footer')
</body>
</html>
