@extends('admin.index')
@section('title', 'Prodi')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Prodi</h5>
                    <div class="m-3">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">Tambah Data Prodi</button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Prodi</th>
                                    <th>Nama Ketua Prodi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_prodi as $prodi)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-warning"
                                                    href="{{ "admin/editprodi/$prodi->id_prodi)" }}">
                                                    <i class="bx bxs-edit me-1"></i> Edit
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('admin/prodi', $prodi->id_prodi),
                                                ])
                                            </div>
                                        </td>
                                        <td>{{ $prodi->nama_prodi }}</td>
                                        <td>{{ $prodi->ketua_prodi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Contextual Classes -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Data Prodi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Nama Prodi</label>
                                <input type="text" class="form-control" name="nama_prodi" placeholder="Enter Name"
                                    required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Nama Ketua Prodi</label>
                                <input type="text" class="form-control" name="ketua_prodi" placeholder="Enter Name"
                                    required />
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
@endsection
