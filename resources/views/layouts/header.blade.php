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
                    <li class="nav-item" id="about-us">
                        <a class="nav-link<?php echo Route::currentRouteName()=='about-us'?' active':''?>" href="{{route('about-us')}}">About Us</a>
                    </li>
                    <li class="nav-item" id="our-expertise">
                        <a class="nav-link<?php echo Route::currentRouteName()=='our-expertise'?' active':''?>" href="{{route('our-expertise')}}">Our Expertise</a>
                    </li>
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
                            <li><a class="dropdown-item" type="button" href="">My Profile</a></li>
                            <li><a class="dropdown-item" type="button" href="">My Strategies</a></li>
                            <li><a class="dropdown-item" type="button" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </nav>
</header>