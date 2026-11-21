@extends('layouts.app')

@section('title', 'IronCore Fitness | Butuan City')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

    {{-- HERO --}}
    <section class="hero">
        <div class="container hero-inner">
            <p class="eyebrow">Butuan City &middot; Open Mon to Sat &middot; 5 AM to 10 PM</p>
            <h1>Built<br><span class="outline">not</span> born.</h1>
            <p class="hero-text">Heavy iron, loud music, and coaches who push you. IronCore is the gym in Butuan for people who show up.</p>
            <div class="hero-actions">
                <a href="{{ route('contact') }}" class="btn btn-accent">Start today</a>
                <a href="#classes" class="btn btn-ghost">Book a class</a>
            </div>
        </div>
    </section>

    {{-- TICKER (pure CSS animation) --}}
    <div class="ticker" aria-hidden="true">
        <div class="ticker-track">
            <span>Lift heavy</span><span>No excuses</span><span>Sweat daily</span><span>Earn it</span>
            <span>Lift heavy</span><span>No excuses</span><span>Sweat daily</span><span>Earn it</span>
        </div>
    </div>

    {{-- SLIDER (JavaScript requirement) --}}
    <section class="container slider-wrap">
        <div class="slider" id="slider" aria-label="Gym highlights">
            <div class="slides">
                <article class="slide slide-1 active">
                    <h2>The Strength Floor</h2>
                    <p>Racks, barbells, dumbbells up to 50 kg, and plenty of space to move.</p>
                </article>
                <article class="slide slide-2">
                    <h2>Group Classes</h2>
                    <p>HIIT, boxing, spin, and yoga every day, led by certified coaches.</p>
                </article>
                <article class="slide slide-3">
                    <h2>Personal Training</h2>
                    <p>One coach, one plan, one goal. Your progress is tracked every week.</p>
                </article>
            </div>

            <button type="button" class="slider-btn prev" id="prevBtn" aria-label="Previous slide">&#10094;</button>
            <button type="button" class="slider-btn next" id="nextBtn" aria-label="Next slide">&#10095;</button>

            {{-- The dots are created by home.js --}}
            <div class="dots" id="dots"></div>
        </div>
    </section>

    {{-- CLASS BOOKING: credits + filter pills + class cards --}}
    <section class="container classes" id="classes">

        <div class="credit-bar">
            <div>
                <p class="credit-label">Your class credits</p>
                <p class="credit-big"><span id="creditBalance">10</span> credits left</p>
            </div>
            <button type="button" class="pill-btn" id="resetCredits">Reset demo credits</button>
        </div>

        <h2 class="section-title">Book your <span class="outline">class</span></h2>

        <div class="filters" id="filters">
            <button type="button" class="filter" data-filter="1">1 credit</button>
            <button type="button" class="filter" data-filter="2">2 credits</button>
            <button type="button" class="filter" data-filter="3">3 credits</button>
            <button type="button" class="filter active" data-filter="all">All</button>
        </div>

        <div class="class-grid">

                <article class="class-card" data-cost="1">
                    <div class="class-art" style="background-image: url('{{ asset('images/class-yoga.jpg') }}');"></div>
                    <div class="class-text">
                        <span class="class-cost">1 credit</span>
                        <h3>Yoga and Mobility</h3>
                        <p>Stretch, breathe, and recover. Good for beginners and rest days.</p>
                        <p class="details">60 min, all levels. Bring a mat or borrow one from the front desk.</p>
                        <div class="class-actions">
                            <button type="button" class="btn-small details-btn">Details</button>
                            <button type="button" class="btn-small book-btn">Book 1</button>
                        </div>
                    </div>
                </article>

                <article class="class-card" data-cost="1">
                    <div class="class-art" style="background-image: url('{{ asset('images/class-spin.jpg') }}');"></div>
                    <div class="class-text">
                        <span class="class-cost">1 credit</span>
                        <h3>Spin Cardio</h3>
                        <p>High-energy cycling set to loud music.</p>
                        <p class="details">45 min, all levels. Shoes with clips are optional.</p>
                        <div class="class-actions">
                            <button type="button" class="btn-small details-btn">Details</button>
                            <button type="button" class="btn-small book-btn">Book 1</button>
                        </div>
                    </div>
                </article>

                <article class="class-card" data-cost="2">
                    <div class="class-art" style="background-image: url('{{ asset('images/class-hiit.jpg') }}');"></div>
                    <div class="class-text">
                        <span class="class-cost">2 credits</span>
                        <h3>HIIT Burn</h3>
                        <p>Short, hard intervals that burn fat and build stamina.</p>
                        <p class="details">40 min, intermediate. Bring a towel and water.</p>
                        <div class="class-actions">
                            <button type="button" class="btn-small details-btn">Details</button>
                            <button type="button" class="btn-small book-btn">Book 2</button>
                        </div>
                    </div>
                </article>

                <article class="class-card" data-cost="2">
                    <div class="class-art" style="background-image: url('{{ asset('images/class-boxing.jpg') }}');"></div>
                    <div class="class-text">
                        <span class="class-cost">2 credits</span>
                        <h3>Boxing Basics</h3>
                        <p>Learn stance, jab, cross, and footwork on the heavy bags.</p>
                        <p class="details">50 min, beginners welcome. Gloves provided.</p>
                        <div class="class-actions">
                            <button type="button" class="btn-small details-btn">Details</button>
                            <button type="button" class="btn-small book-btn">Book 2</button>
                        </div>
                    </div>
                </article>

                <article class="class-card" data-cost="3">
                    <div class="class-art" style="background-image: url('{{ asset('images/class-lifting.jpg') }}');"></div>
                    <div class="class-text">
                        <span class="class-cost">3 credits</span>
                        <h3>Power Lifting Clinic</h3>
                        <p>Squat, bench, and deadlift with a coach checking your form.</p>
                        <p class="details">75 min, intermediate. Reserve your rack early.</p>
                        <div class="class-actions">
                            <button type="button" class="btn-small details-btn">Details</button>
                            <button type="button" class="btn-small book-btn">Book 3</button>
                        </div>
                    </div>
                </article>
        </div>

        <p class="toast" id="toast" role="status"></p>
    </section>

    {{-- MEMBERSHIP PLANS (placeholder prices: edit them) --}}
    <section class="container plans" id="plans">
        <h2 class="section-title">Pick your <span class="outline">plan</span></h2>
        <div class="plan-grid">
            <article class="plan">
                <h3>Day Pass</h3>
                <p class="price">&#8369;100</p>
                <p>Full gym access for one day.</p>
            </article>
            <article class="plan plan-featured">
                <h3>Monthly</h3>
                <p class="price">&#8369;1,200</p>
                <p>Unlimited gym access plus 10 class credits every month.</p>
            </article>
            <article class="plan">
                <h3>3 Months</h3>
                <p class="price">&#8369;3,000</p>
                <p>Save more and get one free coaching session.</p>
            </article>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
