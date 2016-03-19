<p> All bills </p>

<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Company</th><th>Sum</th><th>Info</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($bills as $bill) { ?>
  <tr>
    <td>
      <?php echo $bill->company; ?>
    </td>
    <td>
      <?php echo $bill->sum; ?>
    </td>
    <td>
      <?php echo $bill->info; ?>
    </td>
  <td><a href='/?controller=bills&action=show&id=<?php echo $bill->id; ?>'>See bill</a></td></tr>
<?php } ?>
  </tbody>
</table>
<br>
<a href="/?controller=bills&action=form"><div class="btn btn-default">Create bill</div></a>
