@extends('template.index')
@section('title', 'Keluhan')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Alat Keluhan Mahasiswa</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Alat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>                                    
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_keluhanmahasiswa as $keluhan)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "showkeluhan/$keluhan->id_keluhan" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('admin/keluhan', $keluhan->id_keluhan),
                                                ])
                                            </div>
                                            @if ($keluhan->status == 1)
                                                <div class="btn-group">
                                                    <form action="{{ url("admin/proses/$keluhan->id_keluhan") }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-outline-warning">Proses</button>
                                                    </form>
                                                </div>                                                
                                            @endif
                                            @if ($keluhan->status == 2)
                                                <div class="btn-group">
                                                    <form action="{{ url("admin/selesai/$keluhan->id_keluhan") }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-outline-success">Selesai</button>
                                                    </form>                                                
                                                </div>                                                
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $keluhan->nama_alat }}</strong>
                                        </td>
                                        <td>{{ $keluhan->tanggal_pengajuan}}</td>
                                        <td>{{ $keluhan->deskripsi }}</td>
                                        <td>
                                            @if ($keluhan->status == 1)
                                                <span class="badge bg-info">Pengajuan Baru</span>
                                            @endif
                                            @if ($keluhan->status == 2)
                                                <span class="badge bg-warning">Pengajuan Diproses</span>
                                            @endif
                                            @if ($keluhan->status == 3)
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
                        <form action="{{ url('admin/store_keluhanmahasiswa') }}" method="post" enctype="multipart/form-data">
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
                                    <input type="file" class="form-control" name="foto" placeholder="....." />
                                </div>
                                <div class="col mb-6">
                                    <label for="dobWithTitle" class="form-label">Tanggal Pengajuan</label>
                                    <input type="date" class="form-control" name="tanggal_pengajuan"
                                        placeholder="....." />
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
