<nav class="topnav navbar navbar-light" x-data="{btn:true}">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="{{ asset('ltr/assets/avatars/face-1.jpg') }}" alt="..."
                        class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
               @if (LaravelLocalization::getCurrentLocale() == 'en')
                        <a class="btn" class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                            <p class="btn btn-dark  mb-0 pb-0">Ar</p>
                        </a>
                    @else
                        <a  class="dropdown-item"  href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                            <p class="btn btn-dark mb-0 pb-0">En</p>
                        </a>
                    @endif
                <a class="dropdown-item" href="{{ route('users.index') }}">@lang('site.users')</a>
                <form @submit="btn = false" class="dropdown-item" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button x-show="btn" type="submit" class="btn btn-light">{{__('site.logout')}}</button>
                    <div x-show="!btn" class="spinner-border mr-3 text-primary" role="status"><span class="sr-only">Loading...</span></div>
                </form>
            </div>
        </li>
    </ul>
</nav>
