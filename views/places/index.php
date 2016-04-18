<h1 class="trn">All Places</h1>

<?php foreach($cities as $city) { ?>
  <h3><?php echo $city; ?></h3>
  <div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead>
      <tr><th class="trn">Address</th><th class="trn">Billing code</th><th class="trn">Maintenance</th><th class="trn">Manager</th><th></th></tr>
    </thead>
    <tbody>
      <?php foreach($places as $place) { ?>
      <?php if($place->city == $city) { ?>
        <tr>
          <td>
            <a href="http://maps.google.com/?q=<?php echo $place->address; ?>"><?php echo $place->address; ?></a>
          </td>
          <td>
            <?php echo $place->billingcode; ?>
          </td>
          <td>
            <?php echo $place->maintenance; ?>
          </td>
          <td>
            <?php echo $place->oname; ?>
          </td>
          <td>
            <a href='/?controller=places&action=show&id=<?php echo $place->id; ?>' class="trn">See Place</a>
          </td>
        </tr>
      <?php } } ?>
    </tbody>
  </table>
  </div>
<?php } ?>
<br>
<?php if(hasAdminRights($_SESSION)){?>
<a href="/?controller=places&action=form"><div class="btn btn-default trn">Create Place</div></a>
<?php } ?>
