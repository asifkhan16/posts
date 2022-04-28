@extends('layouts.app')
@section('content')
    <div class="row mt-5">
        <div class="bg-white rounded mx-auto p-4" style="width:35%">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') border border-danger @enderror" name="name" placeholder="Enter Your Name" value="{{ old('name') }}">
                    @error('name')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') border border-danger @enderror" name="username" placeholder="Enter Your UserName" value="{{ old('username') }}">
                    @error('username')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') border border-danger @enderror" name="email" placeholder="Enter Your Email" value="{{ old('email') }}">
                    @error('email')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') border border-danger @enderror" name="password" placeholder="Enter Your Password">
                    @error('password')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Your Password">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Register" class="btn btn-primary w-100">
                </div>
            </form>
        </div>
    </div>
@endsection