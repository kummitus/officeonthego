<form method="post" action="?controller=times&action=create">
  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" value="<?php echo $time->id; ?>">
  </div>
  <div class="form-group">
    <label>User</label>
    <select name="u_id" class="form-control">
      <?php foreach($users as $user) { ?>
        <option value="<?php echo $user->id; ?>" <?php if($user->id == $time->u_id) { echo "selected='selected'"; } ?>><?php echo $user->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label>Date</label>
    <input type="date" class="form-control" name="date" value="<?php echo $time->date; ?>">
  </div>
  <div class="form-group">
    <label>Start time</label>
    <input type="time" class="form-control" name="start_time" value="<?php echo $time->start_time; ?>">
  </div>
  <div class="form-group">
    <label>End time</label>
    <input type="time" class="form-control" name="end_time" value="<?php echo $time->end_time; ?>">
  </div>
  <div class="form-group">
    <label>Task</label>
    <select name="t_id" class="form-control">
      <?php foreach($tasks as $task) { ?>
        <option value="<?php echo $task->id; ?>" <?php if($task->id == $time->t_id) { echo "selected='selected'"; } ?>><?php echo $task->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
</form>
