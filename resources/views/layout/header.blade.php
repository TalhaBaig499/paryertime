<header class="text-white">
    <nav class="navbar navbar-expand-lg p-md-0">
        <div class="container">
            <a class="navbar-brand p-md-0" href="{{ url('index') }}">
                <img src="{{ asset('icon/logo.svg') }}" alt="Logo" class="logo" width="120px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end p-md-0" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->Is('index') ? 'active' : '' }}"
                            href="{{ url('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->Is('contact-us') ? 'active' : '' }}"
                            href="{{ url('contact-us') }}">Contact Us</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
