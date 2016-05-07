<form method="post" action="?controller=owners&action=create">
  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" value="<?php if(isset($owner->id)){echo $owner->id;} ?>">
  </div>
  <div class="form-group">
    <label class="trn">Name</label>
    <input type="text" class="form-control" name="name" value="<?php if(isset($owner->name)){echo $owner->name;} ?>">
  </div>
  <div class="form-group">
    <label class="trn">Phone</label>
    <input type="text" class="form-control" name="phone" value="<?php if(isset($owner->phone)){echo $owner->phone;} ?>">
  </div>
  <div class="form-group">
    <label class="trn">Email</label>
    <input type="text" class="form-control" name="email" value="<?php if(isset($owner->email)){echo $owner->email;} ?>">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary trn">Add</button>
  </div>
</form>
