$(document).ready(function(){
    var token = $("#token").val();
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type: 'post',
            url: 'check_current_pwd',
            data: {current_pwd: current_pwd, "_token": token},
            success: function(result){
                //alert(result);
                if(result == 'false'){
                    $("#chkCurrentPwd").html("<font color='red'>Current password is incorrect.</font>")
                }
                else if(result == 'true'){
                    $("#chkCurrentPwd").html("<font color='green'>Current password is correct.</font>")
                }
                if(current_pwd == ""){
                    $("#chkCurrentPwd").html("");
                }
            },
            error: function(){
                alert('Error_Chek_current_pwd');
            }
        });
    })
})
