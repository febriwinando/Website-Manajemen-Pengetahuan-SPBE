@extends('dash')

{{-- @section('title', 'Home Page') --}}

@section('content')
<style>
 /* .search-result {
        position: absolute;
        z-index: 1000;
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        background: white;
        border: 1px solid #ddd;
    }
    .search-result p {
        margin: 0;
        padding: 10px;
        cursor: pointer;
    }
    .search-result p:hover {
        background: #f1f1f1;
    }
    .spinner-border {
        display: none;
    } */
</style>
<div class="container mt-5 mb-5">
    <div class="row mt-5">
        <div class="col-sm-8">
            <h2 class="mt-3">Form Artikel Pengetahuan SPBE</h2>
            <form method="post" enctype="multipart/form-data" action="/artikel">
                @csrf
                <!-- Input Judul Berita -->
                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="nama_penulis" class="form-label">Nama Penulis</label>
                            <input type="text" class="form-control @error('nama_penulis') is-invalid @enderror" id="nama_penulis" onchange="searchPenulis()" name="nama_penulis" required autofocus placeholder="...">
                            @error('nama_penulis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- <div id="result" class="search-result">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div> --}}

                        </div>
                        <div class="col-sm-6">
                            <label for="nip_penulis" class="form-label">NIP Penulis</label>
                            <input type="text" class="form-control @error('nip_penulis') is-invalid @enderror" id="nip_penulis" name="nip_penulis" placeholder="...">
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
                        <option selected>Pilih Unit Kerja Penulis...</option>
                        @foreach ($unit_kerjas as $unit_kerja )
                        <option value="{{$unit_kerja->id}}">{{$unit_kerja->unit_kerja}}</option>
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
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="...">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_pendidikan" class="form-label">Nama Pelatihan/Pendidikan</label>
                    <input type="text" class="form-control @error('nama_pendidikan') is-invalid @enderror" id="nama_pendidikan" name="nama_pendidikan" placeholder="...">
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
                            <input type="date" class="form-control  @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai">
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control  @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai">
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
                    <input type="text" class="form-control  @error('instansi_pelaksana') is-invalid @enderror" id="instansi_pelaksana" name="instansi_pelaksana" placeholder="">
                    @error('instansi_pelaksana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Konten Artikel</label>
                    <textarea class="form-control  @error('isi') is-invalid @enderror" id="isi" name="isi" rows="5" placeholder="..."></textarea>
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
                        <form action="/artikel/delete/{{ $artikel->id }}" method="post" class="m-1 d-inline">
                            @method('delete')
                            @csrf
                            <button style="background: none; border:none;" onclick="return confirm('Apakah anda yakin akan menghapus Artikel {{ ucwords($artikel->judul) }}?')"><i class="bi bi-trash-fill" style="font-size: 1rem; color: cornflowerblue;"></i></button>
                        </form>
                        {{-- <div class="p-2"><i class="bi bi-trash-fill" style="font-size: 1rem; color: cornflowerblue;"></i></div> --}}
                        <div class="p-2"><a href="/artikel/post/{{ $artikel->id }}/edit"><i class="bi bi-pen-fill" style="font-size: 1rem; color: cornflowerblue;"></i></a></div>
                    </div>
                </li>
                @endforeach
              </ol>
        </div>
    </div>
    <!-- Content goes here -->
</div>

<script>
    function searchPenulis() {
        let query = $('#nama_penulis').val();
        if (query.length > 2) { // Minimum 3 characters to search
            console.log('Mengirim query:', query);
            $('#result .spinner-border').show(); // Show spinner
            $.ajax({
                url: '{{ route('nama_penulis') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    query: query
                },
                success: function(data){
                    console.log('Data diterima:', data);
                    let results = '';
                    data.forEach(function(item) {
                        if (item.nama_penulis) {
                            results += `<p onclick="selectPenulis('${item.nama_penulis}')">${item.nama_penulis}</p>`;
                        } else {
                            console.error('nama_penulis tidak ditemukan pada item:', item);
                        }
                    });
                    $('#result').html(results);
                    $('#result').css('width', $('#nama_penulis').outerWidth()); // Set width of result to match input width
                },
                error: function(xhr, status, error){
                    console.error('Error:', error);
                },
                complete: function() {
                    $('#result .spinner-border').hide(); // Hide spinner
                }
            });
        } else {
            $('#result').html('');
        }
    }

    function selectPenulis(namaPenulis) {
        $('#nama_penulis').val(namaPenulis);
        $('#result').html('');
    }

    // Hide results when clicking outside
    $(document).click(function(event) {
        var $target = $(event.target);
        if(!$target.closest('#nama_penulis').length && !$target.closest('#result').length) {
            $('#result').html('');
        }
    });
</script>
@endsection
