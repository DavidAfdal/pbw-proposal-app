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
                <div class="d-flex justify-content-between">
                    <p class="text-white mb-0" style="font-size:32px; font-weight:400;  text-decoration: underline;">Detail Proposal :</p>
                    <div class="d-flex gap-2 align-items-center status-details">
                        @if ($proposal->status == "Sedang Ditinjau")
                        <i class="ri-hourglass-fill" style="font-size:20px"></i>
                        @else
                        <i class="ri-checkbox-circle-line" style="font-size:20px"></i>
                        @endif
                        <p>{{$proposal->status}}</p>
                    </div>
                </div>
                <div class="grid-details">
                    <div class="card" style="border:none">
                        <embed style="width:100%; height:400px;border:none " src="{{ asset("uploads/".$proposal->file) }}#toolbar=0&scrollbar=0" type="application/pdf"  scrolling="no" />
                            <div class="card-desc-details">
                                <a href={{ route('download', ['filename' => $proposal->file]) }} style="color:white">
                                    <div class="d-flex gap-2">
                                        <i class="ri-download-line"></i>
                                        <p class="text-center">Download</p>
                                    </div>
                                </a>
                            </div>
                    </div>
                    <div class="d-flex flex-column">
                       <div>
                         <p  class="text-1">Nama Peneliti :</p>
                         <p class="text-2"> {{$proposal->peneliti}}</p>
                       </div>
                       <div>
                         <p  class="text-1">Judul Peneliti :</p>
                         <p class="text-2">{{$proposal->judul}}</p>
                       </div>
                       <div>
                         <p  class="text-1">Tanggal Pembuatan Proposal :</p>
                         <p class="text-2">{{\Carbon\Carbon::parse($proposal->tanggal)->format('d F Y')}}</p>
                       </div>
                       <div>
                         <p class="text-1">Skema :</p>
                         <p class="text-2">{{$proposal->skema}}</p>
                       </div>
                       <div>
                         <p class="text-1">Topik :</p>
                         <p class="text-2">{{$proposal->topik}}</p>
                       </div>
                       <div>
                         <p class="text-1">Bidang Ilmu :</p>
                         <p class="text-2">{{$proposal->bidang_ilmu}}</p>
                       </div>
                    </div>
                </div>
                @if ($proposal->nidn_peninjau == null)
                <div class="d-flex justify-content-end">
                    <button type="submit">Tambah Pengamat</button>
                </div>
                @endif


            </div>

        </div>
    </section>
    @include('includes.footer')

</body>
</html>
