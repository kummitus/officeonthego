<p> <?php echo $owner->name; ?></p>
<p> <?php echo $owner->email; ?></p>
<p> <?php echo $owner->phone; ?></p>

<?php if(hasAdminRights($user)){ ?>
  <a href="/?controller=owners&action=delete&id=<?php echo $owner->id ?>"><div class="btn btn-warning trn">Delete</div></a>
  <a href="/?controller=owners&action=form&id=<?php echo $owner->id ?>"><div class="btn btn-default trn">Update</div></a>
<?php } ?>
