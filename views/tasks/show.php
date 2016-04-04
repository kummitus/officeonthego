<table class="table table-striped table-bordered">
  <tbody>
  <tr>
    <td><h3>Title:  </h3></td><td><h3><?php echo $task->name; ?></h3></td>
  </tr>
  <tr>
    <td><p>Location: </td><td><?php echo $task->p_id; ?> </p></td>
  </tr>
  <tr>
    <td><p>Group name: </td><td><?php echo $task->g_id; ?></p></td>
  </tr>
  <td><p>Information:  </td><td><?php echo $task->info; ?></p></td>
  </tr>
</tbody>
</table>
<br>
<a href="/?controller=tasks&action=delete&id=<?php echo $task->id ?>"><div class="btn btn-warning">Delete</div></a>
<a href="/?controller=tasks&action=form&id=<?php echo $task->id ?>"><div class="btn btn-default">Update</div></a>
