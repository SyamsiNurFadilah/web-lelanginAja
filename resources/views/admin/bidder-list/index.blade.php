@extends('layouts.master-admin')

@section('title', 'Daftar Penawar')

@section('content')
<div class="container mt-4">
    <h3>Daftar Penawar</h3>

    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($bidders as $bidder)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bidder->name }}</td>
                    <td>{{ $bidder->email }}</td>
                </tr>

                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada pendaftar.</td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
