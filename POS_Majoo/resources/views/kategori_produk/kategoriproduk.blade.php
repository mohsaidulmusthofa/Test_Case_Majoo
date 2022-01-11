{{-- Menghubungkan dengan Template Utama --}}
@extends('home')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Data Kategori Produk</li>
@endsection

@section('page-content')
    <div class="container-fluid mt--6">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-white">
                    <div class="card-header bg-transparent">
                        {{-- Tombol Tambah Kategori Produk --}}
                        <div class="btntambah mb-3">
                            <a href="{{ route('create.kategori') }}" class="btn btn-icon btn-success" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                <span class="btn-inner--text">Tambah Kategori Produk</span>
                            </a>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="table-responsive">
                                    <div style="overflow-y: auto;">
                                        {{-- Tabel Kategori Produk --}}
                                        <table class="table align-items-center">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="no">No
                                                    </th>
                                                    <th scope="col" class="sort" data-sort="nama">
                                                        Kategori Produk</th>
                                                    <th scope="col" class="sort" data-sort="deskripsi">
                                                        Deskripsi Kategori Produk</th>
                                                    <th scope="col" class="sort" data-sort="foto">
                                                        Foto Kategori Produk</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                 @foreach ($data_kategori as $key => $item)
                                                    <tr>
                                                        <td>{{ $data_kategori->firstItem() + $key }}</td>
                                                        <td>{{ $item->nama_kategori_produk }}</td>
                                                        <td>{!! html_entity_decode($item->deskripsi_kategori_produk) !!}</td>
                                                        <td>
                                                            <img src="{{ asset('/image/kategori_produk/' . $item->foto_kategori_produk) }}"
                                                                alt="img" width="100px">
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('edit.kategori', $item->id_kategori_produk) }}"
                                                                style="margin-bottom: 0" class="btn btn-icon btn-primary"
                                                                type="button">
                                                                <span class="btn-inner--icon text-white"><i
                                                                        class="ni ni-ruler-pencil"></i></span>
                                                                <span class="btn-inner--text text-white">Edit</span>
                                                            </a>
                                                            <a href="{{ route('delete.kategori', $item->id_kategori_produk) }}"
                                                                class="btn btn-icon btn-danger btn-rounded-circle"
                                                                type="button" onclick="confirm_modal('')"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $item->id_kategori_produk }}">
                                                                <span class="btn-inner--icon text-white"><i
                                                                        class="ni ni-fat-remove"></i></span>
                                                                <span class="btn-inner--text text-white">Delete</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- Delete Modal -->
                                        @foreach ($data_kategori as $row)
                                            <div class="modal fade" id="deleteModal{{ $row->id_kategori_produk }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah
                                                                anda yakin ingin menghapus data?</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Pilih tombol cancel untuk kembali, dan pilih tombol
                                                                delete untuk menghapus.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal"
                                                                style="margin-bottom: 0;">Cancel</button>
                                                            <a href="{{ route('delete.kategori', $row->id_kategori_produk) }}"
                                                                type="button" class="btn btn-success">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- Pagination in Laravel with bootstrap --}}
                                <div class="mt-2" style="float: right">
                                    {{ $data_kategori->links() }}
                                </div>
                                <div class="mt-2" style="float: left">
                                    showing
                                    {{ $data_kategori->firstItem() }}
                                    to
                                    {{ $data_kategori->lastItem() }}
                                    of
                                    {{ $data_kategori->total() }}
                                    entries
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('template.footer')
            </div>
        </div>
    </div>    
@endsection
