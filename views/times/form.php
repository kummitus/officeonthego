<form method="post" action="?controller=times&action=create">
  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" value="<?php echo $time->id; ?>">
  </div>
  <div class="form-group">
    <label for="u_id" class="trn">User</label>
    <select name="u_id" class="form-control">
      <?php foreach($users as $user) { ?>
        <option value="<?php echo $user->id; ?>" <?php if($user->id == $time->u_id) { echo "selected='selected'"; } ?>><?php echo $user->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="date" class="trn">Date</label>
    <input type="text" id="datepicker" class="form-control" name="date" value="<?php echo date('m/d/y'); ?>">
  </div>
  <div class="form-group">
    <label for="start_time" class="trn">Start time</label>
    <input type="time" class="form-control" name="start_time" value="<?php echo date('H:i', time() - 60*120);?>">
  </div>
  <div class="form-group">
    <label for="end_time" class="trn">End time</label>
    <input type="time" class="form-control" name="end_time" value="<?php echo date('H:i', time()); ?>">
  </div>
  <div class="form-group">
    <label for="t_ids" class="trn">Task</label>
    <select name="t_id" class="form-control">
      <?php foreach($tasks as $task) { ?>
        <?php if($task->active == 1) { ?>
        <option value="<?php echo $task->id; ?>" <?php if($task->id == $time->t_id) { echo "selected='selected'"; } ?>><?php echo $task->name; ?> </option>
        <?php } ?>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary trn">Add</button>
  </div>
</form>


<script>
$(function() {
    $( "#datepicker" ).datepicker({
      firstDay: 1
    });
    $( "#datepicker" ).attr( 'readOnly' , 'true' );
});
</script>
