@extends('layouts.master-admin')

@section('title', 'Verifikasi Pelelang')

@section('content')
<div class="container mt-4">
    <h3>Verifikasi Pelelang</h3>

    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Nama Usaha</th>
                        <th>Status</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($auctioneers as $auctioneer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $auctioneer->nama }}</td>
                        <td>{{ $auctioneer->no_telepon }}</td>
                        <td>{{ $auctioneer->nama_usaha }}</td>
                        <td>
                            @if($auctioneer->status == 'aktif')
                                <span class="badge bg-success">Disetujui</span>
                            @elseif($auctioneer->status == 'nonaktif')
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $auctioneer->id }}">
                                <i class="fas fa-eye"></i> Detail
                            </button>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <form action="{{ route('admin.auctioneer.approve', $auctioneer->id) }}" method="POST" style="margin: 0">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success btn-sm">Setujui</button>
                                </form>
                                <form action="{{ route('admin.auctioneer.reject', $auctioneer->id) }}" method="POST" style="margin: 0">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Detail Modal -->
                    <div class="modal fade" id="detailModal{{ $auctioneer->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $auctioneer->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel{{ $auctioneer->id }}">Detail Pendaftar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Nama:</strong> {{ $auctioneer->nama }}</p>
                            <p><strong>Alamat:</strong> {{ $auctioneer->alamat }}</p>
                            <p><strong>No Telepon:</strong> {{ $auctioneer->no_telepon }}</p>
                            <p><strong>Tanggal Lahir:</strong> {{ $auctioneer->tanggal_lahir }}</p>
                            <p><strong>No KTP:</strong> {{ $auctioneer->no_ktp }}</p>
                            <p><strong>Nama Usaha:</strong> {{ $auctioneer->nama_usaha }}</p>
                            <p><strong>Kategori Barang:</strong> {{ $auctioneer->kategori_barang }}</p>
                            <hr>
                            <p><strong>Foto KTP:</strong></p>
                            <img src="{{ asset('storage/'.$auctioneer->foto_ktp) }}" class="img-fluid mb-3 img-thumbnail rounded" style="max-width: 300px; max-height: 300px; object-fit: cover;">
                            <p><strong>Foto Profil:</strong></p>
                            <img src="{{ asset('storage/'.$auctioneer->foto_profil) }}" class="img-fluid img-thumbnail rounded" style="max-width: 300px; max-height: 300px; object-fit: cover;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- End Modal -->

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
