<div class="h-100 d-flex flex-column flex-shrink-0 p-3 bg-light fixed-top" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Customer Service</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column">
        <li>
            <a href="{{ route('dashboard') }}"
                class="d-flex align-items-center nav-link @if (Route::currentRouteName() == 'dashboard') active @else link-dark @endif">
                @if (Route::currentRouteName() == 'dashboard')
                    <box-icon type='solid' color='white' name='bar-chart-square' class="mx-2"></box-icon>
                @else
                    <box-icon type='light' color='black' name='bar-chart-square' class="mx-2"></box-icon>
                @endif
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('appointments') }}"
                class="d-flex align-items-center nav-link @if (Route::currentRouteName() == 'appointments') active @else link-dark @endif">
                @if (Route::currentRouteName() == 'appointments')
                    <box-icon type='solid' color='white' name='calendar-check' class="mx-2"></box-icon>
                @else
                    <box-icon type='light' color='black' name='calendar-check' class="mx-2"></box-icon>
                @endif
                Appointments
            </a>
        </li>
        <li>
            <a href="{{ route('items') }}"
                class="d-flex align-items-center nav-link @if (Route::currentRouteName() == 'items' or Route::currentRouteName() == 'items.select') active @else link-dark @endif">
                @if (Route::currentRouteName() == 'items' or Route::currentRouteName() == 'items.select')
                    <box-icon name='list-ul' class="mx-2" color="white"></box-icon>
                @else
                    <box-icon name='list-ul' class="mx-2" color="black"></box-icon>
                @endif
                Items
            </a>
        </li>
        @if (Auth::user()->type > 0)
            <li>
                <a href="{{ route('orders') }}"
                    class="d-flex align-items-center nav-link @if (Route::currentRouteName() == 'orders') active @else link-dark @endif">
                    @if (Route::currentRouteName() == 'orders')
                        <box-icon type='solid' color='white' name='receipt' class="mx-2"></box-icon>
                    @else
                        <box-icon type='light' color='black' name='receipt' class="mx-2"></box-icon>
                    @endif
                    Orders
                </a>
            </li>
            <li>
                <a href="#" class="d-flex align-items-center nav-link link-dark">
                    <box-icon name='user' class="mx-2"></box-icon>
                    Accounts
                </a>
            </li>
        @endif
    </ul>
    <ul class="nav nav-pills flex-column mt-auto">
        <li>
            <a href="#" class="d-flex align-items-center nav-link link-dark">
                <box-icon name='cog' class="mx-2"></box-icon>
                Settings
            </a>
        </li>
        <li>
            <a href="#" class="d-flex align-items-center nav-link link-dark"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <box-icon name='exit' class="mx-2"></box-icon>
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
