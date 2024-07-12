@extends('layout.main-layout')
@section('content')
<main class="bg-light">
    <div class="p-2">
        <!-- start: Navbar -->
        @include('layout.partials.nav')
        <!-- end: Navbar -->

        <!-- start: Content -->
            <h3 class="text-center mt-5">
                Selamat Datang di sistem <br>
                Jadwal Mengajar Guru <br>
                SD Al Muslim
            </h3>
        

        <!-- end: Content -->
    </div>
</main>
@endsection