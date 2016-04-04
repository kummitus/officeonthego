<p> <?php echo $bill->company; ?></p>
<p> <?php echo $bill->sum; ?></p>
<p> <?php echo $bill->info; ?></p>
<p> <?php echo $bill->t_id; ?></p>
<p> <img src="/uploads/bills/<?php echo $bill->path; ?>" width="100%">
<a href="/?controller=bills&action=delete&id=<?php echo $bill->id ?>"><div class="btn btn-warning">Delete</div></a>
<a href="/?controller=bills&action=form&id=<?php echo $bill->id ?>"><div class="btn btn-default">Update</div></a>
