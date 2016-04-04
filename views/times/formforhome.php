<h3>Submit hours for current task</h3>
<form method="post" action="?controller=times&action=create">
  <div class="form-group">
    <input type="number" name="u_id" class="form-control hidden" value="<?php echo $_SESSION['user']; ?>">
  </div>
  <div class="form-group">
    <label>Date</label>
    <input type="date" class="form-control" name="date" value="">
  </div>
  <div class="form-group">
    <label>Start time</label>
    <input type="time" class="form-control" name="start_time" value="">
  </div>
  <div class="form-group">
    <label>End time</label>
    <input type="time" class="form-control" name="end_time" value="">
  </div>
  <div class="form-group">
    <input type="number" name="t_id" class="form-control hidden" value="<?php echo $task->id; ?>">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
</form>
