@extends('masterBackend')
@section('title', 'DATA | LAPORAN ')


@section('backend')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4">Data Belum Menikah</h1>
        <hr>
        <a href="{{route('laporan')}}" class="btn btn-primary btn-icon-split mb-4">
            <span class="text">Back to page laporan</span>
        </a>
        <form action="" method="GET">
            <div class="row mt-2">
                <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon">Start: &nbsp;</span>
                        <input type="date" class="form-control date" placeholder="yyyy-mm-dd"
                            value="{{ Request::get('start') ? Request::get('start') : '' }}" name="start" />
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon">End: &nbsp;</span>
                        <input type="date" class="form-control date" placeholder="yyyy-mm-dd"
                            value="{{ Request::get('end') ? Request::get('end') : '' }}" name="end" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <button class="btn btn-success" type="submit">Search</button>
                    @if (Request::get('start') and Request::get('end'))
                        <a href="{{route('status-pernikahan-rejected')}}" type="submit" class="btn btn-danger"
                            style="margin-left: 0.5em">Clear filter</a>
                    @endif
                </div>

            </div>
        </form>
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Pasangan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Cabang</th>
                                <th>Kode User</th>
                                <th>Jenis Data</th>
                                <th>Rak</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporanseluruhData as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_cabang }}</td>
                                    <td>{{ $item->kode_user }}</td>
                                    <td>{{ $item->jenisData->jenis_data }}</td>
                                    <td>{{ $item->rak->nama_rak }}</td>
                                    <td>{{ $item->status->nama_status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
