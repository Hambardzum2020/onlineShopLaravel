<!doctype html>
<html lang="zxx">

<head>
    @include('includes.head')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
</head>
<body class="w3-light-grey">

    <!--::header part start::-->
        @include('includes.homeHeader')
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>My Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->





<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">

    <!-- Left Column -->
    <div class="w3-third">

      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="https://img.icons8.com/plasticine/2x/user.png" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2 id="color">{{$data['name']." ".$data['surname']}}</h2>
          </div>
        </div>
        <div class="w3-container">
          <p id="color"><i id="iColor" class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Designer</p>
          <p id="color"><i id="iColor" class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Yerevan, Armenia</p>
          <p id="color"><i id="iColor" class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$data['email']}}</p>
          <p id="color"><i id="iColor" class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1224435534</p>
          <hr>

          <p class="w3-large"><b id="color"><i id="iColor" class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
          <p id="color">Adobe Photoshop</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div id="iColorSpan" class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
          </div>
          <p id="color">Photography</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div id="iColorSpan" class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
              <div id="iColorSpan" class="w3-center w3-text-white">80%</div>
            </div>
          </div>
          <p id="color">Illustrator</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div id="iColorSpan" class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
          </div>
          <p id="color">Media</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div id="iColorSpan" class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>
          </div>
          <br>

          <p class="w3-large w3-text-theme"><b id="color"><i id="iColor" class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
          <p id="color">English</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div id="iColorSpan" class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
          </div>
          <p id="color">Spanish</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div id="iColorSpan" class="w3-round-xlarge w3-teal" style="height:24px;width:55%"></div>
          </div>
          <p id="color">German</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div id="iColorSpan" class="w3-round-xlarge w3-teal" style="height:24px;width:25%"></div>
          </div>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">

      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i id="iColor" class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b id="color">Front End Developer / w3schools.com</b></h5>
          <h6 id="iColor" class="w3-text-teal"><i id="iColor" class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span id="iColorSpan" class="w3-tag w3-teal w3-round">Current</span></h6>
          <p id="color">Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b id="color">Web Developer / something.com</b></h5>
          <h6 id="iColor" class="w3-text-teal"><i id="iColor" class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>
          <p id="color">Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b id="color">Graphic Designer / designsomething.com</b></h5>
          <h6 id="iColor" class="w3-text-teal"><i id="iColor" class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>
          <p id="color">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>
        </div>
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i id="iColor" class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b id="color">W3Schools.com</b></h5>
          <h6 id="iColor" class="w3-text-teal"><i id="iColor" class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
          <p id="color">Web Development! All I need to know in one place</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b id="color">London Business School</b></h5>
          <h6 id="iColor" class="w3-text-teal"><i id="iColor" class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015</h6>
          <p id="color">Master Degree</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b id="color">School of Coding</b></h5>
          <h6 id="iColor" class="w3-text-teal"><i id="iColor" class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013</h6>
          <p id="color">Bachelor Degree</p><br>
        </div>
      </div>

    <!-- End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

  <!-- End Page Container -->
</div>
<input type="hidden" value="{{csrf_token()}}" id="token">

    <!--::footer_part start::-->
    @include('includes.footer')
    <!--::footer_part end::-->


    <!-- Script Start -->
    @include('includes.JsScript')
    <!-- Script End -->
</body>

</html>
