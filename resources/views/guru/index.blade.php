@extends('layout.main-layout')
@section('content')
<main class="bg-light">
    <div class="p-2">
        <!-- start: Navbar -->
        @include('layout.partials.nav')
        <!-- end: Navbar -->

        <!-- start: Content -->
            <div class="container mt-5">
        <h3 class="mb-4 text-center">Daftar Guru</h3>

        <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gurus as $guru)
                    <tr>
                        <td>{{ $guru->id }}</td>
                        <td>{{ $guru->name }}</td>
                        <td>{{ $guru->jenis_kelamin ==1 ? 'Laki - Laki' : 'Perempuan' }}</td>
                        <td>
                            <a href="{{ route('guru.show', $guru->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        

        <!-- end: Content -->
    </div>
</main>
@endsection