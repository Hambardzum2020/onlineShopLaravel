$(document).ready(function(){
    var token = $("#token").val();
    var order_detalis_id = $("#order_detalis_id_feedback").val();
    var product_id = $("#product_id_feedback").val();
    $.ajax({
        type: 'post',
        url: '/getProductsDataForFeedback',
        data: {order_detalis_id, product_id, "_token": token},
        success: function(r){
            $("#feedbackSentPhoto").append(`
                <div class="single_product_img">
                    <img src="../../img/${r['photo']}" alt="#" class="img-fluid img_carusel">
                </div>
            `)
            $("#feedbackSentText").append(`
                <div class="single_product_text text-center">
                    <h3>
                        ${r['name']}<br>
                        ${r['description']}<br>
                    </h3>
                    <p>
                      Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness. Credibly innovate granular internal or organic sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences. Dramatically synthesize integrated schemas. with optimal networks.
                    </p>
                </div>
            `)
            $("#showFdb").after(`
                <div class="col-lg-12" id="div_textarea">
                    <textarea name="" id="_textarea" cols="120" rows="2"></textarea>
                    <button value='${r['order_detalis_id']}' class='btn_3' id='save_feedback'>Save</button>
                </div>
            `)
            $("#_textarea").val(r['feedback'])
        },
        error: function(){
            alert("Error_Feedback");
        }
    })

    $.ajax({
        type: 'post',
        url: '/showFeedBackAll',
        data: {order_detalis_id, product_id, "_token": token},
        success: function(r){
            r.forEach(function(item){
                $("#show_fdb").append(`
                    <div class="col-sm-12 col-md-12">
                        <div class="alert-message alert-message-success">
                            <h4>
                                Alert Message Success
                            </h4>
                            <p>
                                ${item['feedback']}
                                From
                                <strong>
                                    ${item['user_name'] + " " + item['user_surname']}
                                </strong>
                            </p>
                        </div>
                    </div>
                `)
            })
        },
        error: function(){
            alert("ERROR_SHOWFEEDBACKALL");
        }
    });

    $(document).on('click', '#save_feedback', function(){
        var order_detalis_id = $(this).val();
        var _textarea = $("#_textarea").val();
        $.ajax({
            type: 'post',
            url: '/saveFeedback',
            data: {order_detalis_id, _textarea, "_token": token},
            success: function(r){
                alert(r);
            },
            error: function(){
                alert("ERROR_SAVEFEEDBACK");
            }
        })
    })
});

