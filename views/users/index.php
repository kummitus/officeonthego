<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr><th class="trn">Username</th><th class="trn">Admin</th><th class="trn">show</th></tr>
  </thead>
  <tbody>
<?php foreach($users as $user) { ?>
  <p>
    <tr><td><?php echo $user->name; ?></td>
      <td><span class="trn"><?php if($user->adminlevel == 1){
        echo "yes";
      }else{
        echo "no";
      }?></span></td>
    <td><a href='/?controller=users&action=show&id=<?php echo $user->id; ?>' class="trn">See user</a></td>
  </p>
<?php }  ?>
  </tbody>
</table>
</div>
<br>
<a href="/?controller=users&action=form"><div class="btn btn-default trn">Create user</div></a>
