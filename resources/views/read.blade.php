<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<style>
    html, body{
        width: 100%;
        height: 100%;
        position: relative;
        font-family: "Ubuntu", sans-serif;
        font-style: normal;
        font-weight: 400;
    }

    .background_img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: 50% 50%;
    }

    .background_black{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        z-index: 1;
        /* background-color: #b5b5b578; */
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    }

    .konten_artikel{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        z-index: 1;
    }

    .judul{
        width: 100%;
        height: 30%;
        position: relative;
    }

    .isi_konten{
        height: 100%;
        background: rgba(255, 255, 255, 0.438);
    }

    .judul_artikel{
        position: absolute;
        top: 50%;
        left: 15%;
        z-index: 5;
        -webkit-transform: translate(-15%, -50%);
        -ms-transform: translate(-15%, -50%);
        transform: translate(-15%, -50%);
        color: white;

    }

    .kembali{
        color: white;
        font-size: 12px;
    }

    .kembali:hover{
        color: #69C9D0;
        cursor: pointer;
    }
    .ket_tambahan{
        margin-right: 10px;
        color: #EE1D52;
    }

    .open_artikel{
        color: white;
        background: #69C9D0;
        padding: 5px;
        border-radius: 10px;
        text-decoration: none;
    }

    .isi_artikel{
        font-size: 20px;
    }
</style>
</head>
<body>


    <div class="konten_artikel">

        <div class="container isi_konten">
            <div class="judul">
                <img src="{{ asset('storage/'.$artikel->gambar_artikel)  }}" class="background_img" alt="...">
                <div class="background_black"></div>
                <div class="judul_artikel">
                <span class="kembali" onclick="window.history.back();"><i class="bi bi-arrow-left"></i> Kembali</span>
                    <h1>{{$artikel->judul}}</h1>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-10 m-auto">
                    <span class="ket_tambahan"><i class="bi bi-person-circle"></i> {{$artikel->nama_penulis}}</span>
                    <span class="ket_tambahan"><i class="bi bi-buildings-fill"></i> {{$artikel->instansi_pelaksana}}</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-10 m-auto isi_artikel">
                    {{$artikel->isi}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-10 m-auto">
                    {{-- <a href="/download/{{$artikel->dokumen_artikel}}" class="open_artikel"><i class="bi bi-file-earmark-arrow-down-fill" style="color: white"></i> Download Dokumen</a> --}}
                    <a href="{{ route('file.download', ['filename' => basename($artikel->dokumen_artikel)]) }}" class="open_artikel"> <i class="bi bi-file-earmark-arrow-down-fill" style="color: white"></i> Unduh Dokumen</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
