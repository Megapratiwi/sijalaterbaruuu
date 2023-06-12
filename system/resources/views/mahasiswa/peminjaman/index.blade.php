@extends('template.mahasiswa')
@section('title', 'Peminjaman')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Mahasiswa</h5>
                    <div class="m-3">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">Tambah Data Peminjaman</button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Keperluan Alat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_peminjamanmahasiswa as $peminjaman_mahasiswa)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "show_peminjamanmahasiswa/$peminjaman_mahasiswa->id_peminjaman" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', ['url' => url('mahasiswa/peminjaman_mahasiswa', $peminjaman_mahasiswa->id_peminjaman)])
                                            </div>
                                        </td>
                                        <td>{{ $peminjaman_mahasiswa->laboratorium->nama_laboratorium }}</td>
                                        <td>{{ $peminjaman_mahasiswa->tanggal_peminjaman }}</td>
                                        <td>{{ $peminjaman_mahasiswa->tanggal_selesai }}</td>
                                        <td>{{ $peminjaman_mahasiswa->waktu_mulai }}</td>
                                        <td>{{ $peminjaman_mahasiswa->waktu_selesai }}</td>
                                        <td>{{ $peminjaman_mahasiswa->keperluan_alat }}</td>
                                        <td>
                                            @if ($peminjaman_mahasiswa->status == 1)
                                                <span class="badge bg-info">Pengajuan Baru</span>
                                            @endif
                                            @if ($peminjaman_mahasiswa->status == 2)
                                                <span class="badge bg-warning">Pengajuan Diproses</span>
                                            @endif
                                            @if ($peminjaman_mahasiswa->status == 3)
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
    <div class="col-lg-4 col-md-6">
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data Peminjaman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('mahasiswa/store_peminjamanmahasiswa') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Nama Laboratorium</label>
                                        <select name="id_lab" class="form-control" id="inputGroupSelect01">
                                            <option selected>Pilih Nama Laboratorium</option>
                                            @foreach ($list_laboratorium as $laboratorium)
                                            <option value="{{ $laboratorium->id_lab }}">
                                                {{ $laboratorium->nama_laboratorium }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="dobWithTitle" class="form-label">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tanggal_peminjaman" placeholder="....." />
                                </div>
                                <div class="col-md-6">
                                    <label for="dobWithTitle" class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" placeholder="....." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="inputGroupSelect01">Waktu Mulai</label>
                                    <select name="waktu_mulai" class="form-select" id="inputGroupSelect01">
                                        <option selected>Options...</option>
                                        <option value="07.00">07.00</option>
                                        <option value="08.00">08.00</option>
                                        <option value="09.00">09.00</option>
                                        <option value="10.00">10.00</option>
                                        <option value="11.00">11.00</option>
                                        <option value="12.00">12.00</option>
                                        <option value="13.00">13.00</option>
                                        <option value="14.00">14.00</option>
                                        <option value="15.00">15.00</option>
                                        <option value="16.00">16.00</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="inputGroupSelect01">Waktu Selesai</label>
                                    <select name="waktu_selesai" class="form-select" id="inputGroupSelect01">
                                        <option selected>Options...</option>
                                        <option value="07.00">07.00</option>
                                        <option value="08.00">08.00</option>
                                        <option value="09.00">09.00</option>
                                        <option value="10.00">10.00</option>
                                        <option value="11.00">11.00</option>
                                        <option value="12.00">12.00</option>
                                        <option value="13.00">13.00</option>
                                        <option value="14.00">14.00</option>
                                        <option value="15.00">15.00</option>
                                        <option value="16.00">16.00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="dobWithTitle" class="form-label">Keperluan Alat</label>
                                    <input type="text" class="form-control" name="keperluan_alat" placeholder="....." />
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
