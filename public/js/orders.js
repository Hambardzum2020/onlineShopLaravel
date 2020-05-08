$(document).ready(function(){
    var token = $("#token").val();
    $.ajax({
        type: 'post',
        url: '/getOrders',
        data: {
            "_token": token
        },
        success: function(r){
            r.forEach(function(item){
                $("tbody").append(`
                    <tr>
                        <td>${item['id']}</td>
                        <td>${item['time']}</td>
                        <td>${item['sum']}$</td>
                        <td>
                            <a href="orders/${item['id']}">
                                <button class='btn_3'>Order's Detalis</button>
                            </a>
                        </td>
                    </tr>
                `)
            })
        },
        error: function(){
            alert('Error_GetOrders');
        }
    })
})
