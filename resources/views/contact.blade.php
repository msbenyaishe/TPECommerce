@extends('layout.master')

@section('title', 'Contact')

@section('content')
<div class="contact-wrapper fade-in-up">
    <h1 class="page-title text-center">Contact Us</h1>

    <p class="contact-text text-center">
        Feel free to reach out to us for any inquiries or support.
    </p>

    <div class="contact-info">
        <p>Email: <strong>support@msone.com</strong></p>
        <p>Phone: <strong>+212 627957919</strong></p>
    </div>

    <div class="social-links-vertical">
        <a href="#" class="social-link" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('imgs/facebook.png') }}" alt="Facebook">
            <span>Facebook</span>
        </a>

        <a href="#" class="social-link" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('imgs/instagram.png') }}" alt="Instagram">
            <span>Instagram</span>
        </a>

        <a href="#" class="social-link" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('imgs/x.png') }}" alt="X">
            <span>X (Twitter)</span>
        </a>
    </div>
</div>
@endsection
