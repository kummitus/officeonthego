<p> All users </p>
<table class="table table-striped table-bordered">
  <thead>
    <tr><th>Username</th><th>Admin</th><th>show</th></tr>
  </thead>
  <tbody>
<?php foreach($users as $user) { ?>
  <p>
    <tr><td><?php echo $user->name; ?></td>
      <td><?php if($user->adminlevel == 1){
        echo "yes";
      }else{
        echo "no";
      }?></td>
    <td><a href='/?controller=users&action=show&id=<?php echo $user->id; ?>'>See user</a></td>
  </p>
<?php }  ?>
  </tbody>
</table>
<br>
<a href="/?controller=users&action=form"><div class="btn btn-default">Create user</div></a>
