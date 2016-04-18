<p> <?php echo $bill->company; ?></p>
<p> <?php echo $bill->sum; ?></p>
<p> <?php echo $bill->info; ?></p>
<p> <?php echo $bill->t_id; ?></p>
<?php foreach($images as $image){ ?>
  <a href="utils/showPicture.php?path=<?php echo $image->image_path ?>"><img src="utils/showPicture.php?path=<?php echo $image->image_path ?>"/></a>
<?php } ?>
<?php if(hasAdminRights($user)){ ?>
  <a href="/?controller=bills&action=delete&id=<?php echo $bill->id ?>"><div class="btn btn-warning trn">Delete</div></a>
  <a href="/?controller=bills&action=form&id=<?php echo $bill->id ?>"><div class="btn btn-default trn">Update</div></a>
<?php } ?>
