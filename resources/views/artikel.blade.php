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

        <div class="col-sm-12 mt-3">
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
