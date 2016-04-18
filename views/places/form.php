<form method="post" action="?controller=places&action=create">

  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" value="<?php if($place) {
      echo $place->id;
    }else{
      echo "-1";
    } ?>">
  </div>
  <div class="form-group">
    <label class="trn">Manager</label>
    <select name="o_id" class="form-control">
      <?php foreach($owners as $owner) { ?>
        <option value="<?php echo $owner->id; ?>" <?php if($owner->id == $place->o_id) { echo "selected='selected'"; } ?>><?php echo $owner->name; ?> </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label class="trn">Address</label>
    <input type="text" class="form-control" name="address" value="<?php echo $place->address; ?>">
  </div>
  <div class="form-group">
    <label class="trn">City</label>
    <input type="text" class="form-control" name="city" value="<?php echo $place->city; ?>">
  </div>
  <div class="form-group">
    <label class="trn">Maintenance</label>
    <input type="text" class="form-control" name="maintenance" value="<?php echo $place->maintenance; ?>">
  </div>
  <div class="form-group">
    <label class="trn">Billing code</label>
    <input type="text" class="form-control" name="billingcode" value="<?php echo $place->billingcode; ?>">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary trn">Add</button>
  </div>
</form>
