@extends('layout.main-layout')
@section('content')
<main class="bg-light">
    <div class="p-2">
        <!-- start: Navbar -->
        @include('layout.partials.nav')
        <!-- end: Navbar -->

        <!-- start: Content -->
            <div class="container mt-5">
        <h3 class="mb-4 text-center">Data Penjadwalan</h3>
        
        <div class="row no-print">
            <div class="col-12">
                <a href="{{ route('penjadwalan.create') }}" class="btn btn-primary mb-3">Tambah Penjadwalan</a>
                <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Laporan</a>
                <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Print Penjadwalan</a>
            </div>
        </div>

        <div class="row mb-3 no-print">
            <div class="col-4">
                <form action="{{ route('penjadwalan.index') }}" method="GET" class="d-flex">
                    <input name="key_search" type="text" class="form-control" value="{{$key_search}}" style="margin-right: 5px" placeholder="Cari">
                    <button type="submit" class="btn btn-danger">Search</button>
                </form>
            </div>
        </div>


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

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Jam Ke</th>
                            <th>Kelas</th>
                            <th>Nama Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>Jam Awal</th>
                            <th>Jam Selesai</th>
                            <th>Ubah & Hapus Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($penjadwalans as $penjadwalan)
                        <?php 
                            $jam_awal = new DateTime($penjadwalan->jam_slot->jam_awal);
                            $jam_selesai = new DateTime($penjadwalan->jam_slot->jam_selesai);
                        ?>
                            <tr>
                                <td>{{ $no++}}</td>
                                <td>{{ $penjadwalan->jam_slot->hari->name }}</td>
                                <td>{{ $penjadwalan->jam_slot->jam_ke }}</td>
                                <td>{{ $penjadwalan->kelas->level->name ." ". $penjadwalan->kelas->name }}</td>
                                <td>{{ $penjadwalan->pelajaran->name }}</td>
                                <td>{{ $penjadwalan->guru->name }}</td>
                                <td>{{ $jam_awal->format("H:i") }}</td>
                                <td>{{ $jam_selesai->format("H:i") }}</td>
                                <td>
                                    {{-- <a href="{{ route('penjadwalan.show', $penjadwalan->id) }}" class="btn btn-info btn-sm">Lihat</a> --}}
                                    <a href="{{ route('penjadwalan.edit', $penjadwalan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('penjadwalan.destroy', $penjadwalan->id) }}" method="POST" style="display:inline;">
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
        </div>
    </div>
        

        <!-- end: Content -->
    </div>
</main>
@endsection