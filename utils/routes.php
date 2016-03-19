<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'users';
        require_once('models/user.php');
        $controller = new UsersController();
      break;
      case 'tasks':
        require_once('models/task.php');
        require_once('models/group.php');
        require_once('models/place.php');
        $controller = new TasksController();
      break;
      case 'times':
        require_once('models/time.php');
        $controller = new TimesController();
      break;
      case 'places':
        require_once('models/place.php');
        require_once('models/owner.php');
        $controller = new PlacesController();
      break;
      case 'groups':
        require_once('models/membership.php');
        require_once('models/user.php');
        require_once('models/group.php');
        $controller = new GroupsController();
      break;
      case 'memberships':
        require_once('models/membership.php');
        $controller = new MembershipsController();
      break;
      case 'owners':
        require_once('models/owner.php');
        $controller = new OwnersController();
      break;
      case 'bills':
        require_once('models/user.php');
        require_once('models/bill.php');
        $controller = new BillsController();
      break;
    }
    $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error'],
                       'users' => ['index', 'show', 'delete', 'create', 'login', 'form', 'login', 'handle_login', 'logout'],
                       'places' => ['index', 'show', 'delete', 'create', 'form', 'update'],
                       'times' => ['index', 'show'],
                       'tasks' => ['index', 'show', 'form', 'create', 'update', 'delete', 'toggleactivity'],
                       'groups' => ['index', 'show', 'form', 'create', 'delete', 'join'],
                       'memberships' => ['create', 'leave'],
                       'owners' => ['index', 'create', 'show', 'form', 'update', 'delete'],
                       'bills' => ['index', 'create', 'show', 'form', 'update', 'delete']
                     );

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
