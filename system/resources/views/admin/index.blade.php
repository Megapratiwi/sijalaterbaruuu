@extends('template.index')
@section('title', 'Beranda')
@section('mega')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang Di Sistem Informasi Peminjaman
                                    Laboratorium 🎉</h5>
                                <p class="mb-4">
                                    Politeknik Negeri Ketapang <span class="fw-bold"></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ url('public/admin') }}/assets/img/illustrations/man-with-laptop-light.png"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title text-primary mt-2">Jadwal Peminjaman Laboratorium</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                            data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true"
                                            aria-controls="accordionOne">
                                            Accordion Item 1
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @foreach ($daftartanggal as $tanggal)
                                        <li><a href="">{{ $tanggal }}</a></li>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($list_peminjaman as $peminjaman)
                                    <ul class="list-group border-top">
                                        <li class="list-group-item">
                                            Nama Peminjam
                                            <p class="float-end m-0">{{ $peminjaman->mahasiswa->nama }}</p>
                                        </li>
                                        <li class="list-group-item">
                                            Nama Laboratorium
                                            <p class="float-end m-0">{{ $peminjaman->laboratorium->nama_laboratorium }}</p>
                                        </li>
                                        <li class="list-group-item">
                                            Tanggal Peminjaman
                                            <p class="float-end m-0">{{ date('d F Y', strtotime($peminjaman->tanggal_peminjaman ))}}</p>
                                        </li>
                                        <li class="list-group-item">
                                            Tanggal Selesai
                                            <p class="float-end m-0">{{ date('d F Y', strtotime($peminjaman->tanggal_selesai ))}}</p>
                                        </li>
                                        <li class="list-group-item">
                                            Dari jam
                                            <p class="float-end m-0">{{ $peminjaman->waktu_mulai }}</p>
                                        </li>
                                        <li class="list-group-item">
                                            Sampai
                                            <p class="float-end m-0">{{ $peminjaman->waktu_selesai }}</p>
                                        </li>
                                    </ul>                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5 class="card-title text-primary">Peminjaman Alat</h5>
                                <hr>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
