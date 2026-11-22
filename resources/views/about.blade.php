@extends('layouts.app')

@section('title', 'About | IronCore Fitness')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('content')

    {{-- BANNER --}}
    <section class="page-banner">
        <div class="container">
            <p class="eyebrow">Our story</p>
            <h1>About <span class="outline">IronCore</span></h1>
            <p class="lead">A no-nonsense gym in Butuan City built for beginners and lifters alike.</p>
        </div>
    </section>

    <div class="container about-page">

        {{-- STORY with Read More / Read Less --}}
        <section class="about-intro">
            <p>
                IronCore started with a simple idea: everyone in Butuan should have a clean, honest gym
                where they feel welcome from the very first rep.
            </p>
            <div class="more-text" id="moreText">
                <p>
                    We keep our equipment strong, our prices fair, and our coaches close. Whether you are
                    lifting for the first time or training for a competition, there is a rack, a class,
                    and a coach waiting for you.
                </p>
            </div>
            <button type="button" class="btn btn-accent" id="readMoreBtn" aria-expanded="false">Read More</button>
        </section>

        {{-- COUNTERS (animated numbers) --}}
        <section class="stats">
            <div class="stat">
                <span class="stat-number" data-target="500">0</span><span class="stat-plus">+</span>
                <p>Active members</p>
            </div>
            <div class="stat">
                <span class="stat-number" data-target="25">0</span><span class="stat-plus">+</span>
                <p>Classes every week</p>
            </div>
            <div class="stat">
                <span class="stat-number" data-target="12">0</span><span class="stat-plus">+</span>
                <p>Certified coaches</p>
            </div>
        </section>

        {{-- MISSION AND VISION --}}
        <section class="mission-vision">
            <article class="mv-card">
                <h2>Our Mission</h2>
                <p>To help every member get stronger, healthier, and more confident through honest coaching and a welcoming space.</p>
            </article>
            <article class="mv-card">
                <h2>Our Vision</h2>
                <p>To be the most trusted gym in Butuan City, where a strong community trains together.</p>
            </article>
        </section>

        {{-- COACH CARDS (edit the roles to fit your project) --}}
        <section class="team">
            <h2 class="section-title">Meet the <span class="outline">coaches</span></h2>
            <div class="team-grid">
                <article class="team-card">
                    <div class="avatar">HC</div>
                    <h3>Head Coach</h3>
                    <p>Plans the programs and keeps every member on track.</p>
                </article>
                <article class="team-card">
                    <div class="avatar">SC</div>
                    <h3>Strength Coach</h3>
                    <p>Teaches safe squat, bench, and deadlift technique.</p>
                </article>
                <article class="team-card">
                    <div class="avatar">YC</div>
                    <h3>Yoga and Mobility Coach</h3>
                    <p>Helps you move better and recover faster.</p>
                </article>
            </div>
        </section>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/about.js') }}"></script>
@endpush
