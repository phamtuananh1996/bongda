<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demos.bootdey.com/dayday/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2017 10:24:43 GMT -->
<head>
<base href="{{asset('') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/dayday/img/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Day-Day</title>
    <!-- Bootstrap core CSS -->
   
    <link href="assets/dayday/bootstrap.3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dayday/font-awesome.4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/timeline.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/cover.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/forms.css" rel="stylesheet">
    <link href="assets/dayday/assets/css/buttons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link href="css/screen.css" rel="stylesheet">
  <script type="text/javascript" src='js/jquery.validate.js'></script>
  <script src="assets/dayday/bootstrap.3.3.6/js/bootstrap.min.js"></script>
   <script src="assets/dayday/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/dayday/dist/sweetalert.css">
    <script type="text/javascript" src="js/newsfeed.js"> </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="animated fadeIn">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-white navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home"><b>DayDay</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           <li><a id="positionpost" class="btn btn-azure pull-right " data-toggle="modal" data-target="#myModal" style="display: none;color: #fff"> Đăng bài tìm đối thủ</a></li>
           <li><a href="home">Home</a></li>
            <li class="actives"><a href="profile">Profile</a></li>
            <li class="actives"><a href="myclub">My Team</a></li>
            <li><a href="logout">Logout</a></li>
           
          </ul>
        </div>
      </div>
    </nav>
    
    @yield('main')

    <footer class="footer">
      <div class="container">
        <p class="text-muted"> Copyright &copy; Company - All rights reserved </p>
      </div>
    </footer>
      <script type="text/javascript">
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-49755460-1', 'auto', {'allowLinker': true});
          ga('require', 'linker');
          ga('linker:autoLink', ['bootdey.com','www.bootdey.com','demos.bootdey.com'] );
          ga('send', 'pageview');
      </script>
  </body>

<!-- Mirrored from demos.bootdey.com/dayday/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2017 10:25:13 GMT -->
</html>
