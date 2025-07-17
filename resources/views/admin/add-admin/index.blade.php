@extends('layouts.master-admin')

@section('title', 'Kelola Admin')

@section('content')
<div class="container mt-4">
    <h3>Kelola Admin</h3>

    <div class="mb-4">
        <a href="{{ route('admin.create') }}" class="btn btn-primary rounded-3 shadow-sm menu-link text-white">
            + Tambah Admin Baru
        </a>
    </div>

    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $admin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-sm btn-warning rounded-3">Edit</a>
                                <form id="form-delete-admin{{ $admin->id }}" action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger rounded-3" onclick="confirmDeleteAdmin({{ $admin->id }})">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada admin terdaftar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection