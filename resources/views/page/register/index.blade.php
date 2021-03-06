@extends('masterBackend')
@section('title', 'REGISTER PEGAWAI ')


@section('backend')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4">Data Pegawai</h1>
        <hr>
        <button class="btn btn-primary btn-icon-split mb-4" data-toggle="modal" data-target="#exampleModal">
            <span class="icon text-white-50">
                <i class="menu-icon fa fa-plus-square"></i>
            </span>
            <span class="text">Register Pegawai</span>
        </button>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('register-store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control " value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="username">Username</label>
                                    <input type="number" name="username" class="form-control "
                                        value="{{ old('username') }}">
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">Kode Pegawai</label>
                                    <input type="number" name="kode_user" class="form-control "
                                        value="{{ old('kode_user') }}">
                                    @error('kode_user')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Jenis Kelamin</label>
                                    <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin">
                                        <option selected>Pilih Option</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label>User Role</label>
                                    <select class="custom-select" id="inputGroupSelect01" name="user_role">
                                        <option selected>Pilih Option</option>
                                        <option value="admin">Admin</option>
                                        <option value="pegawai">Pegawai</option>
                                    </select>
                                    @error('user_role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="email">Email</label>
                                    <input type="text" name="email"
                                        class="form-control"
                                        value="{{ old('email') }}">
                                    @error('nama_pria')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password"
                                        @error('password') ins-invalid @enderror>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <button class="btn btn-primary" type="submit"
                                        onclick="return confirm('Data Sudah Benar ?')">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pegawai</th>
                                <th>Pegawai</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Jenis Kelamin</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $q)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $q->kode_user }}</td>
                                    <td>
                                        @if ($q->user_role === 'pegawai')
                                            <span class="badge badge-warning">{{ $q->user_role }}
                                            </span>
                                        @else
                                            <span class="badge badge-success">{{ $q->user_role }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $q->name }}</td>
                                    <td>{{ $q->email }}</td>
                                    <td>{{ $q->username }}</td>
                                    <td>{{ $q->jenis_kelamin }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info btn-circle"
                                            onclick="return confirm('fitur on going')">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{route('register-delete', $q->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-circle"
                                                onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')"></a>
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
