<form method="post" action="?controller=bills&action=create" enctype="multipart/form-data">
  <div class="form-group">
    <input type="number" class="form-control hidden" name="id" value="<?php echo $bill->id; ?>">
  </div>
  <div class="form-group hidden">
    <input type="number" class="form-control" name="u_id" value="<?php echo $_SESSION['user']; ?>">
  </div>
  <div class="form-group">
    <label class="trn">Company</label>
    <input type="text" class="form-control" list="companyname" name="company" value="<?php echo $bill->company; ?>">
    <datalist id="companyname">
      <?php foreach($companies as $company){ ?>
        <option value="<?php echo $company; ?>">
      <?php } ?>
    </datalist>
  </div>
  <div class="form-group">
    <label class="trn">Sum</label>
    <input type="number" step=0.01 class="form-control" name="sum" value="<?php echo $bill->sum; ?>">
  </div>
  <div class="form-group">
    <label class="trn">Info</label>
    <input type="text" class="form-control" name="info" value="<?php echo $bill->info; ?>">
  </div>
  <div class="form-group">
    <label class="trn">Date</label>
    <input type="text" id="datepicker" class="form-control" name="date" value="<?php echo date('m/d/y'); ?>">
  <div class="form-group">
    <label class="trn">Choose image</label>
    <input type="file" name="image" id="image">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary trn">Add</button>
  </div>
</form>

<script>
$(function() {
  $( "#datepicker" ).datepicker({
    firstDay: 1
  });
  $( "#datepicker" ).attr( 'readOnly' , 'true' );
});
</script>
