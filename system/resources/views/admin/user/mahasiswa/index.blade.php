@extends('template.index')
@section('title', 'User')
@section('mega')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Data User Mahasiswa</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Nim</th>
                                    <th>Username</th>
                                    <th>No. Handphone</th>
                                    <th>Semester</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 mb-2">
                                @foreach ($list_mahasiswa as $mahasiswa)
                                    <tr class="table-default">
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-info" href="{{"showmahasiswa/$mahasiswa->id_mahasiswa"}}">
                                                    <i class="bx bx-info-circle me-1"></i>  Info
                                                </a> 
                                            </div>
                                            <div class="btn-group">
                                                 @include('admin.utils.delete', ['url' => url('admin/mahasiswa', $mahasiswa->id_mahasiswa)])
                                            </div>
                                        </td>
                                        <td>{{ $mahasiswa->nim }}</td>
                                        <td>{{ $mahasiswa->username }}</td>
                                        <td>{{ $mahasiswa->no_hp }}</td>
                                        <td>{{ $mahasiswa->semester }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
