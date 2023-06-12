@extends('template.kalab')
@section('kalab')
@section('title', 'peminjaman lab')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Mahasiswa</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Keperluan Alat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_peminjamankalab as $peminjaman_kalab)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "show_peminjamankalab/$peminjaman_kalab->id_peminjaman" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $peminjaman_kalab->laboratorium->nama_laboratorium }}</td>
                                        <td>{{ $peminjaman_kalab->keperluan_alat }}</td>
                                        <td>
                                            @if ($peminjaman_kalab->status == 1)
                                                <span class="badge bg-info">Pengajuan Baru</span>
                                            @endif
                                            @if ($peminjaman_kalab->status == 2)
                                                <span class="badge bg-warning">Pengajuan Diproses</span>
                                            @endif
                                            @if ($peminjaman_kalab->status == 3)
                                                <span class="badge bg-success">Pengajuan Selesai</span>
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