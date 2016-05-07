<!DOCTYPE html>
<html>
  <head>
    <title>Office on the go</title>
    <meta charset="utf-8">
    <link rel="manifest" href="manifest.json">
    <meta name="viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1, maximum-scale = 1, user-scalable = no" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png?">
    <link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png?">
    <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png?">
    <link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png?">
    <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png?">
    <link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png?">
    <link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png?">
    <link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png?">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png?">
    <link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png?">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png?">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png?">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png?">
    <link rel="icon" type="image/x-icon" href="favicon.ico?">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
    <!--<meta name="msapplication-TileColor" content="#ffffff">-->
    <meta name="msapplication-TileImage" content="ms-icon-144x144.png?">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/dropdown.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/jquery-2.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>
    <!--<script src="assets/js/dialogs.js"></script>-->
  </head>
  <body>
    <header>
      <!--<div class="page-header">
        <h1>Office <small>on the road</small></h1>
      </div> -->

      <?php showHeader($_SESSION);?>
    </header>


    <div class="panel panel-default">
      <div class="panel-body">
        <?php require_once('utils/routes.php'); ?>
        <?php if(!isset($_SESSION['user'])){
          include('views/users/login.php');
        } ?>
      </div>
    </div>

    <footer>
       <div class="panel-footer"><a href="?controller=pages&action=about">Copyright Antti Häkli 2016</a></div>
    </footer>


    <script type="text/javascript">
    $(document).ready(function(){
	     // iOS web app full screen hacks.
	      if(window.navigator.standalone == true) {
		// make all link remain in web app mode.
  		    $('a').click(function() {
  			    window.location = $(this).attr('href');
            return false;
  		    });
	       }
      });
    </script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/jquery.translate.js"></script>
    <script src="assets/js/translation.js"></script>
  </body>
</html>
