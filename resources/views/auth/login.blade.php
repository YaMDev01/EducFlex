@extends('layouts.auth')

@section('title', 'Login page')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="form-label">{{ __('Email Address :') }}</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="emailHelp">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-1">
            <label for="password" class="form-label">{{ __('Password :') }}</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
        </div>

        <div class="d-flex align-items-center justify-content-between mb-5">
            <div class="form-check">
                <input class="form-check-input primary" type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-dark" for="remember">
                    <small>{{ __('Remeber me.') }}</small>
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 fs-4 mb-4 rounded-2">{{ __('Sign In') }}</button>
        <small class="d-flex align-items-center justify-content-center">
            <a class="text-primary fw-bold " href="{{ route('password.request') }}">{{ __('Forgot Password ?') }}</a>
        </small>
    </form>
@endsection
