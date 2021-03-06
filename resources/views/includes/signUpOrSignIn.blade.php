<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a style="width: 150px; " class="navbar-brand" href="{{url('home')}}"> <img src="https://i.pinimg.com/originals/1e/29/77/1e2977ca1225981e307ad8d2c26a9040.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('signup')}}">Sign Up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('login')}}">Log In</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex align-items-center">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href="{{url('login')}}">
                            <i class="ti-shopping-cart"></i>
                            </a>
                            <div class="heartDiv">
                            <a href="{{url('login')}}">
                            <i class="far fa-heart heart"></i>
                            </a>
                            </div>
                            <div style="margin-left: 20px;">
                            <a href="{{url('login')}}">
                                <i class="ti-bell"></i>
                                </a>
                               </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
