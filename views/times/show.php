<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">User</th><th class="trn">Date</th><th class="trn">Task name and location</th><th class="trn">Start time</th><th class="trn">End Time</th></tr>
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

<?php if($_SESSION['adminlevel'] == 1){ ?>
  <a href="/?controller=times&action=delete&id=<?php echo $time->id ?>"><div class="btn btn-warning trn">Delete</div></a>
  <a href="/?controller=times&action=form&id=<?php echo $time->id ?>"><div class="btn btn-default trn">Update</div></a>
<?php } ?>
<a href="/?controller=times&action=index"><div class="btn btn-default trn">Back</div></a>
