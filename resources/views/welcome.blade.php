@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4 shadow-sm" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($profile)
<div class="row mb-5 align-items-center text-center text-md-start mt-3">
    <!-- Foto Profil -->
    <div class="col-12 col-md-3 mb-4 mb-md-0 d-flex justify-content-center">
        <!-- Card Bootstrap membulungkus foto -->
        <div class="card border-0 shadow-sm rounded-circle p-2">
            <img src="{{ $profile->foto ? asset('storage/photos/' . $profile->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($profile->nama) . '&background=random&size=180' }}" class="rounded-circle img-fluid" alt="Foto Profil" style="width: 180px; height: 180px; object-fit: cover;">
        </div>
    </div>
    
    <!-- Informasi Utama -->
    <div class="col-12 col-md-9">
        <div class="d-flex justify-content-center justify-content-md-between align-items-center mb-2 flex-wrap gap-2">
            <h1 class="display-6 display-md-4 fw-bold text-primary mb-0">{{ $profile->nama }}</h1>
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary shadow-sm rounded-pill px-3">✎ Edit Profil</a>
        </div>
        <h2 class="h5 text-secondary mb-2">NIM: {{ $profile->nim }}</h2>
        <p class="text-info mb-3 fw-medium">&#x1F4DE; {{ $profile->telepon ?? 'Belum diisi' }}</p>
        <p class="lead text-muted">{{ $profile->bio }}</p>
    </div>
</div>

<!-- Bagian Pengalaman Kerja -->
<div class="mb-5">
    <h3 class="mb-3 border-bottom pb-2">Pengalaman Kerja</h3>
    <!-- Sistem Grid Bootstrap: 1 kolom di mobile (col-12) dan 2 kolom di desktop (col-md-6) -->
    <div class="row">
        @foreach($pengalaman_kerja as $pengalaman)
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-sm h-100 border-0 bg-light">
                    <div class="card-body p-3 p-md-4">
                        <h5 class="card-title fw-bold text-dark">{{ $pengalaman['posisi'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-primary">{{ $pengalaman['perusahaan'] }}</h6>
                        <p class="card-text text-secondary mb-2"><small>{{ $pengalaman['tahun'] }}</small></p>
                        @if(isset($pengalaman['tanggung_jawab']))
                            <ul class="mt-3 small text-muted ps-3 mb-0">
                            @foreach($pengalaman['tanggung_jawab'] as $tj)
                                <li>{{ $tj }}</li>
                            @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tombol menuju Portofolio Spesifik -->
    <div class="mt-4">
        <a href="{{ route('portofolio.show', ['slug' => 'web-design']) }}" class="btn btn-outline-primary shadow-sm px-4">
            Lihat Portofolio: Web Design &rarr;
        </a>
    </div>
</div>

<!-- Bagian Pendidikan -->
<div class="mb-4">
    <h3 class="mb-3 border-bottom pb-2">Pendidikan</h3>
    <div class="row">
        @foreach($pendidikan as $edu)
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-sm h-100 border-0 bg-light">
                    <div class="card-body p-3 p-md-4">
                        <h5 class="card-title fw-bold text-dark">{{ $edu['jurusan'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-success">{{ $edu['institusi'] }}</h6>
                        <p class="card-text text-secondary mb-2"><small>{{ $edu['tahun'] }}</small></p>
                        @if(isset($edu['info_tambahan']))
                            <p class="small text-muted mt-2 mb-0">{{ $edu['info_tambahan'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bagian Keahlian -->
<div class="mb-5">
    <h3 class="mb-3 border-bottom pb-2">Keahlian (Skills)</h3>
    <div class="d-flex flex-wrap gap-2">
        @isset($keahlian)
            @foreach($keahlian as $skill)
                <span class="badge bg-secondary px-3 py-2 fw-normal">{{ $skill }}</span>
            @endforeach
        @endisset
    </div>
</div>

@else
<div class="alert alert-warning mt-5 text-center shadow-sm" role="alert">
    <strong>Perhatian!</strong> Data profil belum tersedia di database.
</div>
@endif

@endsection
