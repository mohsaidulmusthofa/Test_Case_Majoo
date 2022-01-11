@extends('home')
@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('vkategori') }}">Data Kategori Produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Kategori Produk</li>
@endsection
@section('page-content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-white">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                {{-- form --}}
                                <form action="{{ route('store.kategori') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {{-- Nama Label --}}
                                                <label for="nama_kategori_produk" class="form-control-label">Nama
                                                    Kategori Produk</label>
                                                {{-- form input --}}
                                                <input class="form-control" type="text" name="nama_kategori_produk"
                                                    id="nama_kategori_produk" placeholder="Masukkan nama kategori produk ...">
                                                {{-- pesan error jika input tidak diisi/diisi tidak sesuai --}}
                                                @if ($errors->has('nama_kategori_produk'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('nama_kategori_produk') }}</small>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {{-- Nama Label --}}
                                                <label for="example-password-input" class="form-control-label">Foto Kategori
                                                    Produk</label>
                                                {{-- form input --}}
                                                <input name="foto_kategori_produk" id="foto_kategori_produk" accept="image/*"
                                                    onchange="previewProduk(this, 'preview')" class="form-control"
                                                    type="file" placeholder="Upload foto">
                                                <h6 class="text-danger">*Harap upload file berekstensi gambar
                                                </h6>
                                                {{-- pesan error jika input tidak diisi/diisi tidak sesuai --}}
                                                @if ($errors->has('foto_kategori_produk'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('foto_kategori_produk') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input type="hidden" name="blank" id="blank"
                                                    class="form-control border-dark small mb-3" placeholder="blank"
                                                    aria-describedby="basic-addon2">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            {{-- Preview Gambar --}}
                                            <div class="input-group">
                                                <img id="preview" src="preview" alt="" width="200px" /> <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {{-- Nama Label --}}
                                                <label class="form-control-label">Deskripsi Kategori Produk</label>
                                                {{-- form input --}}
                                                <textarea class="form-control" id="summernote"
                                                    name="deskripsi_kategori_produk"
                                                    placeholder="Masukkan deskripsi kategori produk ..."></textarea>
                                                {{-- pesan error jika input tidak diisi/diisi tidak sesuai --}}
                                                @if ($errors->has('deskripsi_kategori_produk'))<small style="padding-left: 0; margin-left: 0;" class="text-danger" role="alert">{{ $errors->first('deskripsi_kategori_produk') }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{-- Button Kembali --}}
                                        <a href="{{ route('vkategori') }}" class="btn btn-icon btn-danger"
                                            type="submit" style="margin-bottom: 0px">
                                            <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                            <span class="btn-inner--text">Kembali</span>
                                        </a>
                                        {{-- Button Tambah Produk --}}
                                        <button class="btn btn-icon btn-success" type="submit">
                                            <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                            <span class="btn-inner--text">Tambah Produk</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('template.footer')
    </div>

    {{-- SCRIPT Untuk Preview Gambar --}}
    <script type="text/javascript">
        function previewProduk(gambar, idpreview) {
            //                membuat objek gambar
            var gb = gambar.files;
            //                loop untuk merender gambFar
            for (var i = 0; i < gb.length; i++) {
                //                    bikin variabel
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview = document.getElementById(idpreview);
                var reader = new FileReader();
                if (gbPreview.type.match(imageType)) {
                    //                        jika tipe data sesuai
                    preview.file = gbPreview;
                    reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                    })(preview);
                    //                    membaca data URL gambar
                    reader.readAsDataURL(gbPreview);
                } else {
                    //                        jika tipe data tidak sesuai
                    alert(
                        "Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar."
                    );
                }
            }
        }
    </script>
@endsection
