@extends('layout.main-layout')
@section('content')
<main class="bg-light">
    <div class="p-2">
        <!-- start: Navbar -->
        @include('layout.partials.nav')
        <!-- end: Navbar -->

        <!-- start: Content -->
            <div class="container mt-5">
        <h3 class="mb-4 text-center">Daftar Tingkatan</h3>

        <a href="{{ route('level.create') }}" class="btn btn-primary mb-3">Tambah Tingkatan</a>

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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $level)
                    <tr>
                        <td>{{ $level->id }}</td>
                        <td>{{ $level->name }}</td>
                        <td>
                            {{-- <a href="{{ route('level.show', $level->id) }}" class="btn btn-info btn-sm">Lihat</a> --}}
                            <a href="{{ route('level.edit', $level->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('level.destroy', $level->id) }}" method="POST" style="display:inline;">
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