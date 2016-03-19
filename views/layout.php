<DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <script src="assets/js/jquery-2.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php session_start(); ?>
    <header>
      <div class="page-header">
        <h1>Office <small>on the road</small></h1>
      </div>
      <div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php if(isset($_SESSION['user'])) { ?><a class="navbar-brand" href=<?php if(isset($_SESSION['username'])) { echo "'?controller=users&action=show&id=".urlencode($_SESSION['user'])."'>".$_SESSION['username']; } ?></a><?php } ?>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href='/'>Home</a></li>
              <li><a href='/?controller=users&action=index'>Users</a></li>
              <li><a href='/?controller=groups&action=index'>Groups</a></li>
              <li><a href='/?controller=places&action=index'>Places</a></li>
              <li><a href='/?controller=tasks&action=index'>Tasks</a></li>
              <li><a href='/?controller=times&action=index'>Times</a></li>
              <li><a href='/?controller=bills&action=index'>Bills</a></li>
              <li><a href='/?controller=owners&action=index'>Managers</a></li>
              <?php if(isset($_SESSION['user'])) {
                  echo "<li><a href='/?controller=users&action=logout'>Log Out</a></li>";
                } else {
                  echo "<li><a href='/?controller=users&action=login'>Log In</a></li>";
                }?>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <div class="panel panel-default">
      <div class="panel-body">
        <?php require_once('utils/routes.php'); ?>
      </div>
    </div>

    <footer>
       <div class="panel-footer">Copyright Antti Häkli 2016</div>
    </footer>
  </body>
</html>
