<p> <?php echo $user->name; ?></p>
<a href="/?controller=users&action=delete&id=<?php echo $user->id ?>"><div class="btn btn-warning">Delete</div></a>
<a href="/?controller=users&action=form&id=<?php echo $user->id ?>"><div class="btn btn-default">Update</div></a>
