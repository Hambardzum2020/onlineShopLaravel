<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a style="width: 150px; " class="navbar-brand" href="{{url('home')}}"> <img src="https://i.pinimg.com/originals/1e/29/77/1e2977ca1225981e307ad8d2c26a9040.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('home')}}">Home</a>
                                </li>
                                    @if(isset($data))
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        product
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="{{url('addProduct')}}">Add product</a>
                                        <a class="dropdown-item" href="{{url('MyProduct')}}">My products</a>
                                        <a class='dropdown-item' href="{{url('product/cart')}}">Shopping cart</a>
                                        <a class="dropdown-item" href="{{url('product/wishlist')}}">Shopping wishlist</a>
                                        <a class="dropdown-item" href="{{url('orders')}}">Orders</a>
                                    </div>
                                    @endif
                                </li>
                                    @if(isset($data))
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{$data['name']." ".$data['surname']}}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">

                                                <a class="dropdown-item" href="{{url('profile')}}">
                                                    My Profile

                                                </a>
                                                <a class="dropdown-item" href="{{url('edit')}}">Edit</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('logout_server')}}">Log out</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('signup')}}">Sign Up</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('login')}}">Log In</a>
                                        </li>
                                    @endif
                            </ul>
                        </div>
                        @if(isset($data))
                        <div class="hearer_icon d-flex align-items-center">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href="{{url('product/cart')}}">
                            <i class="ti-shopping-cart"></i>
                            </a>
                            <div id="countCartProd" class="countCart"></div>
                            <div class='heartDiv'>
                            <a href="{{url('product/wishlist')}}">
                            <i class="far fa-heart heart"></i>
                            </a>
                            </div>
                            <div id="countWishProd" class="countWish"></div>

                            <a href="{{url('notification')}}">
                            <i class="ti-bell"></i>
                            </a>
                            <div id="countNotification" class="countWish1"></div>
                        @else
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
                        </div>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <div class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control search_product" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </div>
            </div>
            <div id='result'>

            </div>
        </div>
    </header>
