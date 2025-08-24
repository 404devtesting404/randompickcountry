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

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-51HN5TTL6Q"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-51HN5TTL6Q');
</script>
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
                <source srcset="{{ asset('public/images/logo.webp') }}" type="image/webp">
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
    
    <!-- Cookie Consent Banner -->
<div id="cookie-overlay" style="
    display: none;
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.5);
    z-index: 9998;
"></div>

<div id="cookie-banner" style="
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    border: 1px solid #ddd;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0px 6px 18px rgba(0,0,0,0.25);
    z-index: 9999;
    max-width: 400px;
    text-align: center;
    font-family: sans-serif;
">
    <p style="margin:0 0 15px 0; font-size:15px;">
        We use your data with cookies for ads and analytics. Do you consent to this?
    </p>
    <button onclick="acceptCookies()" style="background:#4CAF50;color:#fff;border:none;padding:10px 18px;border-radius:6px;cursor:pointer;margin-right:10px;">
        Accept
    </button>
    <button onclick="denyCookies()" style="background:#f44336;color:#fff;border:none;padding:10px 18px;border-radius:6px;cursor:pointer;">
        Deny
    </button>
</div>

<script>
  function setConsent(granted) {
    gtag('consent', 'update', {
      'ad_storage': granted ? 'granted' : 'denied',
      'analytics_storage': granted ? 'granted' : 'denied'
    });
  }

  function acceptCookies() {
    localStorage.setItem("cookie_consent", "granted");
    setConsent(true);
    document.getElementById("cookie-banner").style.display = "none";
    document.getElementById("cookie-overlay").style.display = "none";
  }

  function denyCookies() {
    localStorage.setItem("cookie_consent", "denied");
    setConsent(false);
    document.getElementById("cookie-banner").style.display = "none";
    document.getElementById("cookie-overlay").style.display = "none";
  }

  window.onload = function() {
    const consent = localStorage.getItem("cookie_consent");
    if (!consent) {
      document.getElementById("cookie-banner").style.display = "block";
      document.getElementById("cookie-overlay").style.display = "block";
    } else {
      setConsent(consent === "granted");
    }
  }
</script>

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
