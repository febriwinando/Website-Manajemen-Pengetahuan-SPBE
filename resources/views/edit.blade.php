@extends('dash')

{{-- @section('title', 'Home Page') --}}

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-8 mt-3">
            <h2>Form Artikel Pengetahuan SPBE</h2>
            <form method="post" enctype="multipart/form-data" action="/artikel/update/{{ $artikel->id }}">
                @method('put')
                @csrf
                <!-- Input Judul Berita -->
                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="nama_penulis" class="form-label">Nama Penulis</label>
                            <input type="text" class="form-control @error('nama_penulis') is-invalid @enderror" id="nama_penulis" name="nama_penulis" required autofocus value="{{ ucwords(old('nama_penulis', $artikel->nama_penulis)) }}">
                            @error('nama_penulis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="nip_penulis" class="form-label">NIP Penulis</label>
                            <input type="text" class="form-control @error('nip_penulis') is-invalid @enderror" id="nip_penulis" name="nip_penulis" value="{{ ucwords(old('nip_penulis', $artikel->nip_penulis)) }}">
                            @error('nip_penulis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="mb-3">
                    <label for="unit_kerja_penulis" class="form-label">Unit Kerja Penulis</label>
                    <select class="form-select @error('unit_kerja_penulis') is-invalid @enderror" id="unit_kerja_penulis" name="unit_kerja_penulis" aria-label="Pilih kategori">
                        @foreach ($unit_kerjas as $unit_kerja )
                        <option value="{{$unit_kerja->id}}" @if(old('unit_kerja_penulis', $artikel->unit_kerja_penulis) == $unit_kerja->id) selected @endif>{{$unit_kerja->unit_kerja}}</option>
                        @endforeach
                    </select>
                    @error('unit_kerja_penulis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Artikel</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ ucwords(old('judul', $artikel->judul)) }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_pendidikan" class="form-label">Nama Pelatihan/Pendidikan</label>
                    <input type="text" class="form-control @error('nama_pendidikan') is-invalid @enderror" id="nama_pendidikan" name="nama_pendidikan" value="{{ ucwords(old('nama_pendidikan', $artikel->nama_pendidikan)) }}">
                    @error('nama_pendidikan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control  @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ ucwords(old('tanggal_mulai', $artikel->tanggal_mulai)) }}">
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control  @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ ucwords(old('tanggal_selesai', $artikel->tanggal_selesai)) }}">
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>

                <div class="mb-3">
                    <label for="instansi_pelaksana" class="form-label">Instansi Pelaksana</label>
                    <input type="text" class="form-control  @error('instansi_pelaksana') is-invalid @enderror" id="instansi_pelaksana" name="instansi_pelaksana" value="{{ ucwords(old('instansi_pelaksana', $artikel->instansi_pelaksana)) }}">
                    @error('instansi_pelaksana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Konten Artikel</label>
                    <textarea class="form-control  @error('isi') is-invalid @enderror" id="isi" name="isi" rows="5">{{ ucwords(old('isi', $artikel->isi)) }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="gambar_artikel" class="form-label">Upload Gambar</label>
                            <input class="form-control @error('gambar_artikel') is-invalid @enderror" type="file" id="gambar_artikel" name="gambar_artikel" accept="image/*">
                            @error('gambar_artikel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="dokumen_artikel" class="form-label">Upload Dokumen</label>
                            <input class="form-control  @error('dokumen_artikel') is-invalid @enderror" type="file" id="dokumen_artikel" name="dokumen_artikel" accept=".pdf,.doc,.docx">
                            @error('dokumen_artikel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary">Posting</button>

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
