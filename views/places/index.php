<h1 class="trn">All Places</h1>
<?php if(hasAdminRights($_SESSION)){?>
<a href="?controller=places&action=form"><div class="btn btn-default trn">Create Place</div></a>
<?php } ?>
<div id="places">

  <input class="search trn" placeholder="Search" />

  <h3></h3>
  <div class="table-responsive">
  <table class="table table-striped table-bordered">
    <tbody class="list">
    <?php foreach($cities as $city) { ?>

      <tr><th class="trn"><?php echo $city; ?></th><th class="trn">Billing code</th><th class="trn">Maintenance</th><th class="trn">Manager</th><th></th></tr>



      <?php foreach($places as $place) { ?>
      <?php if($place->city == $city) { ?>
        <tr>
          <td class="address">
            <a href="bingmaps:?where=<?php echo $place->address; ?>"><?php echo $place->address; ?></a>
          </td>
          <td class="billingcode">
            <?php echo $place->billingcode; ?>
          </td>
          <td class="maintenance">
            <?php echo $place->maintenance; ?>
          </td>
          <td class="owner">
            <?php echo $place->oname; ?>
          </td>
          <td class="show">
            <a href='?controller=places&action=show&id=<?php echo $place->id; ?>' class="trn">See Place</a>
          </td>
        </tr>
      <?php } } ?>
        <?php } ?>

        </tbody>
  </table>
  </div>
</div>
<br>
<script src="assets/js/list.js"></script>
<script>
  var options = {
    valueNames: ['address', 'city', 'billingcode', 'maintenance', 'owner', 'show']
  };

  var placeList = new List('places', options);
</script>
