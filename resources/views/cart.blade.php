<!Doctype html>
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
                        <h2>cart list</h2>
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
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
            @if(isset($ProductsCart))
                @foreach($ProductsCart as $k)
                    @if($k->my_id == $data['id'])
                    <tr class='CartNumber{{$k->id}}'>
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
                                <button value="{{$k->Products->id}}" id='btn_cart' class='btn_3 addWishlist countProdWish'>Add to wishlist</button>
                            </div>
                        </div>
                        </td>

                        <td>
                        <h5>${{$k->Products->price}}</h5>
                        </td>
                        <td>
                        <div class="product_count">
                            <button value='{{$k->id}}' class="input-number-Decrement"> <i class="ti-minus"></i></button>
                            <input class="input-Number{{$k->id}}" type="readonly" value="{{$k->count}}">
                            <button value='{{$k->id}}' class="input-number-Increment"> <i class="ti-plus"></i></button>
                        </div>
                        </td>
                        <td>
                        <h5 id='dsNone{{$k->id}}'>${{$k->Products->price * $k->count}}.00</h5>
                        <h5 style='display: none;' id='allPrice{{$k->id}}'>{{$k->Products->price}}</h5>
                        <button style="display: none;" id='price{{$k->id}}' value='{{$k->Products->price}}'></button>
                        </td>
                    @endif
                @endforeach
                    </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td>
                          <h5>Subtotal</h5>
                        </td>
                        <td>
                          <h5>$ <input id='subtotal' style="border: none;" value="{{$total}}" readonly>.00</h5>
                        </td>
                      </tr>
            @endif
            </tbody>
          </table>
            <a href="{{url('/cart/checkout')}}"><button class="btn_3">Buy All</button></a>
        </div>
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

