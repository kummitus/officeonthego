<table class="table table-striped table-bordered">
  <tbody>
  <tr>
    <td><h3 class="trn">Title</h3></td><td><h3><?php echo $task->name; ?></h3></td>
  </tr>
  <tr>
    <td><p class="trn">Location</td><td><?php echo $task->p_id; ?> </p></td>
  </tr>
  <tr>
    <td><p class="trn">Group</td><td><?php echo $task->g_id; ?></p></td>
  </tr>
  <td><p class="trn">Information</td><td><?php echo $task->info; ?></p></td>
  </tr>
  <tr>
    <td><p class="trn">Time spent</td><td><?php echo $time; ?> hours</p></td>
  </tr>
</tbody>
</table>
<br>
<?php if($_SESSION['adminlevel'] == 1){ ?>
  <a href="?controller=tasks&action=delete&id=<?php echo $task->id ?>"><div class="btn btn-warning trn">Delete</div></a>
  <a href="?controller=tasks&action=form&id=<?php echo $task->id ?>"><div class="btn btn-default trn">Update</div></a>
<?php } ?>
<a href="?controller=tasks&action=addpic&id=<?php echo $task->id ?>"><div class="btn btn-default trn">Add image</div></a>
<a href="?controller=tasks&action=index"><div class="btn btn-default trn">Back</div></a>

<br>
<table class="table" style="max-width: 100%">
  <tbody>
    <?php foreach($images as $image) { ?>
      <tr>
        <td>
          <a href="utils/showPicture.php?path=<?php echo $image->image_path ?>">
            <img src="utils/showPicture.php?path=<?php echo $image->image_path ?>"/>
          </a></td>
        <td>
          <p width="100px"><?php echo $image->comment; ?></p>
          <br>
          <?php if(hasAdminRights($_SESSION)) { ?>
            <a href="?controller=tasks&action=removepic&picid=<?php echo $image->id; ?>&id=<?php echo $_GET['id']; ?>"><div class="btn btn-default trn">Remove image</div></a>
          <?php } ?>
        <td>
      </tr>
    <?php } ?>
  </body>
</table>
<table class="table" style="max-width: 100%">
  <thead>
    <tr><td>Info</td><td>Sum</td><td>Company</td><td>Date</td><tr>
  <tbody>
    <?php foreach($bills as $bill) { ?>
      <tr>
        <td>
          <?php echo $bill->info; ?>
        </td>
        <td>
          <p><?php echo $bill->sum; ?> €</p>
        </td>
        <td>
          <?php echo $bill->company; ?>
        </td>
        <td>
          <?php echo $bill->dateofpurchase; ?>
        </td>
      </tr>
    <?php } ?>
  </body>
</table>
