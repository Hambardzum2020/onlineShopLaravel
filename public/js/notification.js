$(document).ready(function(){
    var token = $("#token").val();
    var stacox_id = $('#getNotification').val();
    $.ajax({
        type: 'post',
        url: '/getNotification',
        data: {"_token": token, "stacox_id": stacox_id},
        success: function(r){
            r.forEach(function(item){
                $("#show_mess").append(`
                    <div class="col-sm-12 col-md-12">
                        <div class="alert-message alert-message-success">
                            <h4>
                                Alert Message Success
                            </h4>
                            <p>
                                ${item['message']}
                                From
                                <strong>
                                    Adminstracia
                                </strong>
                            </p>
                        </div>
                    </div>
                `)
            })
        },
        error: function(){
            alert("ERROR_GETNOTIFICATIONS");
        },
    })
});
