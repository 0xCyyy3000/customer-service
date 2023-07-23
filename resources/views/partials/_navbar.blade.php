<div class="d-flex justify-content-between align-items-center p-3 sticky-top bg-my-gray">
    <h3 class="d-flex align-items-center gap-2">
        @if (Route::currentRouteName() == 'items.select')
            <a href="{{ route('items') }}" class="fs-6">
                <box-icon name='arrow-back' color="#0c6dfd"></box-icon>
            </a>
        @endif
        {{ $page }}
    </h3>
    <a href="#" class="d-flex align-items-center link-dark text-decoration-none" id="dropdownUser2">
        @auth
            <span>Hello,</span><strong class="mx-2">{{ Auth::user()->full_name }}</strong>
        @endauth
        <img src="{{ asset('assets/images/user-profile/cyril.jpeg') }}" alt="" width="42" height="42"
            class="rounded-circle">
    </a>
</div>
