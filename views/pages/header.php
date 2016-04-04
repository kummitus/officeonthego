<?php function showHeader($user){ ?>
<div class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php if(isset($user['user'])) { ?><a class="navbar-brand" href=<?php echo "?controller=users&action=show&id=".urlencode($user['user']).'>'.$user['username']; ?></a><?php } ?>
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
        <li><a href='/?controller=users&action=logout'>Log Out</a></li>
      </ul>
    </div>

  </div>
</div>
<?php } ?>
