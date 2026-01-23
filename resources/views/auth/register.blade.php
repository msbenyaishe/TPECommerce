@extends('layout.master')

@section('content')

<div class="msone-elegant-wrapper fade-in-up">
    <h1 class="msone-hero-title page-title text-center">{{ __('Register') }}</h1>

    <form method="POST" action="{{ route('register') }}" class="msone-minimal-form">
        @csrf

        <div class="msone-field">
            <label for="name" class="msone-label">{{ __('Name') }}</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autocomplete="name"
                autofocus
                class="msone-input"
            >

            @error('name')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="msone-field">
            <label for="email" class="msone-label">{{ __('Email Address') }}</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="email"
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
                autocomplete="new-password"
                class="msone-input"
            >

            @error('password')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="msone-field">
            <label for="password-confirm" class="msone-label">{{ __('Confirm Password') }}</label>
            <input
                id="password-confirm"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                class="msone-input"
            >
        </div>

        <button type="submit" class="btn-msone-modern hero-btn primary">
            {{ __('Register') }}
        </button>

    </form>
</div>

@endsection
