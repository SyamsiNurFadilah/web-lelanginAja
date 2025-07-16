@extends('layouts.master-auctioneer-registration')

@section('title', 'Menunggu Verifikasi')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-5 text-center" style="max-width: 600px; width: 100%;">
        <div class="mb-4">
            <i class="fas fa-hourglass-half fa-5x text-warning"></i>
        </div>
        <h1 class="mb-3 text-primary">Pendaftaran Berhasil!</h1>
        <p class="text-muted fs-5">
            Akun Anda sedang dalam proses verifikasi oleh admin.
            <br>
            Mohon tunggu hingga akun Anda disetujui.
        </p>
    </div>
</div>
@endsection