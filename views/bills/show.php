<table class="table table-striped table-bordered">
<tr><td><h1>Company</td><td> <?php echo $bill->company; ?></h1></td></tr>
<tr><td>Sum</td><td> <?php echo $bill->sum; ?></td></tr>
<tr><td>Info</td><td> <?php echo $bill->info; ?></td></tr>
<tr><td>Date</td><td> <?php echo $bill->dateofpurchase; ?></td></tr>
<tr><td>Task</td><td> <?php echo $bill->task; ?></td></tr>
</table>

<?php foreach($images as $image){ ?>
  <a href="utils/showPicture.php?path=<?php echo $image->image_path ?>"><img src="utils/showPicture.php?path=<?php echo $image->image_path ?>"/></a>
<?php } ?>
<?php if($_SESSION['adminlevel'] == 1){ ?>
  <a href="?controller=bills&action=delete&id=<?php echo $bill->id ?>"><div class="btn btn-warning trn">Delete</div></a>
  <a href="?controller=bills&action=form&id=<?php echo $bill->id ?>"><div class="btn btn-default trn">Update</div></a>
<?php } ?>
<a href="?controller=bills&action=index"><div class="btn btn-default trn">Back</div></a>
