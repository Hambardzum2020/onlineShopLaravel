<!doctype html>
<html lang="zxx">

<head>
    @include('includes.head')
</head>

<body>

    <!--::header part start::-->
    @include('includes.homeHeader')
    <!-- Header part end-->

        <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Order Detalis</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->


<section class="single_product_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 orderDtl">

                </div>
            </div>
        </div>
</section>




    <input type="hidden" value="{{csrf_token()}}" id="token">
    <input type="hidden" value="{{$order_id['id']}}" id="orderId">
</body>
    <!-- jquery plugins here-->
    <script src="/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="/js/mixitup.min.js"></script>
    <!-- particles js -->
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="/js/slick.min.js"></script>
    <script src="/js/jquery.counterup.min.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/contact.js"></script>
    <script src="/js/jquery.ajaxchimp.min.js"></script>
    <script src="/js/jquery.form.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/mail-script.js"></script>
    <!-- custom js -->
    <script src="/js/custom.js"></script>
    <!-- hnot -->
    <script src="{{asset('js/addCart.js')}}"></script>
    <script src="{{asset('js/addWishlist.js')}}"></script>
    <!-- Taza -->
    <script src="{{asset('js/ordersDetalis.js')}}"></script>
</html>
