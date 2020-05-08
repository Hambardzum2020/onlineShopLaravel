var token = $("#token").val();
var bool = true;
$(document).on('click', "#slaq-left", function(){
    if(bool == true){
        $(".div_range_style").css('left', '0px')
        $(this).css({
            'border-left': '0',
            'border-right': '50px solid #B08EAD'
        })
        bool = false
    }
    else{
        $(".div_range_style").css('left', '-255px')
        $(this).css({
            'border-right': '0',
            'border-left': '50px solid #B08EAD'
        })
        bool = true
    }
})

$('.del_prod').click(function(r) {
    let prod_id = $(this).val();
    $.ajax({
        type: 'post',
        url: "/delete_prod",
        data: { prod_id: prod_id, "_token": token },
        success: function(r) {
            $("#ham").remove();
            // $("#ham1").append(`<h1>EMPTY</h1>`);
        }
    })
})

$(document).on("click", ".del_photo", function(r){
    let photo_id = $(this).val();
    $.ajax({
        type: 'post',
        url: "/delete_photo",
        data: {photo_id: photo_id, "_token": token},
        success: function(r){
            if(r != null){
                $("#dlPhoto").remove();
            }
            else{
                $(".delPhoto").append(`<h1>Empty</h1>`)
            }
        }
    })
})

$(document).on('input', '.search_product', function(){
    var search = $(this).val();
    $("#result").empty();
    if(search != ""){
        $.ajax({
            type: 'post',
            url: '/search_product',
            data: {search, "_token": token},
            success: function(r){
                $(".product_div_range").remove();
                $(".product_section").html('');

                r.forEach(function(item){
                    $(".product_section").append(`
                    <div class="single_product_iner product_div_range" id="ham">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_product_img">

                                <img src="img/${item.photo}"  alt="#" class="img-fluid withAndHeight">
                                <img src="img/product_overlay.png" class="product_overlay img-fluid" alt="#">

                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-6">
                            <div class="single_product_content rangeAppend${item['id']}" id="prodAdded">
                                <h5>Started from ${item['price']}$</h5>
                                <h2> <a href="product/item/${item['id']}">${item['name']}<br>
                                ${item['description']}<br>${item['count']} hat.</a> </h2>
                                <a href="profile/${item['user_id']}"><h4>By ${item['user_name'] + " " + item['user_surname']} </h4></a>
                            </div>
                        </div>
                    </div>
                </div>
                    `);
                    if(item.data == 'your'){
                        $(".rangeAppend"+item['id']).append(`
                            <h1 style="color: green;">It is your product.</h1>
                        `)
                    }
                    else if(item.data == true){
                        $(".rangeAppend"+item['id']).append(`
                            <button value="${item['id']}" class="btn_3 addCart countProdCart">
                                Add To Cart</button>
                            <button value="${item['id']}" class="btn_3 addWishlist countProdWish">
                                Add To Wishlist</button>
                        `)
                    }
                    else{
                        $(".rangeAppend"+item['id']).append(`
                            <a href="/login"><button class="btn_3">Add To Cart</button></a>
                            <a href="/login"><button class="btn_3">Add To Wishlist</button></a>
                        `)
                    }
                })

            }
        })
    }
    else{
        $(".product_section").html('');
    }
});

$(document).on('click', '#btn_range', function(){
    location.href="#";
    $(".wrong").css('display', 'none')
    var minPriceRange = $("#minPriceRange").val();
    var maxPriceRange = $("#maxPriceRange").val();
    var prodNameRange = $("#prodNameRange").val();
    $.ajax({
        type: 'post',
        url: '/range',
        data: {minPriceRange: minPriceRange, maxPriceRange: maxPriceRange, prodNameRange: prodNameRange, "_token": token},
        success: function(r){
            if(r == 'datark'){
                $(".wrong").css('display', 'block');
            }
            else{
                $(".product_div_range").remove();
                if(r != null){
                    r.forEach(function(item){
                        $(".product_section").append(`
                        <div class="single_product_iner product_div_range" id="ham">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">

                                    <img src="img/${item.photo}"  alt="#" class="img-fluid withAndHeight">
                                    <img src="img/product_overlay.png" class="product_overlay img-fluid" alt="#">

                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content rangeAppend${item['id']}" id="prodAdded">
                                    <h5>Started from ${item['price']}$</h5>
                                    <h2> <a href="product/item/${item['id']}">${item['name']}<br>
                                    ${item['description']}<br>${item['count']} hat.</a> </h2>
                                    <a href="profile/${item['user_id']}"><h4>By ${item['user_name'] + " " + item['user_surname']} </h4></a>
                                </div>
                            </div>
                        </div>
                    </div>
                        `);
                        if(item.data == 'your'){
                            $(".rangeAppend"+item['id']).append(`
                                <h1 style="color: green;">It is your product.</h1>
                            `)
                        }
                        else if(item.data == true){
                            $(".rangeAppend"+item['id']).append(`
                                <button value="${item['id']}" class="btn_3 addCart countProdCart">
                                    Add To Cart</button>
                                <button value="${item['id']}" class="btn_3 addWishlist countProdWish">
                                    Add To Wishlist</button>
                            `)
                        }
                        else{
                            $(".rangeAppend"+item['id']).append(`
                                <a href="/login"><button class="btn_3">Add To Cart</button></a>
                                <a href="/login"><button class="btn_3">Add To Wishlist</button></a>
                            `)
                        }
                    });
                }
            }
        },
        error: function(){
            alert('Error');
        }
    });
});
// $('.edit_pod').click(function(r){
//     let prod_id = $(this).val();
//     let ename = $("#name").val();
//     let eprice = $("#price").val();
//     let ecount = $("#count").val();
//     let edescription = $("#description").val();
//     $.ajax({
//         type: 'post',
//         url: '/edit_prod',
//         data: {prod_id: prod_id, name, price, count, description, "_token": token},
//         success: function(r){
//             console.log(r);
//         }
//     })
// })
