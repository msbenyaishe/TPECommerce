@extends('layout.master')

@section('title', '404 - Page Not Found')

@section('content')
<div class="card fade-in-up" style="text-align: center; padding: 4rem 2rem;">
    <h1 class="page-title" style="font-size: 6rem; margin-bottom: 1rem; color: var(--accent-primary);">404</h1>
    <p style="font-size: 1.25rem; color: var(--text-secondary);">Page not found. Please check the URL.</p>
    <div style="margin-top: 2rem;">
        <a href="/" class="hero-btn primary">Go Home</a>
    </div>
</div>
@endsection
