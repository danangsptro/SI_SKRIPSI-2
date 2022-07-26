@extends('masterBackend')
@section('title', 'DATA | LAPORAN ')


@section('backend')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4">Seluruh data maplop</h1>
        <hr>
        <a href="{{ route('laporan') }}" class="btn btn-primary btn-icon-split mb-4">
            <span class="text">Back to page laporan</span>
        </a>
        <a onclick="exportPdf()" class="btn btn-dark btn-icon-split mb-4">
            <span class="text">Print Laporan &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                    <path
                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                </svg></span>
        </a>
        <form action="{{route('laporan-semua-data')}}" method="GET">
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
                        <a href="{{ route('laporan-semua-data') }}" type="submit" class="btn btn-danger"
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
                                <th>Tanggal Input</th>
                                <th>Nama Maplop</th>
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
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->nama_maplop }}</td>
                                    <td>{{ $item->kode_cabang }}</td>
                                    <td>{{ $item->kode_user }}</td>
                                    <td>{{ $item->jenisData->jenis_data }}</td>
                                    <td>{{ $item->rak->nama_rak }}</td>
                                    <td>{{ $item->statusName->nama_status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('js')
    <script type="text/javascript">
        function exportPdf() {
            var start = $('input[name=start]').val();
            var end = $('input[name=end]').val();
            var url = "{{ route('laporan-print-pd-seluruh') }}?start=" + start + "&end=" + end;
            return window.open(url, '_blank');
        }
    </script>
@endsection
