@extends('template.index')
@section('title', 'Perlengkapan')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Alat Laboratorium</h5>
                    <div class="m-3">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">Tambah Data Alat Laboratorium</button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Laboratorium</th>
                                    <th>Nama Alat</th>
                                    <th>Jumlah Alat</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_alat as $alat)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info"
                                                    href="{{ "show_alat/$alat->id_alat" }}">
                                                    <i class="bx bx-info-circle me-1"></i> Lihat
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('admin/alat', $alat->id_alat),
                                                ])
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ $alat->laboratorium->nama_laboratorium }}</strong>
                                        </td>
                                        <td>{{ $alat->nama_alat }}</td>
                                        <td>{{ $alat->jumlah_alat }}</td>
                                        <td>{{ $alat->deskripsi }}</td>
                                        <td>
                                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                <li
                                                    data-bs-toggle="tooltip"data-popup="tooltip-custom"data-bs-placement="top"class="avatar avatar-xs pull-up"title="Detail">
                                                    <img src="{{ url("public/$alat->foto") }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </li>
                                            </ul>
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
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data alat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/storealat') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Nama Alat</label>
                                    <input type="text" class="form-control" name="nama_alat" placeholder="....."
                                        required />
                                </div>
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Jumlah Alat</label>
                                    <input type="text" class="form-control" name="jumlah_alat" placeholder="....."
                                        required />
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" placeholder="....." />
                                </div>
                                <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Foto Lab</label>
                                    <input type="file" class="form-control" name="foto" accept=".jpg, .jpeg, .png"
                                        placeholder="lampiran" required />
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