<?php
  class SongController {
    
	public function home() {
       
    
	  $Albums = Album::all();
      $Songs = Song::all();
      require_once('views/song/home.php');
    }
    
     public function add() {
      	$Title = $_POST['Title'];
		$Duration = $_POST['Duration'];
		$AlbumID = $_POST['AlbumID'];
      	Song::Add($Title, $Duration, $AlbumID);
		$Albums = Album::all();
      	$Songs = Song::all();
      	redirect('./index.php?controller=song&action=home');
    }
    
     public function edit() {
  

		If (isset($_POST['Save']) && $_POST['Save']==TRUE ) {
			$SongID = $_POST['SongID'];
			$Title = $_POST['Title'];
			$Duration = $_POST['Duration'];
			$AlbumID = $_POST['AlbumID'];
			Song::Update($SongID, $Title,  $Duration, $AlbumID);
		  }else{
			$SongID = $_GET['SongID'];
		  }
	
		  $Song = Song::Get($SongID);
		  $Albums = Album::all();
		  require_once('views/song/edit.php');
    }
     
    
    public function Delete() {
      	$SongID = $_GET['SongID'];

		try {
			$SongID = Song::Delete($SongID);
		}
		catch (Exception $e) {
		
			$ErrorMessage = "There are items associated with this record. Remove them before deleting.";
			
		}
	

	  
	  redirect('./index.php?controller=song&action=home&Error=$ErrorMessage');
    }
    

    public function error() {
      require_once('views/error.php');
    }
  }