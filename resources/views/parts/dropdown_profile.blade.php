<div class="dropdown">
    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="user-menu d-flex">
            <div class="user-name text-end d-none d-md-inline me-3">
                <h6 class="mb-0 text-gray-600">{{ auth()->user()->username }}</h6>
                @if (auth()->user()->is_admin)
                    <p class="mb-0 text-sm text-gray-600">Administrator</p>
                @else
                    <p class="mb-0 text-sm text-gray-600">Customer</p>
                @endif
            </div>
            <div class="user-img d-flex align-items-center">
                <div class="avatar avatar-md">
                    <img src="{{ asset('assets/images/faces/1.jpg') }}">
                </div>
            </div>
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li>
            <h6 class="dropdown-header">Hello, {{ auth()->user()->full_name }} !</h6>
        </li>
        {{-- <li>
            <a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My Profile</a>
        </li> --}}
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
