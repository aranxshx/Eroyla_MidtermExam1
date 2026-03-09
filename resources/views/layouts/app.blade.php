<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Portfolio')</title>

    {{-- Google Fonts: Inter + Space Grotesk --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 + Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Custom Portfolio CSS --}}
    <link href="{{ asset('css/portfolio.css') }}" rel="stylesheet">
</head>
<body>

    {{-- Fixed Translucent Navbar (hide-on-scroll via JS) --}}
    <nav class="navbar navbar-expand-lg navbar-portfolio">
        <div class="container">
            <a class="navbar-brand" href="/">
                <span class="brand-dot"></span>E-Portfolio
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-1">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="/projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="/experiences">Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contacts">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="page-fade">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer-np">
        <div class="container">
            <ul class="footer-links">
                <li><a href="/">Home</a></li>
                <li><a href="/skills">Skills</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/experiences">Experience</a></li>
                <li><a href="/contacts">Contact</a></li>
            </ul>
            <p>&copy; {{ date('Y') }} E-Portfolio &mdash; Built with Laravel &amp; Bootstrap.</p>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Custom Portfolio JS --}}
    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
