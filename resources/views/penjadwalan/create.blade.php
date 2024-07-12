@extends('layout.main-layout')
@section('content')
<main class="bg-light">
    <div class="p-2">
        <!-- start: Navbar -->
        @include('layout.partials.nav')
        <!-- end: Navbar -->

        <!-- start: Content -->
         <div class="container mt-5">
            <h5 class="mb-4">Tambah Data Penjadwalan</h5>

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
            @if (session('error_detail'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error_detail') }}
                </div>
            @endif

            <div class="row">
                <div class="col-8 offset-2">
                <!-- Formulir Create -->
                    <div class="card">
                        <div class="card-body">
                              <form action="{{ route('penjadwalan.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6 col-sm-12">
                                        <label for="pelajaran_id" class="form-label">Nama Mata Pelajaran</label>
                                        <select class="form-control  @error('pelajaran_id') is-invalid @enderror" id="pelajaran_id" name="pelajaran_id">
                                        <option value="">-Pilih-</option>
                                            @foreach($pelajarans as $pelajaran)
                                                <option value="{{$pelajaran->id_pelajaran}}" {{ old('pelajaran_id') == $pelajaran->id_pelajaran ? "selected":""}}>{{$pelajaran->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('pelajaran_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6 col-sm-12">
                                        <label for="guru_id" class="form-label">Nama Guru</label>
                                         <select class="form-control  @error('guru_id') is-invalid @enderror" id="guru_id" name="guru_id">
                                        <option value="">-Pilih-</option>
                                            @foreach($gurus as $guru)
                                                <option value="{{$guru->id}}" {{ old('guru_id') == $guru->id ? "selected":""}}>{{$guru->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('guru_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row">
                                   <div class="mb-3 col-md-6 col-sm-12">
                                        <label for="kelas_id" class="form-label">Kelas</label>
                                        <select class="form-control  @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id">
                                        <option value="">-Pilih-</option>
                                            @foreach($kelass as $kelas)
                                                <option value="{{$kelas->id}}" {{ old('kelas_id') == $kelas->id ? "selected":""}}>{{$kelas->level->name ."-". $kelas->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('kelas_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                   {{-- jika belum di atur alert hari tsb blm di atur --}}
                                   <div class="mb-3 col-md-6 col-sm-12">
                                        <label for="jam_slot_id" class="form-label">Slot</label>
                                        <select class="form-control  @error('jam_slot_id') is-invalid @enderror" id="jam_slot_id" name="jam_slot_id">
                                        <option value="">-Pilih-</option>
                                            @foreach($jam_slots as $slot)
                                                <option value="{{$slot->id}}" {{ old('jam_slot_id') == $slot->id ? "selected":""}}>{{$slot->hari->name." Jam ke ".$slot->jam_ke." ".$slot->jam_mulai." s/d ".$slot->jam_selesai}}</option>
                                            @endforeach
                                        </select>
                                        @error('jam_slot_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                   
                                   <div class="mb-3 col-md-6 col-sm-12">
                                        <div class="">
                                            <button type="submit" class="btn btn-success">Tambah</button>
                                             <a href="{{ route('penjadwalan.index') }}" class="btn btn-primary">Kembali</a>
                                        </div>
                                    </div>
                                </div>
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