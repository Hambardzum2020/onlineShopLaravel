<!doctype html>
<html lang="zxx">

<head>
    @include('includes.head')
</head>
<style>
.alert-message
{
    margin: 20px 0;
    padding: 20px;
    border-left: 3px solid #eee;
}
.alert-message h4
{
    margin-top: 0;
    margin-bottom: 5px;
}
.alert-message p:last-child
{
    margin-bottom: 0;
}
.alert-message code
{
    background-color: #fff;
    border-radius: 3px;
}
.alert-message-success
{
    background-color: #F4FDF0;
    border-color: #3C763D;
}
.alert-message-success h4
{
    color: #3C763D;
}

</style>

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
                        <h2>Notifications</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->



<div class="container">
    <div class="row" id='show_mess'>

    </div>
</div>


    <input type="hidden" value="{{$data['id']}}" id="getNotification">
    <input type="hidden" value="{{csrf_token()}}" id="token">
    <!-- subscribe part end -->

    <!--::footer_part start::-->
    @include('includes.footer')
    <!--::footer_part end::-->

    <!-- Script Start -->
     @include('includes.JsScript')
      <script src="{{asset('js/notification.js')}}"></script>
    <!-- Script End -->
</body>
</html>
