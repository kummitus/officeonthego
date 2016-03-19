<p> All owners </p>

<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Name</th><th>Phone</th><th>Email</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($owners as $owner) { ?>
  <tr>
    <td>
      <?php echo $owner->name; ?>
    </td>
    <td>
      <?php echo $owner->phone; ?>
    </td>
    <td>
      <?php echo $owner->email; ?>
    </td>
  <td><a href='/?controller=owners&action=show&id=<?php echo $owner->id; ?>'>See manager</a></td></tr>
<?php } ?>
  </tbody>
</table>
<br>
<a href="/?controller=owners&action=form"><div class="btn btn-default">Create Manager</div></a>
