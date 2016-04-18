<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Name</th><th class="trn">Phone</th><th class="trn">Email</th><th></th></tr>
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
  <td><a href='/?controller=owners&action=show&id=<?php echo $owner->id; ?>' class="trn">See manager</a></td></tr>
<?php } ?>
  </tbody>
</table>
<br>

<?php if($_SESSION['adminlevel'] == 1){ ?>
  <a href="/?controller=owners&action=form"><div class="btn btn-default trn">Create Manager</div></a>
<?php } ?>
