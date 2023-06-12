@extends('template.index')
@section('title', 'Peminjaman')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Keperluan Alat</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_peminjaman as $peminjaman)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "showpeminjaman/$peminjaman->id_peminjaman" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('admin/peminjaman', $peminjaman->id_peminjaman),
                                                ])
                                            </div>
                                            @if ($peminjaman->status == 1)
                                                <div class="btn-group">
                                                    <form action="{{ url("admin/peminjaman_lab/setuju/$peminjaman->id_peminjaman") }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-outline-success">Setuju</button>
                                                    </form>
                                                </div>                                                
                                                <div class="btn-group">
                                                    <form action="{{ url("admin/peminjaman_lab/tolak/$peminjaman->id_peminjaman") }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-outline-danger">Ditolak</button>
                                                    </form>
                                                </div>                                                
                                            @endif
                                        </td>
                                        <td>{{ $peminjaman->mahasiswa->nama }}</td>
                                        <td>
                                            <strong>{{ $peminjaman->laboratorium->nama_laboratorium }}</strong>
                                        </td>
                                        <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                                        <td>{{ $peminjaman->tanggal_selesai }}</td>
                                        <td>{{ $peminjaman->keperluan_alat }}</td>
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