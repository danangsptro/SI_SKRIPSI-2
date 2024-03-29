@extends('masterBackend')
@section('title', 'DATA | LAPORAN')


@section('backend')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4 py-4">Data Laporan Maplop</h1>
        <hr>
        <!-- DataTales Example -->
        <div class="row text-center">
            <div class="col-lg-3">
                <div class="card py-4">
                    <h5>Ada</h5>
                    <hr>
                    <h5>{{$ada->count()}}</h5>
                </div>
                <a href="{{route('laporan-ada')}}" class="btn btn-primary mt-4 btn-block">Klik</a>
            </div>
            <div class="col-lg-3">
                <div class="card py-4">
                    <h5>Sudah dipusat</h5>
                    <hr>
                    <h5>{{$sudahDipusat->count()}}</h5>
                </div>
                <a href="{{route('laporan-sudah-dipusat')}}" class="btn btn-info mt-4 btn-block">Klik</a>
            </div>
            <div class="col-lg-3">
                <div class="card py-4">
                    <h5>Sudah dimusnahkan</h5>
                    <hr>
                    <h5>{{$sudahDimusnahkan->count()}}</h5>
                </div>
                <a href="{{route('laporan-sudah-dimusnahkan')}}" class="btn btn-danger mt-4 btn-block">Klik</a>
            </div>
            <div class="col-lg-3">
                <div class="card py-4">
                    <h5>Total laporan keseluruhan </h5>
                    <hr>
                    <h5>{{$totalKeseluruhan->count()}}</h5>
                </div>
                <a href="{{route('laporan-semua-data')}}" class="btn btn-warning mt-4 btn-block">Klik</a>
            </div>
        </div>

    </div>

@endsection
