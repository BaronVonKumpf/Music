<?php
  class ArtistController {
	  
    public function home() {
 
      $Artists = Artist::all();
      require_once('views/artist/home.php');
    }
    
     public function add() {
      $Name = $_POST['Name'];

      Artist::Add($Name);
      $Artists = Artist::all();
      redirect('./index.php?controller=artist&action=home');
    }
    
     public function edit() {

  	  If (isset($_POST['Save']) && $_POST['Save']==TRUE ) {
        $ArtistID = $_POST['ArtistID'];
	  	$Name = $_POST['Name'];
        Artist::Update($ArtistID, $Name);
      }else{
        $ArtistID = $_GET['ArtistID'];
      }

      $Artist = Artist::Get($ArtistID);
    
      require_once('views/artist/edit.php');
    }
     
    
    public function Delete() {
      $ArtistID = $_GET['ArtistID'];

	try{
		   $Artist = Artist::Delete($ArtistID);
		    redirect('./index.php?controller=artist&action=home');
	}catch(Exception $e){
		$ErrorMessage = "There are items associated with this record. Remove them before deleting.";
		 redirect('./index.php?controller=artist&action=home&Error=' . $ErrorMessage);
	}
   
	  
	 
    }
    

    public function error() {
      require_once('views/error.php');
    }
  }