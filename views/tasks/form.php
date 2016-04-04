<form method="post" action="?controller=tasks&action=create">

  <div class="form-group">
    <form type="number" class="form-control hidden" name="id" id="id" value="<?php echo $task->id; ?>">
  </div>
  <div class="form-group">
    <label>Group</label>
    <select name="g_id" id="g_id" class="form-control">
      <?php foreach($groups as $group) { ?>
        <option value="<?php echo $group->id; ?>" <?php if($group->id == $task->g_id) { echo "selected='selected'"; } ?>><?php echo $group->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label>Place</label>
    <select name="p_id" id="p_id" class="form-control">
      <?php foreach($places as $place) { ?>
        <option value="<?php echo $place->id; ?>" <?php if($place->id == $task->p_id) { echo "selected='selected'"; } ?>><?php echo $place->address; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php echo $task->name; ?>">
  </div>
  <div class="form-group">
    <label>Info</label>
    <input type="textarea" class="form-control" name="info" id="name" value="<?php echo $task->info; ?>">
  </div>
  <?php if(isset($task->id)) { ?>
  <div class="form-group">
    <label><input type="checkbox" class="form-control" name="active" id="active" value="<?php echo $task->active; ?>" <?php if($task->active == 1){ echo "checked"; } ?>>Active</label>
  </div>
  <?php } ?>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>

</form>
