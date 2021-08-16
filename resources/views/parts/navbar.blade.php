<nav class="navbar navbar-expand navbar-light ">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown me-3">
                    <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>
                            {{ config('currency.symbols.' . auth()->user()->getSetting('currency', 'USD')) }}
                        </strong>
                        <i class='bi bi-caret-down-fill bi-sub fs-6 text-gray-600'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Choice your currency</h6>
                        </li>
                        @foreach (config('currency.currencies') as $currency)
                            <li>
                                <form action="{{ route('profile.currency', ['user' => auth()->user()]) }}"
                                    method="post">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="cid" value="{{ $currency }}">
                                    <button class="dropdown-item" type="submit">
                                        {{ config('currency.symbols.' . $currency) . ' ' . $currency }}
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            @auth
                @include('parts.dropdown_profile')
            @endauth
        </div>
    </div>
</nav>
