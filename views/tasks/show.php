<h1> <?php echo $task->name; ?></h1>
<h2> <?php echo $task->info; ?></h2>
<h3> <?php echo $task->g_id; ?></h3>
<p> <?php echo $task->p_id; ?> </p>
<br>
<a href="/?controller=tasks&action=delete&id=<?php echo $task->id ?>"><div class="btn btn-warning">Delete</div></a>
<a href="/?controller=tasks&action=form&id=<?php echo $task->id ?>"><div class="btn btn-default">Update</div></a>
