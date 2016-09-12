<?php
  class Song {


    public $SongID;
    public $Title;
	public $Duration;
    public $AlbumID;

    public function __construct($SongID, $Title, $Duration, $AlbumID) {
      $this->SongID  = $SongID;
      $this->Title  = $Title;
	  $this->Duration =$Duration;
      $this->AlbumID = $AlbumID;
    }

    public static function all() {
      $listSongs = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM Songs Order By Title ASC');

      foreach($req->fetchAll() as $song) {
        $listSongs[] = new Song($song['SongID'], $song['Title'], $song['Duration'], $song['AlbumID']);
      }

      return $listSongs;
    }

    public static function Add($Title, $Duration, $AlbumID) {
      $db = Db::getInstance();
      
      $req = $db->prepare('INSERT INTO Songs (Title, Duration, AlbumID) VALUES (:Title,:Duration,:AlbumID)');
	  //SQL Example: INSERT INTO Songs (Title, Duration, AlbumID) VALUES ("On The Sea","01:22", 3)
	  
      $req->execute(array('Title' => $Title,'Duration' => $Duration,'AlbumID' => $AlbumID));
    }
	
	public static function Update($SongID, $Title, $Duration, $AlbumID) {
        $db = Db::getInstance();

        $req = $db->prepare("UPDATE Songs SET Title = :Title, Duration = :Duration, AlbumID = :AlbumID WHERE SongID = :SongID");
		//SQL Example: UPDATE Songs SET Title = "One The Two Seas", Duration = "01:23", AlbumID = 3 WHERE SongID = 4
		
        $req->execute(array('SongID'=>$SongID,'Title' => $Title, 'Duration' => $Duration, 'AlbumID' => $AlbumID));
    }
	
	  public static function Get($SongID) {
        $db = Db::getInstance();

        $req = $db->prepare('SELECT * FROM Songs WHERE SongID = :SongID');
		//SQL Example: SELECT * FROM Songs WHERE SongID = 4'
        $req->execute(array('SongID' => $SongID));
        $result = $req->fetch(PDO::FETCH_OBJ);

        return new Song($result->SongID, $result->Title, $result->Duration, $result->AlbumID);
    }
    
    public static function Delete($SongID) {
      $db = Db::getInstance();
      
      $req = $db->prepare('Delete FROM Songs WHERE SongID = :SongID');
		//SQL Example: DELETE FROM Songs WHERE SongID = 4'
		
      $req->execute(array('SongID' => $SongID));

    }

    
  }
?>