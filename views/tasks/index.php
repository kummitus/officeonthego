<h3 class="trn">Active Tasks</h3>
<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="trn">Name</th>
      <th class="trn">Group</th>
      <th class="trn">Time spent</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
<?php foreach($tasks as $task) {
  if($task->active == 1) {
  ?>
  <tr>
    <td>
  <a href='/?controller=tasks&action=show&id=<?php echo $task->id; ?>' class="trn"><?php echo $task->name; ?></a>
  </td>
  <td>
    <?php echo $task->g_id; ?>
  </td>
  <td>
    <?php echo $task->p_id; ?> <span class="trn">hours</span>
  </td>
  <td><a href='/?controller=tasks&action=show&id=<?php echo $task->id; ?>' class="trn">See task</a></td>
  <td><a href='/?controller=tasks&action=toggleactivity&id=<?php echo $task->id; ?>' class="trn">Toggle Activity</a></td>
</tr>
<?php }
}  ?>
  </tbody>
</table>
</div>

<h3 class="trn">Retired tasks</h3>
<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="trn">Name</th>
      <th class="trn">Group</th>
      <th class="trn">Time spent</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
<?php foreach($tasks as $task) {
  if($task->active == 0) {
  ?>
  <tr>
    <td>
      <a href="/?controller=tasks&action=show&id=<?php echo $task->id; ?>" class="trn"><?php echo $task->name; ?></a>
    </td>
    <td>
      <?php echo $task->g_id; ?>
    </td>
    <td>
      <?php echo $task->p_id; ?>
    </td>
    <td><a href="/?controller=tasks&action=show&id=<?php echo $task->id; ?>" class="trn">See task</a></td>
    <td><a href="/?controller=tasks&action=toggleactivity&id=<?php echo $task->id; ?>" class="trn">Toggle Activity</a></td>
  </tr>
<?php }
}  ?>
  </tbody>
</table>
</div>
<br>

<?php if(hasAdminRights($_SESSION)){ ?>
<a href="/?controller=tasks&action=form"><div class="btn btn-default trn">Create task</div></a>
<?php } ?>
