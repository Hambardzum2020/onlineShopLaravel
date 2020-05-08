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

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="product_img_slide owl-carousel">
            @if(isset($prod->Photos))
                @foreach ($prod->Photos as $k)
                    <div  class="single_product_img delPhoto">
                        <img src="../../img/{{$k->url}}" alt="#" class="img-fluid img_carusel">
                    </div>

                @endforeach
            @endif
            <!-- <div class="single_product_img">
              <img src="../../img/banner.png" alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src="../../img/product/single_product.png" alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src="../../img/product/single_product.png" alt="#" class="img-fluid">
            </div> -->
          </div>
        </div>

        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <h3>{{$prod['name']}}<br>
                {{$prod['description']}}<br>
                {{$prod['count']}} hat.<br>
            </h3>
            <p>
                Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness. Credibly innovate granular internal or organic sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences. Dramatically synthesize integrated schemas. with optimal networks.
            </p>
            <div class="card_area">
                <div class="product_count_area">

<!--                     <div class="product_count d-inline-block">
                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                    </div> -->
                    <h1>${{$prod['price']}}</h1>
                </div>
                @if($prod['user_id'] == $data['id'])
                <div class="add_to_cart">
                    <a class="brn_3" href="{{url('/product/edit/'.$prod['id'])}}">
                         <button value="{{$prod['id']}}" class="btn_3">Edit</button>
                    </a>
                </div>

                          @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" value="{{csrf_token()}}" id="token">

  <!--================End Single Product Area =================-->






    <!--::footer_part start::-->
    @include('includes.footer')
    <!--::footer_part end::-->

    <!-- Script Start -->
     @include('includes.JsScript')
    <!-- Script End -->
</body>
</html>
