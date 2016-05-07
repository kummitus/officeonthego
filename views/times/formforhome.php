
<?php
  date_default_timezone_set('Europe/Helsinki');
 ?>
<h3 class="trn">Submit hours for current task</h3>
<form method="post" action="?controller=times&action=create">
  <div class="form-group">
    <label for="select-choice-1" class="select trn">Task</label>
    <select name="t_id" id="select-choice-1" class="form-control" >
      <?php foreach($tasks as $task) { ?>
        <option value="<?php echo $task->id; ?>" <?php if($task->g_id == $task->g_id) { echo "selected='selected'"; } ?>><?php echo $task->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="select-choice-2" class="select trn">Present</label>
    <select name="members[]" id="select-choice-2" multiple="multiple">
      <?php foreach($members as $member) { ?>
        <option value="<?php echo $member->id ?>" selected="selected"><?php echo $member->name ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="date" class="trn">Date</label>
    <input type="text" id="datepicker" class="form-control" name="date" value="<?php echo date('m/d/y'); ?>">
  </div>
  <div class="form-group">
    <label for="start_time" class="trn">Start time</label>
    <input type="time" class="form-control" name="start_time" value="<?php echo date('H:i', time() - 60*90); ?>">
  </div>
  <div class="form-group">
    <label for="end_time" class="trn">End time</label>
    <input type="time" class="form-control" name="end_time" value="<?php echo date('H:i', time()); ?>">
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
