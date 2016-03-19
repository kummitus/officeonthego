<form method="post" action="?controller=owners&action=create">
  <div class="input-group">
    <input type="number" class="form-control hidden" name="id" value="<?php echo $owner->id; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Name</span>
    <input type="text" class="form-control" name="name" value="<?php echo $owner->name; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Phone</span>
    <input type="text" class="form-control" name="phone" value="<?php echo $owner->phone; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Email</span>
    <input type="text" class="form-control" name="email" value="<?php echo $owner->email; ?>">
  </div>
  <div class="input-group">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
</form>
