
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demos.bootdey.com/dayday/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2017 10:25:36 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <link rel="icon" href="assets/dayday/img/favicon.png">
    <title>DayDay</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/dayday/bootstrap.3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dayday/font-awesome.4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/timeline.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/login_register.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/forms.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/buttons.css" rel="stylesheet">
    <script src="assets/dayday/assets/js/jquery.1.11.1.min.js"></script>
    <script src="assets/dayday/bootstrap.3.3.6/js/bootstrap.min.js"></script>
    <script src="assets/dayday/assets/js/custom.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button id="menu-toggle" type="button" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar bar1"></span>
            <span class="icon-bar bar2"></span>
            <span class="icon-bar bar3"></span>
          </button>
          <a class="navbar-brand" href="profile.html">Day-Day</a>
        </div>
      </div>
    </nav>
    <div class="wrapper">
         
      <div class="parallax filter-black">
          <div class="parallax-image"></div>             
          <div class="small-info">
            
            <div class="col-sm-10 col-sm-push-1 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
              <div class="card-group animated flipInX">
               
                
                <div class="card">
                  
                  <div class="card-block center">
                    <h4 class="m-b-0">
                      <span class="icon-text">Forgot Password</span>
                    </h4>
                    <p class="text-muted" id="notification">Enter your email address</p>
                    <form action="forgotpassword" method="post" id="form_forgot">
                    {{csrf_field()}}
                      <div class="form-group">
                        <input type="text" class="form-control" maxlength="50" id="email" minlength="2" name="email" required placeholder="Email">
                      </div>
                     
                      
                    </form>
                    <button id="submit" class="btn btn-azure">submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <footer class="footer">
        <div class="container">
          <p class="text-muted"> Copyright &copy; Company - All rights reserved </p>
        </div>
      </footer>
     
    </div>
  </body>

<!-- Mirrored from demos.bootdey.com/dayday/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2017 10:25:40 GMT -->
</html>
<script type="text/javascript">
  $(document).ready(function() {
      var check=0;
    $(window).on('keydown', function(e) {
      if (e.which == 13) {
        return false;
      }
    });
    $("#submit").click(function(event) {
      $.get('ajax/checkemail', {email: $("#email").val()}, function(data, textStatus, xhr) {
        check=data;
        if(check==1)
        {
          $("#form_forgot").submit();
        }
        else
        {
           $("#email").css({
              'border-color': 'red',
            });
           $("#notification").css({
              'color': 'red',
            });
           $("#notification").html('Email can\'t exists');
        }
      });
    });

  });
</script>