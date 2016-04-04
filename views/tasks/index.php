<p> All Tasks </p>

<h3>Active Tasks</h3>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Name</th><th>Group</th><th><th></th></th></tr>
  </thead>
  <tbody>
<?php foreach($tasks as $task) {
  if($task->active == 1) {
  ?>
  <tr>
    <td>
  <?php echo $task->name; ?>
  </td>
  <td>
    <?php echo $task->g_id; ?>
  </td>
  <td><a href='/?controller=tasks&action=show&id=<?php echo $task->id; ?>'>See task</a></td>
  <td><a href='/?controller=tasks&action=toggleactivity&id=<?php echo $task->id; ?>'>Toggle Activity</a></td>
</tr>
<?php }
}  ?>
  </tbody>
</table>

<h3>Retired tasks</h3>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Name</th><th>Group</th><th></th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($tasks as $task) {
  if($task->active == 0) {
  ?>
  <tr>
    <td>
  <?php echo $task->name; ?>
  </td>
  <td>
    <?php echo $task->g_id; ?>
  </td>
  <td><a href='/?controller=tasks&action=show&id=<?php echo $task->id; ?>'>See task</a></td>
  <td><a href='/?controller=tasks&action=toggleactivity&id=<?php echo $task->id; ?>'>Toggle Activity</a></td></tr>
<?php }
}  ?>
  </tbody>
</table>
<br>
<a href="/?controller=tasks&action=form"><div class="btn btn-default">Create task</div></a>
