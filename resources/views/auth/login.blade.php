@extends('layouts.app')
@section('content')
    <div class="row mt-5">
        <div class="bg-white w-md-50 rounded mx-auto p-4" style="width:35%">
            @if ( session('status'))
                <p>{{ session('status') }}</p>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') border border-danger @enderror" name="email" placeholder="Enter Your Email" autocomplete="off">
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
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <label for="remember" class="form-check-label text-secondary">Remember Me</label>
                </div>
                <div class="mb-3">
                    <input type="submit" value="LogIn" class="btn btn-primary w-100">
                </div>
            </form>
        </div>
    </div>
@endsection