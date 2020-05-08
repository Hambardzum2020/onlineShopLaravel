var token = $("#token").val();
$(document).on('click', '.addWishlist', function(){
    var _this = this;
    var prod_id = $(this).val();
    $.ajax({
        type: 'post',
        url: '/addToWishlist',
        data: { prod_id: prod_id, "_token": token },
        success: function(r){
            // $(_this).after(`<h1 style="color: green;">This product has successfully been in cart.</h1>`);
            // $(_this).remove();
            if(r == '1'){
                $(_this).after(`<h1 style="color: green;">This product is already in the wishlist.</h1>`);
                $(_this).remove();
            }
            else{
                $(_this).after(`<h1 style="color: green;">This product has successfully been in wishlist.</h1>`);
                $(_this).remove();
            }
        },
        error: function(){
            alert("Error");
        }
    });
})


$(document).on('click', '.countProdWish', function(){
    var prod_id = $(this).val();
    $.ajax({
        type: 'post',
        url: '/getCountWishProduct',
        data: { prod_id: prod_id, "_token": token },
        success: function(r){
            $("#countWishProd").html(r)
        },
        error: function(){
            alert("Error");
        }
    });
})

$.ajax({
    type: 'post',
    url: '/getCountWishProductAll',
    data: {"_token": token },
    success: function(r){
        $("#countWishProd").html(r)
    },
    error: function(){
        alert("Error");
    }
});
