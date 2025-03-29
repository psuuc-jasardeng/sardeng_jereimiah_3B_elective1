@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0 text-light">Client Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-dark">Email</label>
                            <input type="email" name="email" id="email" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-dark">Password</label>
                            <input type="password" name="password" id="password" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-100">Login</button>
                        </div>
                    </form>
                    <p class="text-center">
                        <a href="{{ route('admin.login') }}" class="text-danger">Login as Admin</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection