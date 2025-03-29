@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-dark">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label text-dark">Name</label>
                            <input type="text" name="name" id="name" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-dark">Email</label>
                            <input type="email" name="email" id="email" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-dark">Password</label>
                            <input type="password" name="password" id="password" class="form-control" >
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Register</button>
                        <a href="{{ route('login') }}" class="btn btn-outline-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection