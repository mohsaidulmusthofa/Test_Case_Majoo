@extends('vendor.head')
    {{-- Pesan Eror/Succes --}}
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

    {{-- form login --}}
    <body class="text-center">
        <form class="form-signin" action="{{ route('login') }}" method="post">
            @csrf
            <img class="mb-4" src="{{ asset('image/majoo.jpg') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please LogIn</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required autofocus value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">LogIn</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
    </body>
@extends('vendor.footer')