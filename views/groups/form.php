<form method="post" action="?controller=groups&action=create">

  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" value="<?php if(isset($group->id)) {
      echo $group->id;
    }else{
      echo "-1";
    } ?>">
  </div>
  <div class="form-group">
    <label class="trn">Admin</label>
    <select name="a_id" class="form-control">
      <?php foreach($users as $user) { ?>
        <option value="<?php echo $user->id; ?>" <?php if(isset($group->a_id)){ if($user->id == $group->a_id) { echo "selected='selected'"; } } ?>><?php echo $user->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label class="trn">Name</label>
    <input type="text" class="form-control" name="name" value="<?php if(isset($group->name)){echo $group->name;} ?>">
  </div>
  <div class="form-group">
    <label class="trn">Info</label>
    <input type="text" class="form-control" name="info" value="<?php if(isset($group->info)){echo $group->info;} ?>">
  </div>
  <?php if(isset($group->id)) { ?>
    <div class="form-group">
      <label class="trn">Active</label>
      <input type="checkbox" class="form-control" name="active" value="<?php echo $group->active; ?>" <?php if($group->active) { echo "checked"; }?>>
    </div>
  <?php } ?>
  <div class="form-group">
    <button type="submit" class="btn btn-primary trn">Submit</button>
  </div>
</form>
