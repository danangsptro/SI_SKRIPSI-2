@extends('masterBackend')
@section('title', 'DATA | STATUS')


@section('backend')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4">Data Status</h1>
        <hr>
        @if (Auth::user()->user_role === 'admin')
            <a href="{{ route('create-status') }}" class="btn btn-primary btn-icon-split mb-4">
                <span class="icon text-white-50">
                    <i class="menu-icon fa fa-plus-square"></i>
                </span>
                <span class="text">Create Status</span>
            </a>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><strong>Note list status :</strong></h6>
                <hr>

                <li> Ada</li>
                <li>Sudah di pusat</li>
                <li>Sudah di musnahkan</li>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_status }}</td>
                                    @if (Auth::user()->user_role === 'admin')
                                        <td class="text-center">
                                            <a href="{{ route('edit-status', $item->id) }}" class="btn btn-info btn-circle">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            <form action="{{ route('delete-status', $item->id) }}" class="d-inline"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-circle"
                                                    onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @else
                                        <td class="text-center">-</td>
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
