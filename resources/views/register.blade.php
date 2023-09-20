@extends('app')

@section('title', 'Login Page')

@section('content')

<div class="container">
    
    <div class="card">
        <div class="card-header">Login</div>

        <div class="card-body">

            <form method="POST" action="{{ route('auth-register') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <br>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <br>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
