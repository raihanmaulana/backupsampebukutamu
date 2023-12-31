@extends('layout.index')
@section('custom_top_script')
@stop

@section('content')
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>Kelola Katalog</h3>
            </div>
            <div class="module-body">
                <div class="controls">
                    <div class="d-flex align-items-center mb-3">

                        <select class="" id="category_fill">
                            @foreach ($kategori_list as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <a href="{{ URL::route('add-book-category') }}" style="margin-bottom:10px"
                            class="btn btn-inverse mr-2">Tambah
                            Kategori</a>
                        <a href="{{ URL::route('add-books') }}" style="margin-bottom:10px"
                            class="btn btn-inverse mr-2">Tambah
                            Buku</a>

                    </div>

                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ISBN</th>
                                <th>Judul Buku</th>
                                <th>Penerbit</th>
                                <th>Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Kategori</th>
                                {{-- <th>Stok</th>
                            <th>Available</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="all-books">
                            <tr class="text-center">
                                <td colspan="99"> <i class="icon-spinner icon-spin"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="hidden" name="" id="kategori_list" value="{{ json_encode($kategori_list) }}">
        </div>
    @stop

    @section('custom_bottom_script')
        <script type="text/javascript">
            var kategori_list = $('#kategori_list').val();
        </script>
        <script type="text/javascript" src="{{ asset('static/custom/js/script.addbook.js') }}"></script>
        <script type="text/template" id="allbooks_show">
        @include('underscore.allbooks_show')
</script>
    @stop
