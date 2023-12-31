@extends('template.kalab')
@section('kalab')
    <div class="col-xl-12">
    <h6 class="text-muted">Info Data Peminjaman Alat Mahasiswa</h6>
    <div class="nav-align-top mb-12">
        <ul class="nav nav-pills mb-6" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Info</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">Foto</button>
            </li>
        </ul>
        <div class="tab-content">
            @csrf
            <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                <dl class="row mt-2">
                    <dt class="col-sm-3">Nama Laboratorium</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_alatkalab->laboratorium->nama_laboratorium }}</dd>

                    <dt class="col-sm-3">Nama Alat</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_alatkalab->nama_alat }}</dd>

                    <dt class="col-sm-3">Jumlah Alat</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_alatkalab->jumlah_alat }}</dd>

                    <dt class="col-sm-3">Tanggal Peminjaman</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_alatkalab->tanggal_peminjaman }}</dd>

                    <dt class="col-sm-3">Tanggal Selesai</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_alatkalab->tanggal_selesai }}</dd>

                    <dt class="col-sm-3">Waktu Mulai</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_alatkalab->waktu_mulai }}</dd>

                    <dt class="col-sm-3">Waktu Selesai</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_alatkalab->waktu_selesai }}</dd>

                    <dt class="col-sm-3">Deskripsi</dt>
                    <dd class="col-sm-9"> : {{ $peminjaman_alatkalab->deskripsi }}</dd>
                </dl>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                <p>
                    Detail Alat
                </p>
                {{-- <p class="mb-0">
                    <img src="{{ url("public/$alat->foto") }}" alt=""style="width: 50%; height: 50%;">
                </p> --}}
            </div>
        </div>
    </div>
</div>
@endsection