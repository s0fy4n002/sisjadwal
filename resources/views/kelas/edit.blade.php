@extends('layout.main-layout')
@section('content')
<main class="bg-light">
    <div class="p-2">
        <!-- start: Navbar -->
        @include('layout.partials.nav')
        <!-- end: Navbar -->

        <!-- start: Content -->
         <div class="container mt-5">
            <h5 class="mb-4">Edit Data Kelas</h5>

            <!-- Menampilkan pesan sukses jika ada -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert"> <!-- Pastikan tipe alert sesuai dengan kesalahan -->
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-8 offset-2">
                <!-- Formulir Edit -->
                    <div class="card">
                        <div class="card-body">
                              <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan PUT untuk pembaruan -->

                                <div class="mb-3">
                                    <label for="id" class="form-label">ID Tingkatan</label>
                                    <select class="form-control  @error('tingkatan_id') is-invalid @enderror" id="tingkatan_id" name="tingkatan_id">
                                            <option value="">-Pilih-</option>
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}" {{$level->id == $kelas->tingkatan_id ? "selected" : ""}}>{{$level->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('tingkatan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Kelas</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $kelas->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
    </div>

        <!-- end: Content -->
    </div>
</main>
@endsection
