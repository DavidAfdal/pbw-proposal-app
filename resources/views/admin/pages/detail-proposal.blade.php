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
                        <embed src="{{ asset("uploads/".$proposal->file) }}#toolbar=0&scrollbar=none" type="application/pdf"  scrolling="no" />
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
                         <p class="text-2">{{$mitra->nama}} - {{$mitra->Pemimpin}}</p>
                         @endforeach
                       </div>
                       @endif
                       @if(count($proposal->anggotaDosen()->get()) > 0 || count($proposal->anggotaMahasiswa()->get()) > 0  )
                       <div>
                         <p class="text-1">Anggota :</p>
                         @foreach($proposal->anggotaDosen()->get() as $anggotaDosen)
                         <p class="text-2">{{$anggotaDosen->nama}} ({{$anggotaDosen->nidn}})</p>
                         @endforeach
                         @foreach($proposal->anggotaMahasiswa()->get() as $anggotaMahasiswa)
                         <p class="text-2">{{$anggotaMahasiswa->nama}} ({{$anggotaMahasiswa->npm}})</p>
                         @endforeach
                       </div>
                       @endif
                       @if ($proposal->nidn_peninjau != null)
                       <div>
                         <p class="text-1">Peninjau :</p>
                         <p class="text-2">{{$proposal->peninjau->nama}} ({{$proposal->peninjau->nidn}})</p>
                       </div>
                       @else
                       <div>
                        <p class="text-1">Peninjau :</p>
                        <p class="text-2">Peninjau Belum Ditentukan</p>
                      </div>
                       @endif
                    </div>
                </div>
                @if ($proposal->nidn_peninjau == null)
                <div class="d-flex justify-content-end">
                    <button type="button" onclick="openModal()">Tambah Peninjau</button>
                </div>
                @endif


            </div>

        </div>
    </section>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <!-- Modal content goes here -->
            {{-- <span class="close">&times;</span> --}}
            <form method="post" action="{{route("tambahPeninjau", ["id" => $id])}}" >
                @csrf
                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Nama Peninjau" name="searchInput">
                    <i class="search-icon ri-search-line" id="searchName"></i>
                </div>
                <div class="body-modal-scroolable" id="body-modal">
                </div>
                <div class="garis"></div>
                <div class="d-flex justify-content-end gap-4">
                    <button  type="submit">
                        Tambah
                       </button>
                  </div>
            </form>
        </div>
    </div>
    @include('includes.footer')


    <script>
         var modal = document.getElementById('myModal');


// Function to open the modal
function openModal() {
    modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
    modal.style.display = 'none';
}

window.addEventListener('click', function(event) {
            if (event.target == modal) {
                closeModal();
            }
        });
// Close the modal if the close button is clicked

    </script>

    <script>
        $(document).ready(function () {
            // Handle search button click
            $.ajax({
            url:  '{{ route("searchPeninjau") }}',
            type: 'POST',
            data: { search:"" },
            success: function (response) {
                console.log(response.html);
                 $('#body-modal').html(response.html);

            },
            error: function (error) {
                console.log('Error:', error);
            }
        });

            $('#searchInput').on('keyup', function () {
                // Make an AJAX request to the searchData method in DataController
                $value=$(this).val();
                $.ajax({
                    url: '{{ route("searchPeninjau") }}',
                    type: 'POST',
                    data: { search: $value},
                    success: function (response) {
                        // Update the modal body with the fetched data
                        console.log(response.html);
                        $('#body-modal').html(response.html);

                        // Show the modal
                        $('#myModal').css({
                            "display": "block"
                        })
                    }
                });
            });
        });
    </script>
    <script>
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
        </script>
</body>
</html>
