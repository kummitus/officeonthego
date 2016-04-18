<form method="post" action="?controller=memberships&action=create">
  <div class="form-group hidden">
    <input class="form-control hidden" type="int" name="g_id" value="<?php echo $group->id; ?>">
  </div>

  <div class="form-group">
    <label class="trn">User</label>
    <select name="u_id" class="form-control">
      <?php foreach($users as $user) { ?>
        <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary trn">Submit</button>
  </div>
</form>
