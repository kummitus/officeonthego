<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr><th>User</th><th>Date</th><th>Task name and location</th><th>Start time</th><th>End Time</th></tr>
  </thead>
  <tbody>
      <tr>
        <td>
          <?php echo $time->u_id; ?>
        </td>
        <td>
          <?php echo $time->date; ?>
        </td>
        <td>
          <?php echo $time->t_id; ?>
        </td>
        <td>
          <?php echo $time->start_time; ?>
        </td>
        <td>
          <?php echo $time->end_time; ?>
        </td>
      </tr>
  </tbody>
</table>
</div>
<br>
<a href="/?controller=times&action=delete&id=<?php echo $time->id ?>"><div class="btn btn-warning">Delete</div></a>
<a href="/?controller=times&action=form&id=<?php echo $time->id ?>"><div class="btn btn-default">Update</div></a>
