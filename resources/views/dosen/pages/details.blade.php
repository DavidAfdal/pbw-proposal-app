<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
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
                        @else
                        <i class="ri-checkbox-circle-line" style="font-size:20px"></i>
                        @endif
                        <p>{{$proposal->status}}</p>
                    </div>
                </div>
                <div class="grid-details">
                    <div class="card" style="border:none">
                        <embed style="width:100%; height:400px;border:none " src="{{ asset("uploads/".$proposal->file) }}#toolbar=0" type="application/pdf"  scrolling="no" />
                            <div class="card-desc-details">
                                <a href={{ route('download', ['filename' => $proposal->file]) }} style="color:white">
                                    <div class="d-flex gap-2">
                                        <i class="ri-download-line"></i>
                                        <p class="text-center">Download</p>
                                    </div>
                                </a>
                            </div>
                    </div>
                </div>

                <div class="komentar">

                </div>
            </div>

        </div>
    </section>
    @include('includes.footer')

</body>
</html>
