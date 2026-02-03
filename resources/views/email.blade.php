@extends('layout.master')
@section('title','email')

@section('content')
<div class="msone-elegant-wrapper fade-in-up">
    <h2 class="msone-hero-title page-title text-center">Email Customers</h2>

    <form action="{{ route('send.email') }}" method="post" class="msone-minimal-form">
        @csrf

        <div class="msone-field">
            <label class="msone-label">Recipient Email</label>
            <input class="msone-input" type="email" name="recipient_email" class="form-control" required>
        </div>

        <div class="msone-field">
            <label class="msone-label">Subject</label>
            <input class="msone-input" type="text" name="subject" class="form-control" required>
        </div>

        <div class="msone-field">
            <label class="msone-label">Message</label>
            <textarea class="msone-input" name="message" class="form-control" rows="5" required></textarea>
        </div>

        <button class="btn-msone-modern hero-btn primary">Send Email</button>
    </form>
</div>
@endsection
