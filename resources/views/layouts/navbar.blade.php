<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url("/home") }}"><img src="https://i.ibb.co/PmswgyD/united3.png" alt="company logo" id="united-logo-navbar"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                @if (Auth::user()->role != 'user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("/cities") }}">Cities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("/properties") }}">Properties</a>
                    </li>
                @endif
                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("/users") }}">Users</a>
                    </li>
                @endif
            </ul>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link class="btn btn-sm btn-primary rounded-0 text-decoration-none" :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
    </div>
</nav>