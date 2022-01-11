<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>POS|Majoo</title>
  </head>
  <body>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>