<p> <?php echo $user->name; ?></p>
<p> <?php if($user->adminlevel == 1){
  echo "Admin";
} ?></p>
<a href="/?controller=users&action=delete&id=<?php echo $user->id ?>"><div class="btn btn-warning">Delete</div></a>
<a href="/?controller=users&action=form&id=<?php echo $user->id ?>"><div class="btn btn-default">Update</div></a>
<a href="/?controller=users&action=toggleadmin&id=<?php echo $user->id ?>"><div class="btn btn-default">Toggle admin</div></a>
