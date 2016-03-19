<form method="post" action="?controller=groups&action=create">

  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" value="<?php if($group) {
      echo $group->id;
    }else{
      echo "-1";
    } ?>">
  </div>
  <div class="form-group">
    <label>Admin</label>
    <select name="a_id" class="form-control">
      <?php foreach($users as $user) { ?>
        <option value="<?php echo $user->id; ?>" <?php if($user->id == $group->a_id) { echo "selected='selected'"; } ?>><?php echo $user->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $group->name; ?>">
  </div>
  <div class="form-group">
    <label>Info</label>
    <input type="text" class="form-control" name="info" value="<?php echo $group->info; ?>">
  </div>
  <?php if(isset($group->id)) { ?>
    <div class="form-group">
      <label>Active</label>
      <input type="checkbox" class="form-control" name="active" value="<?php echo $group->active; ?>" <?php if($group->active) { echo "checked"; }?>>
    </div>
  <?php } ?>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>