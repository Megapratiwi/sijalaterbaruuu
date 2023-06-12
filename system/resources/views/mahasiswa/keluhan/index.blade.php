@extends('template.mahasiswa')
@section('title', 'Keluhan')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Keluhan Mahasiswa</h5>
                    <div class="m-3">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalCenter">Tambah Data Keluhan</button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Nama Alat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_keluhan_mahasiswa as $keluhan_mahasiswa)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "show_keluhanmahasiswa/$keluhan_mahasiswa->id_keluhan" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-warning"
                                                    href="{{ "edit_keluhanmahasiswa/$keluhan_mahasiswa->id_keluhan" }}">
                                                    <i class="bx bxs-edit me-1"></i> Edit
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('mahasiswa/keluhan_mahasiswa', $keluhan_mahasiswa->id_keluhan),
                                                ])
                                            </div>
                                        </td>
                                        <td>{{ $keluhan_mahasiswa->laboratorium->nama_laboratorium }}</td>
                                        <td>
                                            <strong>{{ $keluhan_mahasiswa->nama_alat }}</strong>
                                        </td>
                                        <td>{{ $keluhan_mahasiswa->tanggal_pengajuan}}</td>
                                        <td>{{ $keluhan_mahasiswa->deskripsi }}</td>
                                        <td>
                                            @if ($keluhan_mahasiswa->status == 1)
                                                <span class="badge bg-info">Pengajuan Baru</span>
                                            @endif
                                            @if ($keluhan_mahasiswa->status == 2)
                                                <span class="badge bg-warning">Pengajuan Diproses</span>
                                            @endif
                                            @if ($keluhan_mahasiswa->status == 3)
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
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data Keluhan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('mahasiswa/store_keluhanmahasiswa') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col mb-6">
                                    <label for="dobWithTitle" class="form-label">Nama Alat</label>
                                    <input type="text" class="form-control" name="nama_alat"
                                        placeholder="....." />
                                </div>
                                <div class="col mb-6">
                                    <label for="dobWithTitle" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" placeholder="....." />
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col mb-6">
                                    <label for="dobWithTitle" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="foto" placeholder="....." accept=".jpg, .png, .jpeg" />
                                </div>
                                <div class="col mb-6">
                                    <label for="dobWithTitle" class="form-label">Tanggal Pengajuan</label>
                                    <input type="date" class="form-control" name="tanggal_pengajuan"
                                        placeholder="....." />
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
