@extends('layouts.master-admin')

@section('title', 'Edit Admin')

@section('content')
<div class="container mt-4">
    <h2 class="font-semibold text-xl mb-3">Edit Admin</h2>

    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password (biarkan kosong jika tidak diubah)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-success rounded-3">Simpan Perubahan</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary rounded-3 ms-2">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection