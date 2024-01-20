<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    @include('includes/navbar')
    <main>
        <div class="background">
            <div class="center">
              <div class="box">
                <div class="d-flex justify-content-center align-items-center py-4">
                    <img src="{{asset('img/check.png')}}"/>
                </div>
                <p class="text-center text-white" style="font-size:36px">Terimakasih {{auth()->user()->nama}} atas partisipasinya. Proposal anda berhasil disimpan dan akan dilanjutkan proses review dari tim terkait</p>
              </div>
            </div>
          </div>
          @include('includes.footer')
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
