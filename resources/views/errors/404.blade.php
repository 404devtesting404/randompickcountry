@extends('layouts.app')

@section('title')
    Page Not Found | Random Country Generator
@endsection

@section('content')
    <div class="container py-4">

        {{-- Heading --}}
        <div class="text-center mb-4">
            <h1 class="fw-bold display-5 text-danger">404 - Page Not Found</h1>
            <p class="text-muted fs-5">Sorry, the country you are looking for doesn’t exist in our database.</p>
        </div>

        {{-- Full Layout Row --}}
        <div class="row">
            <div class="col-md-8">
                <div class="row align-items-center mb-4">

                    {{-- Image / Illustration --}}
                    <div class="col-md-6 text-center mb-4 mb-md-0">
                        <img src="{{ asset('public/images/404-error.webp') }}"
                             alt="404 Not Found"
                             class="img-fluid rounded shadow"
                             style="max-width: 280px;">
                    </div>

                    {{-- Info --}}
                    <div class="col-md-6">
                        <h4 class="mb-3 text-secondary">Why am I seeing this?</h4>
                        <ul class="list-unstyled fs-5">
                            <li>❌ Country name might be misspelled.</li>
                            <li>📂 It might not exist in our dataset.</li>
                            <li>🌍 Try searching for another country.</li>
                        </ul>
                        <a href="{{ url('/') }}" class="btn btn-primary btn-lg mt-3 px-4 rounded-pill shadow">
                            🏠 Back to Home
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right Sidebar: Suggestions --}}
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm mb-4">
                    <h4 class="mb-3 text-primary fw-semibold">🔍 Try These Countries</h4>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('country.show', ['China']) }}">🌍 China</a></li>
                        <li><a href="{{ route('country.show', ['India']) }}">🌍 India</a></li>
                        <li><a href="{{ route('country.show', ['United-States-of-America']) }}">🌍 United States of America</a></li>
                        <li><a href="{{ route('country.show', ['Brazil']) }}">🌍 Brazil</a></li>
                        <li><a href="{{ route('country.show', ['Pakistan']) }}">🌍 Pakistan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
