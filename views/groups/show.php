<h1> <?php echo $group->name; ?></h1>
  <br>
  <p><?php echo $group->info; ?></p>
  <br>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Status</th><th class="trn">Username</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach ($members as $member) { ?>
  <tr><td> <span class="trn"><?php if($member->id == $group->a_id) { echo "Teamleader"; }else{ echo "Member";} ?></span></td><td><?php echo $member->name; ?></td><td> <a href="?controller=memberships&action=leave&g_id=<?php echo $group->id ?>&u_id=<?php echo $member->id; ?>"><div class="btn btn-warning trn">Remove member</div></a></td></tr>
<?php } ?>
  </tbody>
</table>
<br>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Name</th><th class="trn">Location</th><th></th></tr>
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
        <a href="?controller=tasks&action=show&id=<?php echo $task->id?>" class="trn">Show task</a>
      </td>
    <tr>
<?php } ?>
  </tbody>
<table>

<a href="?controller=groups&action=delete&id=<?php echo $group->id ?>"><div class="btn btn-danger trn">Delete</div></a>
<a href="?controller=groups&action=form&id=<?php echo $group->id ?>"><div class="btn btn-default trn">Update</div></a>
<a href="?controller=groups&action=join&g_id=<?php echo $group->id ?>"><div class="btn btn-default trn">Add member</div></a>
<a href="?controller=groups&action=index"><div class="btn btn-default trn">Back</div></a>
