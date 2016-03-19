<p> All groups </p>

<h3>Active groups</h3>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Name</th><th>show</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($groups as $group) {
  if($group->active == 1) {
  ?>
  <tr>
    <td>
  <?php echo $group->name; ?></td><td>
  </td>
  <td><a href='/?controller=groups&action=show&id=<?php echo $group->id; ?>'>See group</a></td></tr>
<?php }
}  ?>
  </tbody>
</table>

<h3>Retired groups</h3>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Name</th><th>show</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($groups as $group) {
  if($group->active == 0) {
  ?>
  <tr>
    <td>
  <?php echo $group->name; ?></td><td>
  </td>
  <td><a href='/?controller=groups&action=show&id=<?php echo $group->id; ?>'>See group</a></td></tr>
<?php }
}  ?>
  </tbody>
</table>
<br>
<a href="/?controller=groups&action=form"><div class="btn btn-default">Create group</div></a>
