@extends('masterBackend')
@section('title', 'DATA | EDIT DATA REGISTER')


@section('backend')
    <style>
        .card-content {
            margin-top: 5rem;
        }
    </style>

    <div class="container card-content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Register</h6>
            </div>
            <div class="container-fluid mt-4 mb-4">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Masukan nama" name="name"
                                    required value="{{ $data->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Masukan email" name="email"
                                    required value="{{ $data->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="number" class="form-control" placeholder="Masukan username" name="username"
                                    required value="{{ $data->username }}">
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-group col-lg-6">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="user_role">
                                        <option value="Laki-laki {{ $data->user_role == 'Laki-laki' ? 'selected' : '' }}">
                                            Laki-laki</option>
                                        <option value="Perempuan {{ $data->user_role == 'Perempuan' ? 'selected' : '' }}">
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Kode User</label>
                                <input type="number" class="form-control" placeholder="Masukan kode user" name="kode_user"
                                    required value="{{ $data->kode_user }}">
                                @error('kode_user')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" placeholder="Masukan password" name="password"
                                    required value="{{ $data->password_exist }}">
                                    <input type="text" class="form-control" name="password_exist" @error('password') ins-invalid @enderror value="{{ $d->password_exist }}" required>

                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                        <a href="{{ route('register-user') }}" type="submit" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
