<a href="?controller=bills&action=form"><div class="btn btn-default trn">Create bill</div></a>
<?php foreach($companies as $company) { ?>
  <h3><?php echo $company; ?></h3>
<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Info</th><th class="trn">Sum</th><th class="trn">Date</th><th>Task</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($bills as $bill) { ?>
  <?php if($bill->company == $company) { ?>
  <tr>
    <td>
      <a href='?controller=bills&action=show&id=<?php echo $bill->id; ?>' class="trn"><?php echo $bill->info; ?></a>
    </td>
    <td>
      <span><?php echo $bill->sum; ?> €</span>
    </td>
    <td>
      <?php echo $bill->dateofpurchase; ?>
    </td>
    <td>
      <?php echo $bill->task; ?>
    </td>
  <td><a href='?controller=bills&action=show&id=<?php echo $bill->id; ?>' class="trn">See bill</a></td></tr>
<?php } }?>
  </tbody>
</table>
</div>
<br>
<?php } ?>
