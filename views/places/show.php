<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Address</th><th class="trn">City</th><th class="trn">Maintenance</th><th class="trn">Billing code</th><th class="trn">Manager</th></tr>
  </thead>
  <tbody>
      <tr>
        <td>
          <?php echo $place->address; ?>
        </td>
        <td>
          <?php echo $place->city; ?>
        </td>
        <td>
          <?php echo $place->maintenance; ?>
        </td>
        <td>
          <?php echo $place->billingcode; ?>
        </td>
        <td>
          <?php echo $place->oname; ?>
        </td>
      </tr>
  </tbody>
</table>
</div>

<iframe width="100%" height="30%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?q=<?php echo $place->address; echo "+"; echo $place->city?>&key=AIzaSyCT-zxuhHuLz74_NHeXSitfrC7gTvkrHHw" allowFullScreen></iframe>
<br>
<br>
<?php if($_SESSION['adminlevel'] == 1){ ?>
<a href="/?controller=places&action=delete&id=<?php echo $place->id ?>"><div class="btn btn-warning trn">Delete</div></a>
<a href="/?controller=places&action=form&id=<?php echo $place->id ?>"><div class="btn btn-default trn">Update</div></a>
<?php } ?>
