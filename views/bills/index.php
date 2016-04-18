<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Company</th><th class="trn">Sum</th><th class="trn">Info</th><th class="trn">Date</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($bills as $bill) { ?>
  <tr>
    <td>
      <a href='/?controller=bills&action=show&id=<?php echo $bill->id; ?>' class="trn"><?php echo $bill->company; ?></a>
    </td>
    <td>
      <?php echo $bill->sum; ?>
    </td>
    <td>
      <?php echo $bill->info; ?>
    </td>
    <td>
      <?php echo $bill->date; ?>
    </td>
  <td><a href='/?controller=bills&action=show&id=<?php echo $bill->id; ?>' class="trn">See bill</a></td></tr>
<?php } ?>
  </tbody>
</table>
</div>
<br>
<a href="/?controller=bills&action=form"><div class="btn btn-default trn">Create bill</div></a>
