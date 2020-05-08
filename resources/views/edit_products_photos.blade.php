<!doctype html>
<html lang="zxx">

<head>
    @include('includes.head')
</head>

<body>


    <!--::header part start::-->
        @include('includes.homeHeader')
    <!-- Header part end-->

<section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product_list">
                        <div class="row delPhopto">
                            @if(isset($prod->Photos) && $prod->Photos != null)
                                @foreach ($prod->Photos as $k)
                                <div class="col-lg-4 col-sm-4" id="dlPhoto">
                                <button value="{{$k->id}}" class="del_photo">Delete</button>
                                    <div class="single_product_item">
                                        <img src="../../../img/{{$k->url}}" alt="#" class="img-fluid">
                                    </div>
                                </div>                  
                                @endforeach
                                @else
                                <h1>Empty</h1>
                            @endif
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