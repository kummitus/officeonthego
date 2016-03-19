<form method="post" action="?controller=users&action=create">
  <div class="input-group">
    <input type="number" class="form-control hidden" name="id" value="<?php echo $user->id; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Name</span>
    <input type="text" class="form-control" name="name" value="<?php echo $user->name; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Password</span>
    <input type="password" class="form-control" name="password" value="<?php echo $user->password; ?>">
  </div>
  <div class="input-group">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
</form>
