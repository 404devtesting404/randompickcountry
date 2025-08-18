@extends('layouts.app')

@section('title'){{ $data['name'] }} - Random Country Generator | Facts, Flag & Travel Info | Random Pick Country @endsection
@section('meta')
{{-- <meta name="description" content="Discover {{ $data['name'] }} with the Random Country Generator! Explore country facts, flags, maps, and random destinations worldwide. Perfect for travelers, students, and fun quizzes."> --}}
    <meta name="description" content="Discover {{ $data['name'] }} with the Random Country Generator! Explore fascinating facts about {{ $data['name'] }}, its flag, map, and travel insights. Perfect for travelers, students & quiz lovers.">
    <meta name="keywords" content="{{ $data['name'] }} country info, {{ $data['name'] }} random country, random country generator, country picker, random travel destination, {{ $data['name'] }} flag, explore {{ $data['name'] }}, {{ $data['name'] }} facts, {{ $data['name'] }} travel guide, {{ $data['name'] }} facts for students, visit {{ $data['name'] }}, {{ $data['name'] }} geography, learn about {{ $data['name'] }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $data['name'] }} - Random Country Generator | Facts, Flag & Travel Info">
    <meta property="og:description" content="Explore {{ $data['name'] }} using the Random Country Generator. Learn fascinating facts, flags, and travel info instantly.">
    <meta property="og:image" content="{{ $data['flag'] }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $data['name'] }} - Random Country Generator | Facts, Flag & Travel Info">
    <meta name="twitter:description" content="Discover {{ $data['name'] }} facts, flags & destinations using the Random Country Generator.">
    <meta name="twitter:image" content="{{ $data['flag'] }}">
@endsection
@section('content')
    <div class="container py-4">
        {{-- Heading --}}
        <div class="text-center mb-4">
            <h1 class="fw-bold display-5 text-primary">{{ $data['name'] }}</h1>
        </div>
        {{-- Full Layout Row --}}
        <div class="row">
            <div class="col-md-8">
                <div class="row align-items-center mb-4">
                    {{-- Flag --}}
                    <div class="col-md-6 text-center mb-4 mb-md-0">
                        <img src="{{ $data['flag'] }}" alt="Flag of {{ $data['name'] }}" class="img-fluid rounded shadow"
                            style="max-width: 280px;">
                    </div>
                    {{-- Info --}}
                    <div class="col-md-6">
                        <h4 class="mb-3 text-secondary">Country Info</h4>
                        <ul class="list-unstyled fs-5">
                            <li><strong>🏛 Capital:</strong> {{ $data['capital'] }}</li>
                            <li><strong>🌍 Region:</strong> {{ $data['region'] }}</li>
                            <li><strong>👥 Population:</strong> {{ number_format($data['population']) }}</li>
                            <li><strong>📏 Area:</strong> {{ number_format($data['area']) }} km²</li>
                            <li><strong>🗣 Languages:</strong> {{ $data['languages'] }}</li>
                            <li><strong>💱 Currency:</strong> {{ $data['currency'] }}</li>
                        </ul>
                    </div>
                </div>
                {{-- Google Map --}}
                @if ($data['latlng'])
                    <div class="mb-5">
                        <iframe class="w-100 rounded shadow" height="350"
                            src="https://maps.google.com/maps?q={{ $data['latlng'][0] }},{{ $data['latlng'][1] }}&z=4&output=embed"
                            allowfullscreen loading="lazy">
                        </iframe>
                    </div>
                @endif
                {{-- Next Button --}}
                <div class="text-center">
                    <form method="GET" action="{{ route('nextrandom') }}">
                        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow">
                            Next Random Country
                        </button>
                    </form>
                </div>
            </div>
            {{-- Left Sidebar: Static Lists --}}
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm mb-4">
                    <h4 class="mb-3 text-primary fw-semibold">👥 Largest Populations</h4>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('country.show', ['China']) }}">🌍 China</a></li>
                        <li><a href="{{ route('country.show', ['India']) }}">🌍 India</a></li>
                        <li><a href="{{ route('country.show', ['United-States-of-America']) }}">🌍 United States
                                of America</a></li>
                        <li><a href="{{ route('country.show', ['Indonesia']) }}">🌍 Indonesia</a></li>
                        <li><a href="{{ route('country.show', ['Pakistan']) }}">🌍 Pakistan</a></li>
                        <li><a href="{{ route('country.show', ['Brazil']) }}">🌍 Brazil</a></li>
                    </ul>
                </div>
                <div class="bg-light p-4 rounded shadow-sm">
                    <h4 class="mb-3 text-success fw-semibold">📏 Largest Sizes</h4>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('country.show', ['Russia']) }}">🌍Russia</a></li>
                        <li><a href="{{ route('country.show', ['Canada']) }}">🌍Canada</a></li>
                        <li><a href="{{ route('country.show', ['China']) }}">🌍China</a></li>
                        <li><a href="{{ route('country.show', ['United-States-of-America']) }}">🌍United States of America</a></li>
                        <li><a href="{{ route('country.show', ['Brazil']) }}">🌍Brazil</a></li>
                    </ul>
                </div>
            </div>
            {{-- Main Content: Flag + Info --}}
        </div>
    </div>
@endsection
