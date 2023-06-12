@extends('template.mahasiswa')
@section('title', 'Alat')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Peminjaman Alat Mahasiswa</h5>
                    <div class="m-3">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalCenter">Tambah Data Peminjaman Alat</button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Nama Alat</th>
                                    <th>Jumlah Alat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_alatmahasiswa as $peminjaman_alatmahasiswa)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "show_alatmahasiswa/$peminjaman_alatmahasiswa->id_alat" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-warning"
                                                    href="{{ "edit_alatmahasiswa/$peminjaman_alatmahasiswa->id_alat" }}">
                                                    <i class="bx bxs-edit me-1"></i> Edit
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', ['url' => url('mahasiswa/peminjaman_alatmahasiswa', $peminjaman_alatmahasiswa->id_alat)])
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ $peminjaman_alatmahasiswa->laboratorium->nama_laboratorium }}</strong>
                                        </td>
                                        <td>{{ $peminjaman_alatmahasiswa->nama_alat }}</td>
                                        <td>{{ $peminjaman_alatmahasiswa->jumlah_alat }}</td>
                                        <td>
                                            @if ($peminjaman_alatmahasiswa->status == 1)
                                                <span class="badge bg-info">Pengajuan Baru</span>
                                            @endif
                                            @if ($peminjaman_alatmahasiswa->status == 2)
                                                <span class="badge bg-warning">Pengajuan Diproses</span>
                                            @endif
                                            @if ($peminjaman_alatmahasiswa->status == 3)
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
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data Peminjaman Alat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('mahasiswa/store_alatmahasiswa') }}" method="post" enctype="multipart/form-data">
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
                            <div class="row ">
                                <div class="col-md-6">
                                    <label for="dobWithTitle" class="form-label">Nama Alat</label>
                                    <input type="text" class="form-control" name="nama_alat"
                                        placeholder="....." />
                                </div>
                                <div class="col-md-6">
                                    <label for="dobWithTitle" class="form-label">Jumlah Alat</label>
                                    <input type="text" class="form-control" name="jumlah_alat"
                                        placeholder="....." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="dobWithTitle" class="form-label">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tanggal_peminjaman"
                                        placeholder="....." />
                                </div>
                                <div class="col-md-6">
                                    <label for="dobWithTitle" class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" placeholder="....." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="inputGroupSelect01">Waktu Mulai</label>
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
                                    <label class="form-label" for="inputGroupSelect01">Waktu Selesai</label>
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
                                    <label for="dobWithTitle" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" placeholder="....." />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
