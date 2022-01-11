<!DOCTYPE html>
<html lang="en">

<head>
    <title>posmajoo</title>
    @include('template.header')
</head>

<body>
    @include('template.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        @include('template.topbar')
        <div class="header bg-secondary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('vproduk')}}"><i
                                                class="fas fa-home"></i></a></li>
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        </div>
                    </div>
                    @yield('dashboard')
                </div>
            </div>
        </div>
        @yield('page-content')
</body>

</html>