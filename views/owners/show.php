<p> <?php echo $owner->name; ?></p>
<p> <?php echo $owner->email; ?></p>
<p> <?php echo $owner->phone; ?></p>
<a href="/?controller=owners&action=delete&id=<?php echo $owner->id ?>"><div class="btn btn-warning">Delete</div></a>
<a href="/?controller=owners&action=form&id=<?php echo $owner->id ?>"><div class="btn btn-default">Update</div></a>
