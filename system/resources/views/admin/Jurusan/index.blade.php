@extends('template.index')
@section('title', 'Jurusan')
@section('mega')
    <!-- Contextual Classes -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data Jurusan</h5>
                    <div class="m-3">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">Tambah Data Jurusan</button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nama Jurusan</th>
                                    <th>Nama Ketua Jurusan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_jurusan as $jurusan)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-warning"
                                                    href="{{ "admin/editjurusan/$jurusan->id_jurusan)" }}">
                                                    <i class="bx bxs-edit me-1"></i> Edit
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                @include('admin.utils.delete', [
                                                    'url' => url('admin/jurusan', $jurusan->id_jurusan),
                                                ])
                                            </div>
                                        </td>
                                        <td>{{ $jurusan->nama_jurusan }}</td>
                                        <td>{{ $jurusan->ketua_jurusan }}</td>
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
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Data Jurusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/storejurusan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Nama Jurusan</label>
                                <input type="text" class="form-control" name="nama_jurusan" placeholder="Enter Name"
                                    required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Nama Ketua Jurusan</label>
                                <input type="text" class="form-control" name="ketua_jurusan" placeholder="Enter Name"
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
