@extends('layout.master')

@section('title', __('home.title'))

@section('content')
<section class="hero fade-in-up">
    <h1 class="hero-title">
        {{ __('home.title') }}
    </h1>

    <p class="hero-subtitle">
        <span>MSONE</span>
        {{ __('home.subtitle') }}
    </p>

    <div class="hero-actions">
        <a href="/electronics" class="hero-btn primary">
            {{ __('home.browse') }}
        </a>

        <a href="/about" class="hero-btn">
            {{ __('home.learn') }}
        </a>
    </div>
</section>
@endsection
