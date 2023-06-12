@extends('template.mahasiswa')
@section('title', 'Edit')
@section('content')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data Peminjaman</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('mahasiswa/update_peminjamanmahasiswa', $peminjaman_mahasiswa->id_peminjaman) }}" method="post" actype="multipart/form_data">
                @csrf
                @method('PUT')  
                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Nama Ruangan</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">\
                            <span id="basic-icon-default-phone2" class="input-group-text" ><i class='bx bx-door-open'></i></i ></span>
                            <input type="text" name="nama_laboratorium" value={{ $peminjaman_mahasiswa->laboratorium->nama_laboratorium }} id="basic-icon-default-phone" class="form-control phone-mask" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tanggal Peminjaman</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="tanggal_peminjaman" value="{{ $peminjaman_mahasiswa->tanggal_peminjaman }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tanggal Selesai</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="tanggal_selesai" value="{{ $peminjaman_mahasiswa->tanggal_selesai }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Waktu Mulai</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="waktu_mulai" value="{{ $peminjaman_mahasiswa->waktu_mulai }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Waktu Selesai</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="waktu_selesai" value="{{ $peminjaman_mahasiswa->waktu_selesai }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Keperluan Alat</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="keperluan_alat" value="{{ $peminjaman_mahasiswa->keperluan_alat }}" id="basic-icon-default-company" class="form-control" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Foto</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bx-photo-album'></i></span>
                            <input type="file" name="foto" value="{{ $peminjaman_mahasiswa->foto }}" accept=".jpg, .jpeg, .png" id="basic-icon-default-company" class="form-control" aria-describedby="basic-icon-default-company2" />
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