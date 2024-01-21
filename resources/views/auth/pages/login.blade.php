<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head', ['title' => "Klinik Penelitian"])
</head>
<body>
    <main>
        <div class="background">
            <div class="center-auth">
              <h2 class="">Masuk</h2>
              <div class="auth-box">
                @if(session()->has('errMsg'))
                <div class="alert alert-danger">
                    {{ session()->get('errMsg') }}
                </div>
            @endif
                <h3>Selamat Datang di Klinik Proposal</h3>

                <form action="{{route("auth.post.login")}}" method="post">
                    @csrf
                  <label for="">NIDN :</label>
                  <input type="text" name="nidn" id="nidn" placeholder="NIDN">
                  @error('nidn')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                  <label for="">Kata Sandi :</label>
                  {{-- <input type="password" name="password" id="password"> --}}
                  <div class="password-container">
                    <input type="password" id="password" placeholder="Password" name="password">
                    <i class="toggle-password ri-eye-line" id="togglePassword"></i>
                </div>
                  @error('password')
                  <span class="alert alert-danger">{{ $message }}</span>
              @enderror
              <button type="submit">
                Masuk
              </button>
              <a href="/register" style="color:white; text-align:center" class="mt-2">
                Daftar
           </a>
                </form>

              </div>
            </div>
          </div>

          <div class="info">
            <a class="">
              <i class='bx bx-info-circle'></i>
            </a>
          </div>
    </main>
    <script src="{{ asset('js/handlePassword.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



