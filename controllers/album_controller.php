<?php
  class AlbumController {
    public function home() {
       
     
      $Albums = Album::all();
	  $Artists = Artist::all();
      require_once('views/album/home.php');
    }
    
     public function add() {
      	$Title = $_POST['Title'];
	 	$ArtistID = $_POST['ArtistID'];
      	Album::Add($Title, $ArtistID);
      	$Album = Album::all();
		$Artists = Artist::all();
      	redirect('./index.php?controller=album&action=home');
    }
    
     public function edit() {
  

		If (isset($_POST['Save']) && $_POST['Save']==TRUE ) {
			$AlbumID = $_POST['AlbumID'];
			$Title = $_POST['Title'];
			$ArtistID = $_POST['ArtistID'];
			Album::Update($AlbumID, $Title, $ArtistID);
		  }else{
			$AlbumID = $_GET['AlbumID'];
		  }
	
		  $Album = Album::Get($AlbumID);
		  $Artists = Artist::all();
		
		  require_once('views/album/edit.php');
    }
     
    
	
	
    public function Delete() {
      $AlbumID = $_POST['AlbumID'];
	  
	  try{
		  $AlbumID = Album::Delete($AlbumID);
		    redirect('./index.php?controller=album&action=home');
	  }catch(Exception $e){
		  $ErrorMessage = "There are items associated with this record. Remove them before deleting.";
		   redirect('./index.php?controller=album&action=home&Error=' . $ErrorMessage);
	  }
    }
    

    public function error() {
      require_once('views/error.php');
    }
  }