<?php
  function call($controller, $action) {

    require_once('controllers/' . $controller . '_controller.php');

    
    switch($controller) {
      case 'artist':
          require_once('models/artist.php');
        $controller = new ArtistController();
          break;
      case 'album':
	  	require_once('models/album.php');
		require_once('models/artist.php');
        $controller = new AlbumController();
          break;
      case 'song':
	  	require_once('models/album.php');
        require_once('models/song.php');
        $controller = new SongController();
      	break;
	  case 'home':
        $controller = new HomeController();
		break;
    }

    $controller->{ $action }();
  }

  $controllers = array('artist' => ['home','add','edit','delete'], 
      'album' => ['home', 'add','edit','delete'], 
      'song' => ['home', 'add','edit','delete'],
	  'home' => ['home']);


  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('music', 'error');
    }
  } else {
    call('music', 'error');
  }
