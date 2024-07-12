@extends('layout.main-layout')
@section('content')
<main class="bg-light">
    <div class="p-2">
        <!-- start: Navbar -->
        @include('layout.partials.nav')
        <!-- end: Navbar -->

        <!-- start: Content -->
            <div class="container mt-5">
        <h3 class="mb-4 text-center">Daftar Pelajaran</h3>

        <a href="{{ route('pelajaran.create') }}" class="btn btn-primary mb-3">Tambah pelajaran</a>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama pelajaran</th>
                    <th>Tahun Pelajaran</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelajarans as $pelajaran)
                    <tr>
                        <td>{{ $pelajaran->id_pelajaran }}</td>
                        <td>{{ $pelajaran->name }}</td>
                        <td>{{ $pelajaran->tahun_ajaran }}</td>
                        <td>
                            {{-- <a href="{{ route('pelajaran.show', $pelajaran->id) }}" class="btn btn-info btn-sm">Lihat</a> --}}
                            <a href="{{ route('pelajaran.edit', $pelajaran->id_pelajaran) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pelajaran.destroy', $pelajaran->id_pelajaran) }}" method="POST" style="display:inline;">
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