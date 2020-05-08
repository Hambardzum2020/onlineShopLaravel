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
                        <h2>Wishlist</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Cart Area =================-->



  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
            @if(isset($ProductsWishlist))
                @foreach($ProductsWishlist as $k)
                    @if($k->my_id == $data['id'])
                    <tr>
                        <td>
                        <div class="media">
                            <div class="d-flex">
                            @if(isset($k->Products->Photos[0]->url))
                            <img src="{{asset('img/'.$k->Products->Photos[0]->url)}}" alt="" />
                            @endif
                            </div>
                            <div class="media-body">
                            <p>{{$k->Products->name}}<br>
                                By {{$k->Products->Seller->name}} {{$k->Products->Seller->surname}}</p>
                              <button value="{{$k->Products->id}}" id='btn_cart' class='btn_3 addCart countProdCart'>Add to cart</button>
                            </div>
                        </div>
                        </td>
                        <td>
                        <h5>${{$k->Products->price}}</h5>
                        </td>
                    @endif
                @endforeach
            @endif

              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->



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

