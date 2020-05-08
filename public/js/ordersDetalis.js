$(document).ready(function(){
    var order_id = $("#orderId").val();
    var token = $("#token").val();
    $.ajax({
        type: 'post',
        url: '/orderDetalis',
        data: {
            "_token": token,
            "order_id": order_id
        },
        success: function(r){
            r.forEach(function(item){
                $(".orderDtl").append(`
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="../../img/${item['prod_photo']}" class="img-fluid withAndHeight" alt="#">
                                    <img src="../../img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h2>
                                        <a href="single-product.html">${item['prod_name']}<br>
                                            ${item['prod_des']}<br>${item['count']} hat.</a>
                                    </h2>
                                    <a href="/profile/${item['user_id']}">
                                        <h4>By ${item['seler_name'] + " " + item['seler_surname']}</h4>
                                    </a>
                                    <a href="/feedback/${item['id']}">
                                        <button class='btn_3' value='${item['id']}'>Feedback</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                `)
            })
        },
        error: function(){
            alert("Error_orderDetalis");
        }
    })
})

