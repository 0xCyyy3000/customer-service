<div class="h-100 d-flex flex-column flex-shrink-0 p-3 bg-light fixed-top" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Customer Service</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column">
        <li>
            <a href="{{ route('dashboard') }}"
                class="nav-link @if (Route::currentRouteName() == 'dashboard') active @else link-dark @endif">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('orders') }}"
                class="nav-link @if (Route::currentRouteName() == 'orders') active @else link-dark @endif">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table"></use>
                </svg>
                Orders
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                </svg>
                Items
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table"></use>
                </svg>
                Accounts
            </a>
        </li>
    </ul>
    <ul class="nav nav-pills flex-column mt-auto">
        <li>
            <a href="#" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table"></use>
                </svg>
                My profile
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                </svg>
                Signout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    {{-- <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>Cy Pogi</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div> --}}
</div>
