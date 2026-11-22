@extends('layouts.app')

@section('title', 'Contact | IronCore Fitness')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')

    {{-- BANNER --}}
    <section class="page-banner">
        <div class="container">
            <p class="eyebrow">Join the gym</p>
            <h1>Contact <span class="outline">us</span></h1>
            <p class="lead">Ask about memberships, classes, or personal training. We reply fast.</p>
        </div>
    </section>

    <div class="container contact-wrap">

        {{-- CONTACT DETAILS --}}
        <aside class="contact-info">
            <h2>Visit the gym</h2>
            <ul>
                <li><strong>Address</strong><br>Butuan City, Agusan del Norte (edit with your street)</li>
                <li><strong>Email</strong><br>hello@ironcore.example</li>
                <li><strong>Phone</strong><br>+63 900 000 0000</li>
                <li><strong>Hours</strong><br>Mon to Sat, 5:00 AM to 10:00 PM</li>
            </ul>
        </aside>

        {{-- FORM: validated by contact.js (novalidate turns off the browser's own messages) --}}
        <form class="contact-form" id="contactForm" novalidate>
            <div class="field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" autocomplete="off">
                <small class="error" id="nameError"></small>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" autocomplete="off">
                <small class="error" id="emailError"></small>
            </div>

            <div class="field">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" autocomplete="off">
                <small class="error" id="subjectError"></small>
            </div>

            <div class="field">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5"></textarea>
                <small class="error" id="messageError"></small>
            </div>

            <button type="submit" class="btn btn-accent">Send message</button>

            <p class="success" id="successMessage" role="status"></p>
        </form>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endpush
