var token = $("#token").val();
$(document).on('click', '.addCart', function(){
    var _this = this;
    var prod_id = $(this).val();
    $.ajax({
        type: 'post',
        url: '/addToCart',
        data: { prod_id: prod_id, "_token": token },
        success: function(r){
            // $(_this).after(`<h1 style="color: green;">This product has successfully been in cart.</h1>`);
            // $(_this).remove();
            if(r == '1'){
                $(_this).after(`<h1 style="color: green;">This product is already in the cart.</h1>`);
                $(_this).remove();
            }
            else{
                $(_this).after(`<h1 style="color: green;">This product has successfully been in cart.</h1>`);
                $(_this).remove();
            }
        },
        error: function(){
            alert("Error");
        }
    });
})

$(document).on('click', '.countProdCart', function(){
    var prod_id = $(this).val();
    $.ajax({
        type: 'post',
        url: '/getCountCartProduct',
        data: { prod_id: prod_id, "_token": token },
        success: function(r){
            $("#countCartProd").html(r)
        },
        error: function(){
            alert("Error_countProdCart");
        }
    });
})

$.ajax({
    type: 'post',
    url: '/getCountNotification',
    data: {"_token": token },
    success: function(r){
        $("#countNotification").html(r)
    },
    error: function(){
        alert("ERROR_NOTIF")
    }
})

$.ajax({
    type: 'post',
    url: '/getCountCartProductAll',
    data: {"_token": token },
    success: function(r){
        $("#countCartProd").html(r)
    },
    error: function(){
        alert("Error");
    }
});


$(document).on('click', '.input-number-Increment', function(){
    var prodCart_id = $(this).val();
    var subtotal = $("#subtotal").val();
    var price = $("#price" + prodCart_id).val();
    $.ajax({
        type: 'post',
        url: '/incrementProductInCart',
        data: {prodCart_id: prodCart_id, subtotal: subtotal, "_token": token},
        success: function(r){
            console.log(r)
            if(r=='1'){
                $('.input-Number'+prodCart_id).css("background", "red");
            }
            else{
                $('.input-Number'+prodCart_id).val(r[1]);
                $('.input-Number'+prodCart_id).css("background", "green");
                $("#allPrice" + prodCart_id).html('$'+price*r[1]+'.00');
                $("#dsNone" + prodCart_id).css("display", 'none');
                $("#allPrice" + prodCart_id).css('display', 'block');
                $('#subtotal').val(r[0]);
            }
        },
        error: function(){
            alert("Error");
        }
    })
});


$(document).on('click', '.input-number-Decrement', function(){
    var prodCart_id = $(this).val();
    var subtotal = $("#subtotal").val();
    var price = $("#price" + prodCart_id).val();
    var countCartProd = $("#countCartProd").html();
    var _this = this;
    $.ajax({
        type: 'post',
        url: '/decrementProductInCart',
        data: {prodCart_id: prodCart_id, subtotal: subtotal, "_token": token},
        success: function(r){
            if(r=='0'){
                $('.CartNumber'+prodCart_id).remove();
                $("#countCartProd").html(countCartProd - 1);
            }
            else{
                $('.input-Number'+prodCart_id).val(r[1]);
                $('.input-Number'+prodCart_id).css("background", "green");
                $("#allPrice" + prodCart_id).html('$'+price*r[1]+'.00');
                $("#dsNone" + prodCart_id).css("display", 'none');
                $("#allPrice" + prodCart_id).css('display', 'block');
                $('#subtotal').val(r[0]);
            }
        },
        error: function(){
            alert("Error");
        }
    })
});
