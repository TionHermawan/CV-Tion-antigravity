@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8 mb-5">
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                <h4 class="mb-0 fw-bold">Edit Profil CV</h4>
            </div>
            <div class="card-body p-4 p-md-5 bg-white">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="nama" class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-lg shadow-sm @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $profile->nama ?? '') }}" placeholder="Masukkan nama lengkap">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nim" class="form-label fw-semibold text-secondary">NIM</label>
                        <input type="text" class="form-control form-control-lg shadow-sm @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $profile->nim ?? '') }}" placeholder="Masukkan Nomor Induk Mahasiswa">
                        @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="form-label fw-semibold text-secondary">Upload Foto</label>
                        <div class="d-flex align-items-center gap-3">
                            <img id="fotoPreview" src="{{ ($profile->foto ?? false) ? asset('storage/photos/' . $profile->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($profile->nama ?? 'User') . '&background=random&size=100' }}" alt="Preview Foto" class="rounded-circle img-thumbnail shadow-sm" style="width: 80px; height: 80px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <input type="file" class="form-control form-control-lg shadow-sm @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold text-secondary">Email</label>
                        <input type="email" class="form-control form-control-lg shadow-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $profile->email ?? '') }}" placeholder="Masukkan alamat email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label fw-semibold text-secondary">Alamat</label>
                        <textarea class="form-control form-control-lg shadow-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat domisili saat ini">{{ old('alamat', $profile->alamat ?? '') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="bio" class="form-label fw-semibold text-secondary">Bio / Deskripsi Diri</label>
                        <textarea class="form-control form-control-lg shadow-sm @error('bio') is-invalid @enderror" id="bio" name="bio" rows="5" placeholder="Tuliskan biografi singkat atau ringkasan profesional Anda">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                        <a href="{{ route('cv.profile') }}" class="btn btn-light border shadow-sm btn-lg px-4 text-secondary fw-medium">Batal</a>
                        <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm fw-medium">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('fotoPreview');
        output.src = reader.result;
    };
    if(event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>
@endsection
