<p> All Places </p>

<?php foreach($cities as $city) { ?>
  <h3><?php echo $city; ?></h3>
  <div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead>
      <tr><th>Address</th><th>City</th><th>Maintenance</th><th>Billing code</th><th>Manager</th><th></th></tr>
    </thead>
    <tbody>
      <?php foreach($places as $place) { ?>
      <?php if($place->city == $city) { ?>
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
          <td>
            <a href='/?controller=places&action=show&id=<?php echo $place->id; ?>'>See Place</a>
          </td>
        </tr>
      <?php } } ?>
    </tbody>
  </table>
  </div>
<?php } ?>
<br>
<a href="/?controller=places&action=form"><div class="btn btn-default">Create Place</div></a>
