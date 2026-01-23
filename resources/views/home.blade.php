@extends('layout.master')

@section('title', 'Home')

@section('content')
<section class="hero fade-in-up">
    <h1 class="hero-title">Reliable Electronics for Everyday Use</h1>

    <p class="hero-subtitle">
        <span>MSONE</span> provides high-quality electronic products designed for performance,
        durability, and modern lifestyles.
    </p>

    <div class="hero-actions">
        <a href="/electronics" class="hero-btn primary">
            Browse Electronics
        </a>
        <a href="/about" class="hero-btn">
            Learn More
        </a>
    </div>
</section>
@endsection
