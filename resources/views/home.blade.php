<!doctype html>
<html lang="zxx">

<head>
    @include('includes.head')
</head>

<body>


    <!--::header part start::-->
        @include('includes.homeHeader')
    <!-- Header part end-->
<div class='div_range_style'>
    <h6 class="wrong">*Something goes wrong.</h6>
    <input type="number" name="" id="minPriceRange" placeholder='min price'><br>
    <input type="number" name="" id="maxPriceRange" placeholder='max price'><br>
    <input type="text" name="" id="prodNameRange" placeholder='name'><br>
    <button class='btn_3' id='btn_range'>Search</button>
    <div id='slaq-left'></div>
</div>
    <!-- product list start-->
    <section class="single_product_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 product_section">
                    @if(isset($myproduct))
                    @foreach ($myproduct as $k)
                            <div class="single_product_iner product_div_range" id="ham">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_product_img">
                                            @if(isset($k->Photos[0]->url))
                                            <img src="{{asset('img/'.$k->Photos[0]->url)}}"  alt="#" class="img-fluid withAndHeight">
                                            <img src="img/product_overlay.png" class="product_overlay img-fluid" alt="#">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-6">
                                        <div class="single_product_content" id="prodAdded">
                                            <h5>Started from {{$k['price']}}$</h5>
                                            <h2> <a href="{{url('product/item/'.$k->id)}}">{{$k['name']}}<br>
                                            {{$k['description']}}<br>{{$k['count']}} hat.</a> </h2>
                                            <a href="{{url('profile/'.$k->user_id)}}"><h4>By {{$k->Seller->name}} {{$k->Seller->surname}}</h4></a>
                                            @if(isset($data))
                                                @if($k->user_id == $data->id)
                                                    <h1 style="color: green;">It is your product.</h1>
                                                @else
                                                    <button value="{{$k->id}}" class="btn_3 addCart countProdCart">
                                                        Add To Cart</button>
                                                    <button value="{{$k->id}}" class="btn_3 addWishlist countProdWish">Add To Wishlist</button>
                                                @endif
                                            @else
                                                <a href="{{url('/login')}}"><button class="btn_3">Add To Cart</button></a>
                                                <a href="{{url('/login')}}"><button class="btn_3">Add To Wishlist</button></a>
                                            @endif
                                            <!-- <a href="{{url('product/item/'.$k->id)}}">
                                            <button class="btn_3" value="{{$k->id}}">Detalis</button>
                                            </a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                    @endforeach
                    @else
                    <h1>EMPTY</h1>
                    @endif
                </div>
            </div>
        </div>

    </section>
    <!-- product list end-->

    <!-- trending item start-->
    <section class="trending_items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Trending Items</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <img src="img/tranding_item/tranding_item_1.png" alt="#" class="img-fluid">
                        </div>
                        <h3> <a href="single-product.html">Cervical pillow for airplane
                        car office nap pillow</a> </h3>
                        <p>From $5</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <img src="img/tranding_item/tranding_item_2.png" alt="#" class="img-fluid">
                        <h3> <a href="single-product.html">Foam filling cotton slow rebound pillows</a> </h3>
                        <p>From $5</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <img src="img/tranding_item/tranding_item_3.png" alt="#" class="img-fluid">
                        <h3> <a href="single-product.html">Memory foam filling cotton Slow rebound pillows</a> </h3>
                        <p>From $5</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <img src="img/tranding_item/tranding_item_4.png" alt="#" class="img-fluid">
                        <h3> <a href="single-product.html">Cervical pillow for airplane
                        car office nap pillow</a> </h3>
                        <p>From $5</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <img src="img/tranding_item/tranding_item_5.png" alt="#" class="img-fluid">
                        <h3> <a href="single-product.html">Foam filling cotton slow rebound pillows</a> </h3>
                        <p>From $5</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <img src="img/tranding_item/tranding_item_6.png" alt="#" class="img-fluid">
                        <h3> <a href="single-product.html">Memory foam filling cotton Slow rebound pillows</a> </h3>
                        <p>From $5</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- trending item end-->

    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_1.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_2.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->


    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>Credibly innovate granular internal or organic sources whereas standards.</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_1.svg" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_2.svg" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_3.svg" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_4.svg" alt="#">
                        <h4>Product with Gift</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->

    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" value="{{csrf_token()}}" id="token">
    <!-- subscribe part end -->

    <!--::footer_part start::-->
    @include('includes.footer')
    <!--::footer_part end::-->

    <!-- Script Start -->
     @include('includes.JsScript')
    <!-- Script End -->
</body>
</html>
