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
                    <p class="text-white mb-0" style="font-size:32px; font-weight:400;  text-decoration: underline;">Daftar Proposal Saya :</p>
                    <div class="d-flex gap-2 align-items-center status-details">
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
                       @if(count($proposal->mitra()->get()) > 0 )
                       <div>
                         <p class="text-1">Mitra :</p>
                         @foreach($proposal->mitra()->get() as $mitra)
                         <p class="text-2">{{$mitra->nama}}</p>
                         @endforeach
                       </div>
                       @endif
                       <div>
                         <p class="text-1">Anggota :</p>
                         @foreach($proposal->anggotaDosen()->get() as $anggotaDosen)
                         <p class="text-2">{{$anggotaDosen->nama}} ({{$anggotaDosen->nidn}})</p>
                         @endforeach
                         @foreach($proposal->anggotaMahasiswa()->get() as $anggotaMahasiswa)
                         <p class="text-2">{{$anggotaMahasiswa->nama}} ({{$anggotaMahasiswa->npm}})</p>
                         @endforeach
                       </div>

                    </div>
                </div>

                <div class="komentar">
                   @if ($proposal->nidn_peninjau !== null)
                   <p class="fw-bold nama-peninjau">{{$proposal->peninjau->nama}} (Pengamat)</p>
                   <p class="mt-2 fw-bold">Komentar :</p>
                   @if(count($proposal->comment()->get()) > 0 )
                   @foreach($proposal->comment()->get() as $comment)
                   <div class="box-comment">
                       <p class="text-2" style="color:#232323">{{$comment->review}}</p>
                   </div>
                   @endforeach
                   @else
                   <P class="mt-2">Belum Ada Komentar</P>
                   @endif
                   @else
                   <p class="fw-bold">Peninjau Belum Ditentukan</p>
                   @endif

                </div>
            </div>

        </div>
    </section>
    @include('includes.footer')

</body>
</html>
