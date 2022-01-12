@extends('vendor.head')
 
      {{-- Navbar --}}
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1" style="color: white">Majoo Teknologi Indonesia</span>
    </nav>

    {{-- Content --}}
    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <h3>Produk</h3>
                <div class="row">
                    @foreach ($catalog as $item)
                        <div class="col-md-3">
                            <div class="card mb-3 box-shadow" style="height: 500px;">
                                <img class="card-img-top"src="{{ asset('image/produk/' . $item->foto_produk) }}" alt="Card image cap">
                                <div class="card-body">
                                    <center>
                                        <p class="card-title">{{ $item->nama_produk }}</p>
                                        <b class="card-text"> <p>Rp. {{ $item->harga_produk }}</p> </b>
                                    </center>
                                    <p class="card-text">{{ $item->deskripsi_produk }}</p>
                                </div>
                                <div class="card-footer">
                                    <center>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Beli</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
          </div>
        </div>
    </main>
@extends('vendor.footer')