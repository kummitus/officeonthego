<form method="post" action="?controller=bills&action=create" enctype="multipart/form-data">
  <div class="input-group">
    <input type="number" class="form-control hidden" name="id" value="<?php echo $bill->id; ?>">
  </div>
  <div class="form-group">
    <label>Name</label>
    <select name="a_id" class="form-control">
      <?php foreach($users as $user) { ?>
        <option value="<?php echo $user->id; ?>" <?php if($user->id == $bill->u_id) { echo "selected='selected'"; } ?>><?php echo $user->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="input-group">
    <span class="input-group-addon">Company</span>
    <input type="text" class="form-control" name="company" value="<?php echo $bill->company; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Sum</span>
    <input type="text" class="form-control" name="sum" value="<?php echo $bill->sum; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Info</span>
    <input type="text" class="form-control" name="info" value="<?php echo $bill->info; ?>">
  </div>
  <div class="input-group">
    <label>Choose image</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
  <div class="input-group">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
</form>
