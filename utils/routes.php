<?php
  function call($controller, $action) {

    require_once('controllers/' . $controller . '_controller.php');
    require_once('lib/validators.php');

    switch($controller) {
      case 'pages':
        require_once('models/logger.php');
        require_once('models/group.php');
        require_once('models/membership.php');
        require_once('models/time.php');
        require_once('models/task.php');
        require_once('models/user.php');
        $controller = new PagesController();
      break;
      case 'users';
        require_once('models/logger.php');
        require_once('models/user.php');
        $controller = new UsersController();
      break;
      case 'tasks':
        require_once('models/bill.php');
        require_once('models/image.php');
        require_once('models/membership.php');
        require_once('models/time.php');
        require_once('models/task.php');
        require_once('models/group.php');
        require_once('models/place.php');
        $controller = new TasksController();
      break;
      case 'times':
        require_once('models/user.php');
        require_once('models/task.php');
        require_once('models/time.php');
        $controller = new TimesController();
      break;
      case 'places':
        require_once('models/image.php');
        require_once('models/place.php');
        require_once('models/owner.php');
        $controller = new PlacesController();
      break;
      case 'groups':
        require_once('models/task.php');
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
        require_once('models/image.php');
        require_once('models/membership.php');
        require_once('models/task.php');
        require_once('models/user.php');
        require_once('models/bill.php');
        $controller = new BillsController();
      break;
    }
    $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error', 'about'],
                       'users' => ['index', 'show', 'delete', 'create', 'login', 'form', 'login', 'handle_login', 'logout', 'toggleadmin'],
                       'places' => ['index', 'show', 'delete', 'create', 'form', 'update', 'addpic', 'insertpic', 'removepic'],
                       'times' => ['index', 'show', 'delete', 'create', 'form', 'update', 'formforhome'],
                       'tasks' => ['index', 'show', 'form', 'create', 'update', 'delete', 'toggleactivity', 'showcurrent', 'addpic', 'insertpic', 'removepic'],
                       'groups' => ['index', 'show', 'form', 'create', 'delete', 'join', 'toggleactivity'],
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
