<DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="assets/js/jquery-2.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <header>
      <div class="page-header">
        <h1>Office <small>on the road</small></h1>
      </div>

      <?php if(verifyLogin($_SESSION)){
        showHeader($_SESSION);
      }?>
    </header>


    <div class="panel panel-default">
      <div class="panel-body">
        <?php require_once('utils/routes.php'); ?>
        <?php if(!verifyLogin($_SESSION)){
          include('views/users/login.php');
        } ?>
      </div>
    </div>

    <footer>
       <div class="panel-footer">Copyright Antti Häkli 2016</div>
    </footer>
  </body>
</html>
