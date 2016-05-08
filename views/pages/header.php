<?php function showHeader($user){ ?>
<div class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <h2>Office <small>on the go</small></h2>
      <!-- <?php if(isset($user['user'])) { ?><a class="navbar-brand" href="<?php echo "?controller=pages&action=home"; ?>"><?php echo $user['username']; ?></a><?php } ?> -->
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href='?controller=pages&action=home' class="trn"><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></a></li>
          <?php if(isset($_SESSION['user'])){
            if($_SESSION['adminlevel'] == 1){ ?>
        <li><a href='?controller=users&action=index' class="trn">Users</a></li>
        <li><a href='?controller=groups&action=index' class="trn">Groups</a></li>
            <?php } ?>
        <li><a href='?controller=places&action=index' class="trn">Places</a></li>
        <li><a href='?controller=tasks&action=index' class="trn">Tasks</a></li>
        <li><a href='?controller=times&action=index' class="trn">Times</a></li>
        <li><a href='?controller=bills&action=index' class="trn">Bills</a></li>
        <li><a href='?controller=owners&action=index' class="trn">Managers</a></li>
        <li><a href='?controller=users&action=logout' class="trn">Log Out</a></li>
        <?php } ?>
      </ul>
    </div>

  </div>
</div>
<?php } ?>
