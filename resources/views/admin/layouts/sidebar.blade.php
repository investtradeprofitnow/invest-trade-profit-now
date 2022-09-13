<nav class="navbar fixed-top navbar-sidebar navbar-expand d-flex flex-column align-item-start active-nav" id="sidebar">
    <ul class="navbar-nav d-flex flex-column w-100 ml-5">
        <li>
            <a href="{{route('admin-home')}}" class="navbar-brand text-light mt-5">
                <img src="{{asset('images/logo.jpg')}}" width="80vw" height="80vw" alt="Logo"/>
            </a>
        </li>
        <li class="nav-item dropdown w-100">
            <a class="nav-link dropdown-toggle" href="#" id="strategyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Strategy List
            </a>
            <ul class="dropdown-menu" aria-labelledby="strategyDropdown">
                <li><a class="dropdown-item" href="{{route('strategy-short')}}">Short</a></li>
                <li><a class="dropdown-item" href="{{route('strategy-brief')}}">Brief</a></li>
            </ul>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('customer')}}" class="nav-link pl-4">Customer Information</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('offers')}}" class="nav-link pl-4">Offers</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('admin-logout')}}" class="nav-link pl-4">Logout</a>
        </li>
    </ul>
</nav>