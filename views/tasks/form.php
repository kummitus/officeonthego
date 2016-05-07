<form method="post" action="?controller=tasks&action=create">

  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" id="id" value="<?php if(isset($task->id)){echo $task->id;} ?>">
  </div>
  <div class="form-group">
    <label for="g_id" class="trn">Group</label>
    <select name="g_id" id="g_id" class="form-control">
      <?php foreach($groups as $group) { ?>
        <option value="<?php if(isset($group->id)){echo $group->id;} ?>" <?php if(isset($task->g_id)){if($group->id == $task->g_id) { echo "selected='selected'"; }} ?>><?php if(isset($group->name)){echo $group->name;} ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="p_id" class="trn">Place</label>
    <select name="p_id" id="p_id" class="form-control">
      <?php foreach($places as $place) { ?>
        <option value="<?php if(isset($place->id)){echo $place->id;} ?>" <?php if(isset($task->p_id)){if($place->id == $task->p_id) { echo "selected='selected'"; }} ?>><?php if(isset($place->address)){echo $place->address;} ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name" class="trn">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($task->name)){echo $task->name;} ?>">
  </div>
  <div class="form-group">
    <label for="info" class="trn">Info</label>
    <input type="textarea" class="form-control" name="info" id="name" value="<?php if(isset($task->info)){echo $task->info;} ?>">
  </div>
  <?php if(isset($task->id)) { ?>
  <div class="form-group">
    <label for="name" class="trn"><input type="checkbox" class="form-control" name="active" id="active" value="<?php if(isset($task->active)){echo $task->active;} ?>" <?php if(isset($task->active)){ if($task->active == 1){ echo 'checked'; }} ?> >Active</label>
  </div>
  <?php } ?>
  <div class="form-group">
    <button type="submit" class="btn btn-primary trn">Add</button>
  </div>

</form>
