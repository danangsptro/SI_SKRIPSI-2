@extends('masterBackend')
@section('title', 'DATA | EDIT PASANGAN')


@section('backend')
    <style>
        .card-content {
            margin-top: 5rem;
        }
    </style>

    <div class="container card-content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Pasangan</h6>
            </div>
            <div class="container-fluid mt-4 mb-4">
                <form method="POST" action="{{ route('maplop-update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label><strong>Nama Maplop</strong></label>
                                    <input type="text" class="form-control" name="nama_maplop"
                                        value="{{ $data->nama_maplop }}" required>
                                    @error('nama_maplop')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label><strong>Kode User</strong></label>
                                    <input type="text" class="form-control" name="kode_user"
                                        value="{{ $idUser->kode_user }}" readonly required>
                                    @error('kode_user')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="index_id"><strong>Status</strong></label>
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select name="status_id" class="custom-select" id="inputGroupSelect01">
                                        @foreach ($status as $ds)
                                            <option value="{{ $ds->id }}"
                                                {{ old('status_id') ?? $data->status_id == $ds->id ? 'selected' : '' }}>
                                                {{ $ds->nama_status }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="index_id"><strong>Jenis Data</strong></label>
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select name="jenis_data_id" class="custom-select" id="inputGroupSelect01">
                                        @foreach ($jenisData as $ds)
                                            <option value="{{ $ds->id }}"
                                                {{ old('jenis_data_id') ?? $data->jenis_data_id == $ds->id ? 'selected' : '' }}>
                                                {{ $ds->jenis_data }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenis_data_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="index_id"><strong>Rak</strong></label>
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select name="rak_id" class="custom-select" id="inputGroupSelect01">
                                        @foreach ($rak as $ds)
                                            <option value="{{ $ds->id }}"
                                                {{ old('rak_id') ?? $data->rak_id == $ds->id ? 'selected' : '' }}>
                                                {{ $ds->nama_rak }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('rak_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><strong>Kode Cabang</strong></label>
                                <input type="text" class="form-control" placeholder="Masukan kode cabang"
                                    name="kode_cabang" required value="{{ $data->kode_cabang }}">
                                @error('kode_cabang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" placeholder="Input nama maplop"
                                    required value="{{ $data->tanggal }}">
                                @error('tanggal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden"class="form-control" name="status"value="{{ $data->status }}" readonly required>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                        <a href="{{ route('maplop') }}" type="submit" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
