@extends('masterBackend')
@section('title', 'DATA | MAPLOP')


@section('backend')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4">Data Maplop</h1>
        <hr>
        @if (Auth::user()->user_role !== 'pimpinan')
            <a href="{{ route('maplop-create') }}" class="btn btn-primary btn-icon-split mb-4">
                <span class="icon text-white-50">
                    <i class="menu-icon fa fa-plus-square"></i>
                </span>
                <span class="text">Create Maplop</span>
            </a>
        @endif

        <form action="{{ route('maplop') }}" method="GET">
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
                        <a href="{{ route('maplop') }}" type="submit" class="btn btn-danger"
                            style="margin-left: 0.5em">Clear filter</a>
                    @endif
                </div>
            </div>
        </form>
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Maplop</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Input</th>
                                <th>Nama Maplop</th>
                                <th>Kode User</th>
                                <th>Rak</th>
                                <th>Jenis Data</th>
                                <th>Kode Cabang</th>
                                <th>Status Maplop</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->nama_maplop }}</td>
                                    <td>{{ $item->kode_user }}</td>
                                    <td>{{ $item->rak->nama_rak }}</td>
                                    <td>{{ $item->jenisData->jenis_data }}</td>
                                    <td>{{ $item->kode_cabang }}</td>
                                    <td>{{ $item->statusName->nama_status }}</td>
                                    @if ($item->status === 1)
                                        <td class="text-success">APPROVED</td>
                                    @else
                                        <td class="text-danger">REJECTED</td>
                                    @endif
                                    @if (Auth::user()->user_role === 'admin')
                                        <td class="text-center">
                                            @if ($item->status === 0)
                                                <a href="{{ route('maplop-edit', $item->id) }}"
                                                    class="btn btn-info btn-circle">
                                                    <i class="fas fa-pen"></i>
                                                </a>

                                                <form action="{{ route('maplop-delete', $item->id) }}" class="d-inline"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-circle"
                                                        onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    @elseif(Auth::user()->user_role === 'pimpinan')
                                        <td class="text-center">
                                            @if ($item->status === 0)
                                                <form action="{{ route('maplop-approve', $item->id) }}" class="d-inline"
                                                    method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn btn-success"
                                                        onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')">
                                                        KLIK APPROVED
                                                    </button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    @else
                                        <td class="text-center">
                                            -
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
