<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <div class="d-flex order-lg-2 ml-auto">
                <div class="nav-item d-none d-md-flex">
                    @if (!Auth::check())
                        <a href="{{url('login')}}" class="nav-link">Login</a>
                    @else
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>