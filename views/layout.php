<DOCTYPE html>
<html>
  <head>
    <title>Office on the go</title>
    <meta charset="utf-8">
    <link rel="manifest" href="/manifest.json">
    <meta name="viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1, maximum-scale = 1, user-scalable = no" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel=”apple-touch-icon” href=”apple-touch-icon.png”/>
    <link rel=”apple-touch-icon-precomposed” href=”apple-touch-icon.png”/>
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
    <script src="assets/js/dialogs.js"></script>
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
