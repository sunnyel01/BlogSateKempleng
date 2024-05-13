@extends('adminlte.layouts.app')
 @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('daftarMenu')}}">Menu</a></li>
              <li class="breadcrumb-item active">Tambah Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="container mt-5">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <form action="{{ route('storeMenu') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="deskripsi">Nama Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori" required="required">
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">GAMBAR</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                            name="gambar">

                        <!-- error message untuk title -->
                        @error('gambar')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">NAMA MENU</label>
                        <input type="text" class="form-control @error('nama_menu') is-invalid @enderror"
                            name="nama_menu" value="{{ old('nama_menu') }}" placeholder="Masukkan Nama Menu">

                        <!-- error message untuk title -->
                        @error('nama_menu')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">HARGA</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror"
                            name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga">

                        <!-- error message untuk title -->
                        @error('harga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label class="font-weight-bold">KONTEN</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                            placeholder="Masukkan Deskripsi Menu">{{ old('deskripsi') }}</textarea>

                        <!-- error message untuk content -->
                        @error('deskripsi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>

                </form>
            </div>
        </div>
    </div>
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'deskripsi' );
</script>
@endsection