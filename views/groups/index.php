<h3 class="trn">Active groups</h3>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Name</th><th class="trn">show</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($groups as $group) {
  if($group->active == 1) {
  ?>
  <tr>
    <td>
  <?php echo $group->name; ?>
  </td>
  <td>
    <a href='?controller=groups&action=show&id=<?php echo $group->id; ?>' class="trn btn btn-default">See group</a>
  </td>
  <td>
    <a href='?controller=groups&action=toggleactivity&id=<?php echo $group->id; ?>' class="trn btn btn-warning">Toggle Activity</a>
  </td>
</tr>
<?php }
}  ?>
  </tbody>
</table>

<h3 class="trn">Retired groups</h3>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Name</th><th class="trn">show</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($groups as $group) {
  if($group->active == 0) {
  ?>
  <tr>
    <td>
  <?php echo $group->name; ?>
  </td>
  <td>
    <a href='?controller=groups&action=show&id=<?php echo $group->id; ?>' class="trn btn btn-default">See group</a>
  </td>
  <td>
    <a href='?controller=groups&action=toggleactivity&id=<?php echo $group->id; ?>' class="trn btn btn-warning">Toggle Activity</a>
  </td>
</tr>
<?php }
}  ?>
  </tbody>
</table>
<br>
<a href="?controller=groups&action=form"><div class="btn btn-default trn">Create group</div></a>
