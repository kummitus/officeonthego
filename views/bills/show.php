<p> <?php echo $bill->company; ?></p>
<p> <?php echo $bill->sum; ?></p>
<p> <?php echo $bill->info; ?></p>
<p> <?php echo $bill->dateofpurchase; ?></p>
<?php if($_SESSION['adminlevel'] == 1){ ?>
  <a href="/?controller=bills&action=delete&id=<?php echo $bill->id ?>"><div class="btn btn-warning trn">Delete</div></a>
  <a href="/?controller=bills&action=form&id=<?php echo $bill->id ?>"><div class="btn btn-default trn">Update</div></a>
<?php } ?>
<a href="/?controller=bills&action=index"><div class="btn btn-default trn">Back</div></a>
<?php foreach($images as $image){ ?>
  <a href="utils/showPicture.php?path=<?php echo $image->image_path ?>"><img src="utils/showPicture.php?path=<?php echo $image->image_path ?>"/></a>
<?php } ?>
