@extends('layout.master')

@section('content')

<div class="msone-elegant-wrapper fade-in-up">
    <h1 class="msone-hero-title page-title text-center">{{ __('Login') }}</h1>

    <form method="POST" action="{{ route('login') }}" class="msone-minimal-form">
        @csrf

        <div class="msone-field">
            <label for="email" class="msone-label">{{ __('Email Address') }}</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="email"
                autofocus
                class="msone-input"
            >

            @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="msone-field">
            <label for="password" class="msone-label">{{ __('Password') }}</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                class="msone-input"
            >

            @error('password')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="msone-toggle-group">
            <input
                type="checkbox"
                name="remember"
                id="remember"
                class="msone-checkbox"
                {{ old('remember') ? 'checked' : '' }}
            >
            <label for="remember" class="msone-label">{{ __('Remember Me') }}</label>
        </div>

        <button type="submit" class="btn-msone-modern hero-btn primary">{{ __('Login') }}</button>

        @if (Route::has('password.request'))
            <a href="{{ route('register') }}" class="msone-link-secondary">
                Don't have an account?
            </a>
            <a href="{{ route('password.request') }}" class="msone-link-secondary">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif

    </form>
</div>

@endsection
