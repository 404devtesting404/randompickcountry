<!DOCTYPE html>
<html lang="en">

{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('meta')
    <link rel="preload"  href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
</head> --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('meta')

    <!-- Preload Fonts -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap">
    </noscript>

    <!-- Preload Bootstrap CSS -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </noscript>

    <!-- Defer Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">


</head>

<body>
    {{-- ✅ Success message --}}
    {{-- <header>
        <a href="{{ route('country.random') }}" class="logo">
            <img src="{{ asset('public/images/logo.webp') }}" alt="RandomCountry Logo" style="height:100px;">
        </a>

          <nav>
            <a href="{{ route('country.random') }}">Home</a>
            <a href="#contact">Contact</a>
        </nav>
    </header> --}}

    <header>
        <a href="{{ route('country.random') }}" class="logo">
            <picture>
                <source srcset="{{ asset('public/images/logo-optimized.webp') }}" type="image/webp">
                <img src="{{ asset('public/images/logo.png') }}" alt="RandomCountry Logo" width="200" height="100"
                    style="height:100px;">
            </picture>
        </a>
    </header>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')

    <section id="contact" class="contact-section">
        <div class="contact-container">
            <h2 class="section-title">📬 Contact Us</h2>
            <form method="POST" action="{{ route('contactus') }}" class="contact-form" id="contactForm">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit" id="submitBtn">Send Message</button>
            </form>
        </div>
    </section>
    <footer>
        <p>Copyright © 2025 · All Rights Reserved.</p>
        <p>
            <a href="{{ route('country.random') }}">Home</a> |
            <a href="#contact">Contact</a> |
        </p>
    </footer>
</body>
<script>
    document.getElementById('contactForm').addEventListener('submit', function() {
        let btn = document.getElementById('submitBtn');
        btn.classList.add('loading');
        btn.disabled = true;
        btn.textContent = 'Sending...';
    });
</script>

</html>
