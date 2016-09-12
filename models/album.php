<?php
  class Album {


    public $AlbumID;
    public $Title;
    public $ArtistID;

    public function __construct($AlbumID, $Title, $ArtistID) {
      $this->AlbumID  = $AlbumID;
      $this->Title  = $Title;
      $this->ArtistID = $ArtistID;
    }

    public static function all() {
      $listAlbums = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM Albums Order By Title ASC');

      foreach($req->fetchAll() as $album) {
        $listAlbums[] = new Album($album['AlbumID'], $album['Title'], $album['ArtistID']);
      }

      return $listAlbums;
    }

    public static function Add($Title, $ArtistID) {
      $db = Db::getInstance();
	  $Title = $_POST['Title'];
	  $ArtistID = $_POST['ArtistID'];
      
      $req = $db->prepare('INSERT INTO Albums (Title,ArtistID) VALUES (:Title,:ArtistID)');
	  //SQL Example: SELECT * FROM Artists WHERE ArtistID = 5 INSERT INTO Albums (Title,ArtistID) VALUES ("Here we go",2)
	  
      $req->execute(array('Title' => $Title,'ArtistID' => $ArtistID));
    }
    
	public static function Update($AlbumID, $Title, $ArtistID) {
        $db = Db::getInstance();

        $req = $db->prepare("UPDATE Albums SET Title = :Title, ArtistID = :ArtistID WHERE AlbumID = :AlbumID");
		//SQL Example: SELECT * FROM Artists WHERE ArtistID = 5 UPDATE Albums SET Title = "Thriller", ArtistID = "MJ" WHERE AlbumID = 5")

        $req->execute(array('AlbumID' => $AlbumID,'Title' => $Title, 'ArtistID' => $ArtistID));
    }
	
	public static function Get($AlbumID) {
        $db = Db::getInstance();

        $req = $db->prepare('SELECT * FROM Albums WHERE AlbumID = :AlbumID');
		//SQL Example: SELECT * FROM Artists WHERE ArtistID = 5 SELECT * From Albums WHERE AlbumID = 5

        $req->execute(array('AlbumID' => $AlbumID));
        $result = $req->fetch(PDO::FETCH_OBJ);

        return new Album($result->AlbumID, $result->Title, $result->ArtistID);
    }
	
    public static function Delete($AlbumID) {
      $db = Db::getInstance();
	  $AlbumID = $_GET['AlbumID'];
      
      $req = $db->prepare('Delete FROM Albums WHERE AlbumID = :AlbumID');
	  //SQL Example: SELECT * FROM Artists WHERE ArtistID = 5 DELETE FROM Albums WHERE AlbumID = 5

      $req->execute(array('AlbumID' => $AlbumID));
    }

    
  }
?>