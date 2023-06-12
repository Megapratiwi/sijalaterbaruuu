@extends('template.index')
@section('title', 'Alat')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Alat</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Nama Alat</th>
                                    <th>Jumlah Alat</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_peminjamanalat as $peminjaman_alat)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "show_peminjamanalat/$peminjaman_alat->id_alat" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('admin/alat', $peminjaman_alat->id_alat),
                                                ])
                                            </div>
                                            @if ($peminjaman_alat->status == 1)
                                                <div class="btn-group">
                                                    <form action="{{ url("admin/peminjaman_alat/setuju/$peminjaman_alat->id_alat") }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-outline-success">Setuju</button>
                                                    </form>
                                                </div>                                                
                                                <div class="btn-group">
                                                    <form action="{{ url("admin/peminjaman_alat/tolak/$peminjaman_alat->id_alat") }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-outline-danger">Ditolak</button>
                                                    </form>
                                                </div>                                                
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $peminjaman_alat->laboratorium->nama_laboratorium }}</strong>
                                        </td>
                                        <td>{{ $peminjaman_alat->nama_alat }}</td>
                                        <td>{{ $peminjaman_alat->jumlah_alat }}</td>
                                        <td>{{ $peminjaman_alat->deskripsi }}</td>
                                        <td>
                                            @if ($peminjaman_alat->status == 1)
                                                <span class="badge bg-info">Pengajuan Baru</span>
                                            @endif
                                            @if ($peminjaman_alat->status == 2)
                                                <span class="badge bg-success">Pengajuan Selesai</span>
                                            @endif
                                            @if ($peminjaman_alat->status == 3)
                                                <span class="badge bg-danger">Pengajuan Ditolak</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
