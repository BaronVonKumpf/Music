<?php
  class HomeController {
    
	public function home() {

      	$db = Db::getInstance();
     	$req = $db->query('Select S.Title STitle, Art.Name, Alb.Title ATitle, S.Duration
				From Songs S
				Left Join Albums Alb ON S.AlbumID = Alb.AlbumID
				Left JOIN Artists Art on Art.ArtistID = Alb.ArtistID
				Order By STitle, Art.Name, ATitle, Duration');

	  	$DetailSongList =  $req->fetchAll();
	 
      require_once('views/home/home.php');
    }
  }
?>