@extends('masterBackend')
@section('title', 'DATA | CREATE MAPLOP')


@section('backend')
    <style>
        .card-content {
            margin-top: 5rem;
        }
    </style>

    <div class="container card-content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Maplop</h6>
            </div>
            <div class="container-fluid mt-4 mb-4">
                <form method="POST" action="{{ route('maplop-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Maplop</label>
                                <input type="text" class="form-control" name="nama_maplop"
                                    placeholder="Input nama maplop" required>
                                @error('nama_maplop')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Kode User</label>
                                <input type="text" class="form-control" name="kode_user" value="{{ $idUser->kode_user }}"
                                    readonly required>
                                @error('kode_user')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label mb-1">Status</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="status_id">
                                        <option selected>Pilih Option</option>
                                        @foreach ($status as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_status }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label mb-1">Jenis Data</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="jenis_data_id">
                                        <option selected>Pilih Option</option>
                                        @foreach ($jenisData as $item)
                                            <option value="{{ $item->id }}" class="text-bold">
                                                {{ $item->jenis_data }}
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
                                <label class="control-label mb-1">Rak</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="rak_id">
                                        <option selected>Pilih Option</option>
                                        @foreach ($rak as $item)
                                            <option value="{{ $item->id }}" class="text-bold">
                                                {{ $item->nama_rak }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nama_rak')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Kode Cabang</label>
                                <input type="text" class="form-control" name="kode_cabang" required
                                    placeholder="input kode cabang">
                                @error('kode_cabang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" placeholder="Input nama maplop"
                                    required>
                                @error('tanggal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden"class="form-control" name="status" value="0" readonly required>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 hidden">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                        <a href="{{ route('maplop') }}" type="submit" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
