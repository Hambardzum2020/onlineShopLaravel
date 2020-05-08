<!doctype html>
<html lang="zxx">

<head>
    <style>
.alert-message
{
    margin: 20px 0;
    padding: 20px;
    border-left: 3px solid #eee;
}
.alert-message h4
{
    margin-top: 0;
    margin-bottom: 5px;
}
.alert-message p:last-child
{
    margin-bottom: 0;
}
.alert-message code
{
    background-color: #fff;
    border-radius: 3px;
}
.alert-message-success
{
    background-color: #F4FDF0;
    border-color: #3C763D;
}
.alert-message-success h4
{
    color: #3C763D;
}

</style>
    @include('includes.head')
</head>

<body>

    <!--::header part start::-->
    @include('includes.homeHeader')
    <!-- Header part end-->

        <!-- breadcrumb part start-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="product_img_slide owl-carousel" id='feedbackSentPhoto'>

                </div>
            </div>
            <div class="col-lg-8" id="feedbackSentText">

            </div>
            <div id="showFdb" class='col-lg-12'>
                    <h1>FeedBacks</h1>
                    <div class="container">
                        <div class="row" id='show_fdb'>

                        </div>
                    </div>
            </div>
    </div>
  </div>


    <input type="hidden" value="{{csrf_token()}}" id="token">
    <input type="hidden" value="{{$order_detalis_id}}" id="order_detalis_id_feedback">
    <input type="hidden" value="{{$product_id}}" id="product_id_feedback">





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
    <script src="{{asset('js/feedback.js')}}"></script>
</html>
