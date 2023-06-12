@extends('admin.index')
@section('title', 'Edit')
@section('mega')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Data Prodi</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/update', $prodi->id_prodi) }}" method="post" actype="multipart/form_data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Nama Prodi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" name="nama_prodi" value="{{ $prodi->nama_prodi }}"
                                    id="basic-icon-default-company" class="form-control" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Nama Ketua Prodi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" name="ketua_prodi" value="{{ $prodi->ketua_prodi }}"
                                    id="basic-icon-default-company" class="form-control" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" />
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
