<h1> Create/edit user</h1>
<form method="post" action="?controller=users&action=create">
  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" value="<?php if(isset($user)){ echo $user->id;} ?>">
  </div>
  <div class="form-group">
    <label class="trn">Name</label>
    <input type="text" class="form-control" name="name" value="<?php if(isset($user)){echo $user->name;} ?>">
  </div>
  <div class="form-group">
    <label class="trn">Password</label>
    <input type="password" class="form-control" name="password" value="">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary trn">Add</button>
  </div>
</form>
