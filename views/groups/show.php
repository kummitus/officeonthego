<h1> <?php echo $group->name; ?></h1>
  <br>
  <p><?php echo $group->info; ?></p>
  <br>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Status</th><th>Username</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach ($members as $member) { ?>
  <tr><td> <?php if($member->id == $group->a_id) { echo "Teamleader"; }else{ echo "Member";} ?></td><td><?php echo $member->name; ?></td><td> <a href="/?controller=memberships&action=leave&g_id=<?php echo $group->id ?>&u_id=<?php echo $member->id; ?>"><div class="btn btn-warning">Remove member</div></a></td></tr>
<?php } ?>
  </tbody>
</table>
<br>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Name</th><th>Location</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach ($tasks as $task) { ?>
    <tr>
      <td>
        <?php echo $task->name; ?>
      </td>
      <td>
        <?php echo $task->p_id; ?>
      </td>
      <td>
        <a href="/?controller=tasks&action=show&id=<?php echo $task->id?>">Show task</a>
      </td>
    <tr>
<?php } ?>
  </tbody>
<table>

<a href="/?controller=groups&action=delete&id=<?php echo $group->id ?>"><div class="btn btn-danger">Delete</div></a>
<a href="/?controller=groups&action=form&id=<?php echo $group->id ?>"><div class="btn btn-default">Update</div></a>
<a href="/?controller=groups&action=join&g_id=<?php echo $group->id ?>"><div class="btn btn-default">Add member</div></a>
