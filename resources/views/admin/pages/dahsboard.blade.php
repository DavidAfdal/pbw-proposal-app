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
                <div class="d-flex align-items-center justify-content-between">
                    <p class="text-white mb-0" style="font-size:32px; font-weight:400;  text-decoration: underline;">Daftar Proposal :</p>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="width:fit-content" name="tahun" id="filterYear">
                        {{ $last= date('Y')- 5 }}
                        {{ $now = date('Y') + 5 }}

                @for ($i = $now; $i >= $last; $i--)
                 @if($i == "2024")
                 <option value="{{ $i }}" selected>{{ $i }} <i class="ri-calendar-line"></i></option>
                 @continue
                 @endif
                 <option value="{{ $i }}">{{ $i }} <i class="ri-calendar-line"></i></option>
                @endfor
                    </select>
                </div>
                <div id="proposal">

                </div>

            </div>
        </div>
    </section>


    @include('includes.footer')
    <script>
       $(document).ready(function () {
        // Populate the initial dropdown data
        $.ajax({
            url: "{{ route('getProposalByYear') }}",
            type: 'GET',
            data: { tahun: "2024"},
            success: function (response) {
                // Populate the dropdown with data
                $('#proposal').html(response.html);
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });

        // Event listener for select change
        $('#filterYear').on('change', function () {
            const selectedValue = $(this).val();

            // Make another AJAX request to get additional data based on the selected value
            $.ajax({
                url: "{{ route('getProposalByYear') }}",
                type: 'GET',
                data: { tahun: selectedValue },
                success: function (response) {
                    // Display additional data in the container
                    $('#proposal').html(response.html);
                },
                error: function (error) {
                console.log('Error:', error);
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
