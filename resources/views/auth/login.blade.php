@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg" style="border-radius: 2rem">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/mandiri.png') }}"
                                        width="30%" alt="">
                                    <br><br>
                                    <h1 class="h4  mb-4" style="font-weight: bold; color:black">SPOKE TANGERANG MERDEKA</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input id="username" type="number"
                                            class="form-control form-control-user @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" required autocomplete="username"
                                            autofocus placeholder="Username">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="form-group row mb-0">

                                        <button type="submit" class="btn btn-warning btn-user btn-block">
                                            <strong class="text-gray-900 ">Login</strong>

                                        </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

    </div>
@endsection
