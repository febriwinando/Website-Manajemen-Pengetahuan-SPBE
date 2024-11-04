<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
   <style>
        body {
            font-family: "Ubuntu", sans-serif;
            font-style: normal;
            font-weight: 400;
            background-color: #f8f9fa; /* Light background for contrast */
        }
        .navbar{
            background: linear-gradient(to right, #003366, #006699, #66ccff);

        }
        .navbar-brand {
            text-decoration: none;
            color: #ffffff;
        }

        .navbar-brand:hover{
            color: #ffffff;
        }

        /* .navbar-brand, .nav-link, .dropdown-item {
            color: #ffffff;
        } */
        .navbar-toggler-icon {

        }
        .btn-outline-success {
            color: #003366; /* Dark blue color for the search button */
            border-color: #003366; /* Dark blue border color */
        }
        .btn-outline-success:hover {
            background-color: #003366; /* Dark blue background on hover */
            color: #ffffff; /* White text color on hover */
        }
        .dropdown-menu {
            background-color: #003366; /* Dark blue background for dropdown */
        }
        .dropdown-item {
            color: #ffffff; /* White text color in dropdown items */
        }
        .dropdown-item:hover {
            background-color: #00509e; /* Lighter blue background on hover */
        }

        .form-control, .form-select, .form-check {
            margin-bottom: 15px;
        }

        .logout-nav{
            text-decoration: none;
            color: black;
        }

    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container">
              <a class="navbar-brand" href="/artikel">EchoNexis</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">EchoNexis</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="/artikel"><i class="bi bi-house me-2"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/daftar_artikel"><i class="bi bi-stickies me-2"></i> Artikel</a>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/daftarmpadmin"><i class="bi bi-person-gear me-2"></i> Admin</a>
                      </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('keluarmpadmin') }}" method="post" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link logout-nav"> <i class="bi bi-box-arrow-left me-2"></i> Keluar</a>
                      {{-- <a class="nav-link" href="/keluarmpadmin"> Keluar</a> --}}
                    </li>
                    {{-- <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                      </a> --}}
                      {{-- <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul> --}}
                    {{-- </li> --}}
                  </ul>
                </div>
              </div>
            </div>
          </nav>
    </div>
    <main class="mt-2">
        @yield('content')
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</html>
