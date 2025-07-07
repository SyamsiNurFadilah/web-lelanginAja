@extends('layouts.master-auctioneer-registration')

@section('title', 'Form Pendaftaran lelang')

@section('content')
<div class="container-fluid py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4 text-center">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square me-2"></i> Form Pendaftaran Lelang
            </h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('auctioneer.form.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">No Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nomor KTP</label>
                        <input type="text" name="no_ktp" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Foto KTP</label>
                        <input type="file" name="foto_ktp" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" name="foto_profil" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Nama Usaha</label>
                        <input type="text" name="nama_usaha" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-send me-1"></i> Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
