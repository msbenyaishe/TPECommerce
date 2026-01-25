@extends('layout.master')

@section('content')

<div class="msone-elegant-wrapper fade-in-up">
    <h1 class="msone-hero-title page-title text-center">Reset Password</h1>

    @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="msone-minimal-form">
        @csrf
        <div class="msone-field">
            <label for="email" class="msone-label">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="msone-input">
        </div>
        
        @error('email')
            <p style="color: red;"><strong>{{ $message }}</strong></p>
        @enderror

        <button type="submit" class="btn-msone-modern hero-btn primary">Send Password Reset Link</button>
    </form>
</div>
@endsection
