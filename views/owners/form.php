<form method="post" action="?controller=owners&action=create">
  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" value="<?php echo $owner->id; ?>">
  </div>
  <div class="form-group">
    <label class="trn">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $owner->name; ?>">
  </div>
  <div class="form-group">
    <label class="trn">Phone</label>
    <input type="text" class="form-control" name="phone" value="<?php echo $owner->phone; ?>">
  </div>
  <div class="form-group">
    <label class="trn">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $owner->email; ?>">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary trn">Add</button>
  </div>
</form>
