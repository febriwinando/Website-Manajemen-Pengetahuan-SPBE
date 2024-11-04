<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<style>
    body{
        font-family: "Ubuntu", sans-serif;
        font-style: normal;
        font-weight: 400;
    }

    html, body, .content-artikel, .barisan-artikel{

        width: 100%;
        height: 100%;
        color: #212529;
    }

    .navbar{
        background: linear-gradient(to right, #003366, #006699, #66ccff);
    }


        .navbar .container a,  .navbar .navbar-nav .nav-item a{
            color: white;
        }

    .card-artikel{
        height: 40%;
        box-sizing: border-box;
    }

    .images {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: 50% 50%;
    }

    .blur{
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 93%;
        height: 97%;
        object-fit: cover;
        object-position: 50% 50%;
        background: rgba(0, 0, 0, 0.376);
    }

    .judul{
        width: 70%;
        height: 50%;
        object-position: 50% 50%;
        color: white;
        top: 30%;
        left: 20%;
        -webkit-transform: translate(-20%, -30%);
        -ms-transform: translate(-20%, -30%);
        transform: translate(-20%, -30%);
    }

    .judul h4{
        font-weight: 900;
    }

    .ket{
        font-size: 12px;
        color: white;
        position: absolute;
        bottom: 10%;
        right: 5%;
    }

    .open_artikel{
        font-size: 12px;
        color: white;
        background: #EE1D52;
        padding: 5px;
        border-radius: 10px;
        text-decoration: none;
        margin-left: 10px;
    }
</style>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">EchoNexis</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/tentang">Tentang</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li> --}}
                </ul>
              </div>
            </div>
          </nav>
    </div>

    <div class="container mt-5 content-artikel">
        <div class="row ">
            <div class="col-sm-12 mt-5">
                <h2>Daftar Artikel Pengetahuan SPBE</h2>
            </div>
            <div class="col-sm-8 mt-1">
                <form action="/search/dash" method="get">

                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari Artikel" aria-label="cari artikel" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div>
                </form>

            </div>
            <div class="col-sm-4 mt-1">
                <div class="d-flex justify-content-center">
                    {{ $artikels->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
        <div class="row barisan-artikel">
        @foreach ( $artikels as $artikel )
            <div class="col-sm-4 position-relative card-artikel ">
                <img src="{{ asset('storage/'.$artikel->gambar_artikel) }}" class="rounded-4 images shadow bg-body-tertiary" alt="{{$artikel->gambar_artikel}}">
                <div class="blur rounded-4"></div>
                <div class="position-absolute judul">
                    <h4>{{ strtoupper($artikel->judul) }}</h4>
                    <p class="isi_artikel"><i class="bi bi-file-earmark-text-fill"></i> {{$artikel->nama_pendidikan}}<a href="/baca/{{$artikel->id}}" class="open_artikel">Baca</a></p>
                </div>

                <span class="ket"><i class="bi bi-file-earmark-person-fill me-1"></i> {{$artikel->nama_penulis}}<i class="bi bi-calendar2-week-fill me-1 ms-2"></i> {{$artikel->tanggal_mulai}} <i class="ms-2 bi bi-eye-fill"></i></span>
            </div>

        @endforeach
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
