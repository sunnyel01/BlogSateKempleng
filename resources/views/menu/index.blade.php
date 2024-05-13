@extends('adminlte.layouts.app')
@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
         <div class="container mt-5">
         <div class="card">
         <div class="card-header text-right">
        <a href="{{ route('createMenu') }}" class="btn btn-primary" role="button">Tambah Menu</a>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered" id="data-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Nama Kategori</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($menus as $menu)
                
                <tr>
                        <td> {{ $loop->index + 1 }}</td>
                        <td class="text-center">
                            <img src="{{ asset('/storage/menus/'. $menu->gambar)}}" class="rounded" style="width:50px">     
                        </td>
                        <td> {{ $menu->kategori ? $menu->kategori->nama_kategori: '-' }}</td>
                        <td> {{ $menu->nama_menu }}</td>
                        <td> {{ $menu->harga }}</td>
                        <td> {!! $menu->deskripsi !!} </td>
                        <td cols="2">
                            <a href="{{route('editMenu', ['id' => $menu->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a>
                            <a onclick="confirmDelete(this)"
                            data-url="{{ route('deleteMenu', ['id' => $menu->id]) }}"
                            class="btn btn-danger btn-sm" role="button">Hapus</a>
                          </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data Menu Belum Tersedia
                </div>
                
            
            </tbody>
            @endforelse
        </table>
    </div>
    </div>
         </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     
@endsection

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $("#data-table").DataTable();
    })
</script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Hapus',
                'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                'dangermode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endsection