<h3>Current Task</h3>
<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Name</th><th>Info</th><th>Address</th></tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $task->name; ?></td>
      <td><?php echo $task->info; ?></td>
      <td><a href="https://maps.google.fi/?q=<?php echo $task->p_id;?>+<?php echo $task->active;?>"><?php echo $task->p_id; ?>, <?php echo $task->active; ?></a></td>
    </tr>
  </tbody>
</table>
</div>
