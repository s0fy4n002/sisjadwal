@extends('layout.main-layout')
@section('content')
<main class="bg-light">
    <div class="p-2">
        <!-- start: Navbar -->
        @include('layout.partials.nav')
        <!-- end: Navbar -->

        <!-- start: Content -->
         <div class="container mt-5">
            <h5 class="mb-4">Edit Data Pelajaran</h5>

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
                              <form action="{{ route('pelajaran.update', $pelajaran->id_pelajaran) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan PUT untuk pembaruan -->

                               <div class="mb-3">
                                    <label for="id_pelajaran" class="form-label">ID Pelajaran</label>
                                     <input type="text" class="form-control @error('id_pelajaran') is-invalid @enderror" id="id_pelajaran" name="id_pelajaran" value="{{ old('id_pelajaran', $pelajaran->id_pelajaran) }}" required>
                                    @error('id_pelajaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama pelajaran</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $pelajaran->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Tahun Ajaran</label>
                                    <?php 
                                        $tahun_ajarans = [];
                                        for($i=date('Y'); $i >= 2010; $i-- ){
                                            $tahun_ajarans[] = $i;
                                        }
                                    ?>  
                                    <select class="form-control  @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" name="tahun_ajaran">
                                    <option value="">-Pilih-</option>
                                        @foreach($tahun_ajarans as $tahun)
                                            <option value="{{$tahun}}" {{ old('tahun_ajaran', $pelajaran->tahun_ajaran) == $tahun ? "selected":""}}>{{$tahun}}</option>
                                        @endforeach
                                    </select>
                                    @error('tahun_ajaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('pelajaran.index') }}" class="btn btn-secondary">Kembali</a>
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
