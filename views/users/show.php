<p> <?php echo $user->name; ?></p>
<p> <?php if($user->adminlevel == 1){
  echo "Admin";
} ?></p>
<a href="/?controller=users&action=delete&id=<?php echo $user->id ?>"><div class="btn btn-warning trn">Delete</div></a>
<a href="/?controller=users&action=form&id=<?php echo $user->id ?>"><div class="btn btn-default trn">Update</div></a>
<a href="/?controller=users&action=toggleadmin&id=<?php echo $user->id ?>"><div class="btn btn-default trn">Toggle admin</div></a>
<a href="/?controller=users&action=index"><div class="btn btn-default trn">Back</div></a>
