{{-- Menghubungkan dengan Template Utama --}}
@extends('home')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
@endsection

@section('page-content')
    <div class="container-fluid mt--6">
        {{-- Pesan Success / Error --}}
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
                        {{-- Tombol Tambah Produk --}}
                        <div class="btntambah mb-3">
                            <a href="{{ route('create.produk') }}" class="btn btn-icon btn-success" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                <span class="btn-inner--text">Tambah Produk</span>
                            </a>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="table-responsive">
                                    <div style="overflow-y: auto;">
                                        {{-- Tabel Produk --}}
                                        <table class="table align-items-center">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="no">No
                                                    </th>
                                                    <th scope="col" class="sort" data-sort="nama">
                                                        Nama Produk</th>
                                                    <th scope="col" class="sort" data-sort="harga">
                                                        Harga Produk</th>
                                                    <th scope="col" class="sort" data-sort="deskripsi">
                                                        Deskripsi Produk</th>
                                                    <th scope="col" class="sort" data-sort="foto">
                                                        Foto Produk</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                 @foreach ($data_produk as $key => $item)
                                                    <tr>
                                                        <td>{{ $data_produk->firstItem() + $key }}</td>
                                                        <td>{{ $item->nama_produk }}</td>
                                                        <td>Rp. {{ number_format($item->harga_produk) }}</td>
                                                        <td>{!! html_entity_decode($item->deskripsi_produk) !!}</td>
                                                        <td>
                                                            <img src="{{ asset('/image/produk/' . $item->foto_produk) }}"
                                                                alt="img" width="100px">
                                                        </td>
                                                        <td>
                                                            {{-- Tombol Edit --}}
                                                            <a href="{{ route('edit.produk', $item->id_produk) }}"
                                                                style="margin-bottom: 0" class="btn btn-icon btn-primary"
                                                                type="button">
                                                                <span class="btn-inner--icon text-white"><i
                                                                        class="ni ni-ruler-pencil"></i></span>
                                                                <span class="btn-inner--text text-white">Edit</span>
                                                            </a>
                                                            {{-- Tombol Delete --}}
                                                            <a href="{{ 'delete.produk', $item->id_produk }}"
                                                                class="btn btn-icon btn-danger btn-rounded-circle"
                                                                type="button" onclick="confirm_modal('')"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $item->id_produk }}">
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
                                        @foreach ($data_produk as $row)
                                            <div class="modal fade" id="deleteModal{{ $row->id_produk }}"
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
                                                            <a href="{{ route('delete.produk', $row->id_produk) }}"
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
                                    {{ $data_produk->links() }}
                                </div>
                                <div class="mt-2" style="float: left">
                                    showing
                                    {{ $data_produk->firstItem() }}
                                    to
                                    {{ $data_produk->lastItem() }}
                                    of
                                    {{ $data_produk->total() }}
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
