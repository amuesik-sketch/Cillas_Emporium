<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container flex-wrap">

        <!-- ROW 1 (mobile): BRAND centered across full width -->
        <a class="navbar-brand mx-auto" href="{{ route('index') }}">
            <span class="brand-logo">Cillas</span>
            <span class="brand-text">Emporium</span>
        </a>

        <!-- ROW 2 (mobile): APPOINTMENT TOGGLE + HAMBURGER on same line -->
        <div class="d-flex align-items-center d-lg-none w-100 justify-content-between px-1 pb-1">

            <!-- Appointment dropdown toggle (mobile only row) -->
            <div class="dropdown appointment-dropdown">
                <a class="nav-link dropdown-toggle appointment-link px-0"
                   href="#"
                   id="appointmentDropdownMobile"
                   role="button"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    Appointment
                </a>
                <ul class="dropdown-menu appointment-menu shadow">
                    <li>
                        <a class="dropdown-item" href="{{ route('appointments.nails') }}">💅 Nails</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('appointments.makeup') }}">💄 Makeup</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('appointments.pedicure') }}">🦶 Pedicure</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('appointments.lashes') }}">👁️ Lash Extension</a>
                    </li>
                </ul>
            </div>

            <!-- Hamburger toggler -->
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- DESKTOP: Appointment dropdown (left, visible only on lg+) -->
        <div class="dropdown appointment-dropdown me-3 d-none d-lg-block">
            <a class="nav-link dropdown-toggle appointment-link"
               href="#"
               id="appointmentDropdownDesktop"
               role="button"
               data-bs-toggle="dropdown"
               aria-expanded="false">
                Appointment
            </a>
            <ul class="dropdown-menu appointment-menu shadow">
                <li>
                    <a class="dropdown-item" href="{{ route('appointments.nails') }}">💅 Nails</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('appointments.makeup') }}">💄 Makeup</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('appointments.pedicure') }}">🦶 Pedicure</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('appointments.lashes') }}">👁️ Lash Extension</a>
                </li>
            </ul>
        </div>

        <!-- DESKTOP TOGGLER (hidden on mobile, handled above) -->
        <button class="navbar-toggler d-none d-lg-none" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- NAV LINKS COLLAPSE -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto align-items-lg-center">
                <a href="{{ route('index') }}"
                   class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}"
                   class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>
                <a href="{{ route('products') }}"
                   class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}">
                    Products
                </a>
                <a href="{{ route('contacts') }}"
                   class="nav-link {{ request()->routeIs('contacts') ? 'active' : '' }}">
                    Contact
                </a>
                <a href="{{ route('cart') }}" class="nav-link position-relative ms-lg-3">
                    <i class="fa fa-shopping-cart fa-lg"></i>
                    <span id="cart-count"
                          class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ count(session('cart', [])) }}
                        <span class="visually-hidden">items in cart</span>
                    </span>
                </a>
            </div>
        </div>

    </div>
</nav>

<!-- Success message -->
<div id="cart-message"
     style="position: fixed; top: 80px; right: 20px; z-index: 9999; display:none;"
     class="alert alert-success">
</div>