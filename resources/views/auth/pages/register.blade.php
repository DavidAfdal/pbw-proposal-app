<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head', ['title' => "Klinik Penelitian"])
</head>
<body>
    <main>
        <div class="background">
            <div class="center-auth">
                @if(session()->has('errMsg'))
                <div class="alert alert-danger">
                    {{ session()->get('errMsg') }}
                </div>
            @endif
              <h2 class="">Daftar</h2>
              <div class="auth-box">
                <h3 style="text-align: center">Selamat Datang di Klinik Proposal</h3>
                <form action="{{route('auth.post.register')}}" method="post">
                    @csrf
                  <label for="">NIDN :</label>
                  <input type="text" name="nidn" id="" placeholder="NIDN">
                  @error('nidn')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                  <label for="">Nama :</label>
                  <input type="text" name="nama" id="" placeholder="Nama">
                  @error('nama')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                  <label for="">Kata Sandi :</label>
                  <div class="password-container">
                    <input type="password" id="password" placeholder="Kata Sandi" name="password">
                    <i class="toggle-password ri-eye-line" id="togglePassword"></i>
                </div>
                  @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                  <button type="submit">
                    Daftar
                  </button>
                  <a href="/login" style="color:white; text-align:center" class="mt-2">
                     Masuk
                </a>
                </form>

              </div>
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
    </main>
    <script src="{{ asset('js/handlePassword.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



