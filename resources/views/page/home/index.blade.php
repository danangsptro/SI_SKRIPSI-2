@extends('masterBackend')
@section('title', 'Admin | Dashboard')

@section('backend')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="row">

            <div class="col-lg-10">
                <div class="card border-left-dark shadow h-100 py-5">
                    <div class="container">
                        <h1 class="display-4  text-gray-800">Welcome to dashboard</h1>
                        <hr>
                        <p class="lead text-danger">Have a nice day <strong><i>{{ $name->name }}</i>!</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <img src="{{ asset('assets/img/mandiri.jpg') }}" style="border-radius:1rem" width="100%" alt="">
            </div>
        </div>
        <br>
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Seluruh Data Maplop</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $maplop->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
