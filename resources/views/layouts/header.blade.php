<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="images/logo.jpg" width="100 px" height="100px" alt="Logo"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" >
                        <a class="nav-link<?php echo Route::currentRouteName()=='home'?' active':''?>" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link<?php echo Route::currentRouteName()=='about-us'?' active':''?>" href="{{route('about-us')}}">About Us</a>
                    </li>
                    <li class="nav-item" id="contact-us">
                        <a class="nav-link<?php echo Route::currentRouteName()=='contact-us'?' active':''?>" href="{{route('contact-us')}}">Contact Us</a>
                    </li>
                    @if(Session::has("email"))
                        <li class="nav-item" id="contact-us">
                            <a class="nav-link<?php echo Route::currentRouteName()=='strategy-list'?' active':''?>" href="{{route('strategy-list')}}">Strategy List</a>
                        </li>
                    @endif
                </ul>
                @if(!Session::has("email"))
                    <div class="d-flex">				
                        <a class="btn btn-success" href="{{route('login')}}" style="padding: 10px 40px;">Login/Register</a>
                    </div>
                @else
                    <div class="btn-group">
                        <a type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>{{Session::get("email")}}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" type="button" href="{{route('profile')}}">My Profile</a></li>
                            <li><a class="dropdown-item" type="button" href="{{route('display-change-password')}}">Change Password</a></li>
                            <li><a class="dropdown-item" type="button" href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </nav>
</header>