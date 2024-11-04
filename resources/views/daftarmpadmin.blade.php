@extends('dash')

{{-- @section('title', 'Home Page') --}}

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-8 mt-3">
            <h2>Daftar Admin MP SPBE</h2>
            <form method="post" enctype="multipart/form-data" action="/mendaftar">
                @csrf
                <!-- Input Judul Berita -->
                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="name" class="form-label">Nama Admin</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus placeholder="...">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="username" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus placeholder="...">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="...">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="...">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>

            </form>
        </div>

        <div class="col-sm-4 mt-3">
            <h2>Daftar Artikel</h2>
            <ol class="list-group list-group-numbered">
                @foreach ($artikels as $artikel)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">{{ $artikel->judul }}</div>
                      {{ $artikel->isi }}
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2"><i class="bi bi-trash-fill" style="font-size: 1rem; color: cornflowerblue;"></i></div>
                        <div class="p-2"><a href="/artikel/post/{{ $artikel->id }}/edit"><i class="bi bi-pen-fill" style="font-size: 1rem; color: cornflowerblue;"></i></a></div>
                    </div>
                </li>
                @endforeach
              </ol>
        </div>
    </div>
    <!-- Content goes here -->
</div>
@endsection
