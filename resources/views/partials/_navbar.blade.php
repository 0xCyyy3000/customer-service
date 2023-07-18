<div class="d-flex justify-content-between align-items-center p-3 sticky-top bg-my-gray">
    <h3>Dashboard</h3>
    <a href="#" class="d-flex align-items-center link-dark text-decoration-none" id="dropdownUser2">
        @auth
            <span>Hello,</span><strong class="mx-2">{{ Auth::user()->full_name }}</strong>
        @endauth
        <img src="{{ asset('assets/images/user-profile/cyril.jpeg') }}" alt="" width="42" height="42"
            class="rounded-circle">
    </a>
</div>
