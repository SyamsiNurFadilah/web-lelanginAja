@extends('layouts.master-admin')

@section('content')
<div class="container mt-4">
    <h3>Daftar Pelelang</h3>

    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($auctioneers as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->status === 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @elseif ($user->status === 'ditangguhkan')
                                    <span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>
                                @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->status !== 'nonaktif')
                                    <form id="form-block-{{ $user->id }}" action="{{ route('auctioneer.block', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="button" class="btn btn-sm btn-dark rounded-3 px-3" onclick="confirmBlock({{ $user->id }})">
                                            Blokir
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-secondary rounded-3 px-3" disabled>
                                        Sudah Diblokir
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Tidak ada pelelang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
