@extends('layout.main-layout')

@section('content')
<main class="bg-light">
    <div class="p-2">
        <!-- start: Navbar -->
        @include('layout.partials.nav')
        <!-- end: Navbar -->

        <!-- start: Content -->
        <div class="container mt-5">
            <h5 class="mb-4">Detail Data Pelajaran</h5>

            <!-- Menampilkan pesan sukses jika ada -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-8 offset-2">
                    <!-- Card untuk menampilkan detail pelajaran -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi pelajaran</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>ID:</strong> {{ $pelajaran->id }}</li>
                                <li class="list-group-item"><strong>Nama:</strong> {{ $pelajaran->name }}</li>
                                <li class="list-group-item"><strong>Tingkatan:</strong> {{ $pelajaran->level->name }}</li>
                            </ul>
                            <div class="mt-3">
                                <a href="{{ route('pelajaran.edit', $pelajaran->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('pelajaran.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Content -->
    </div>
</main>
@endsection
