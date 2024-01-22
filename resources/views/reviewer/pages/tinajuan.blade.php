<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head', ['title' => "Klinik Penelitian"])
</head>
<body>
    @include('includes.navbar')
    <section class="background">
        <div class="center">
            <div class="box">
                <p class="text-white mb-0" style="font-size:32px; font-weight:400;  text-decoration: underline;">Daftar Tinjauan Proposal :</p>
                    @if (count($data) <= 0 )
                        <div class="d-flex align-items-center justify-content-center" style="height: 400px">
                            <p class="text-white text-center" style="font-size:32px; font-weight:600 ">Anda Belum Memiliki Proposal Untuk Di Evaluasi</p>
                        </div>
                    @else
                    <div class="grid">
                        @foreach ($data as $proposal )
                        <a href="/peninjau/detail-proposal/{{$proposal->id}}" class="card-link">
                            <div id="card">
                                <div style="height:400px;">
                                    <embed src="{{ asset("uploads/".$proposal->file) }}#toolbar=0&navpanes=0&scrollbar=0" scrolling="no">
                                </div>
                                <div class="card-desc">
                                    <div class="d-flex justify-content-between">
                                        <p>{{$proposal->judul}}</p>
                                        <div class="d-flex gap-2 align-items-center">
                                            @if ($proposal->status == "Sedang Ditinjau")
                                            <i class="ri-hourglass-fill" style="font-size:20px"></i>
                                            @elseif ($proposal->status == "Sudah Baik")
                                            <i class="ri-checkbox-circle-line" style="font-size:20px"></i>
                                            @else
                                            <i class="ri-file-edit-fill" style="font-size:20px"></i>
                                            @endif
                                            <p>{{$proposal->status}}</p>
                                        </div>
                                    </div>
                                    <p>{{$proposal->user->nama}}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
            </div>
        </div>
    </section>
    @include('includes.footer')
</body>
</html>
