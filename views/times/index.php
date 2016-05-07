<h1> Submitted hours </h1>
<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Name</th><th class="trn">Hours</th><th class="trn">Date</th><th class="trn">Task name and location</th><th></th></tr>
  </thead>
  <tbody>
<?php foreach($times as $time) {

  ?>
  <tr>
    <td>
  <?php echo $time->u_id; ?>
  </td>
  <td>
    <?php echo $time->end_time-$time->start_time; ?>
  </td>
  <td>
    <?php echo $time->date; ?>
  </td>
  <td>
    <?php echo $time->t_id; ?>
  </td>
  <td><a href='?controller=times&action=show&id=<?php echo $time->id; ?>' class="trn">See time</a></td></tr>
<?php }  ?>
  </tbody>
</table>
</div>
<br>
<a href="?controller=times&action=form"><div class="btn btn-default trn">Create time</div></a>
