<?php

class Artist {


    public $ArtistID;
    public $Name;

    public function __construct($ArtistID, $Name) {
        $this->ArtistID = $ArtistID;
  		$this->Name = $Name;
    }

    public static function all() {
        $listArtists = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM Artists');


        foreach ($req->fetchAll() as $artist) {
            $listArtists[] = new Artist($artist['ArtistID'], $artist['Name']);
        }

        return $listArtists;
    }

    public static function Add($Name) {
        $db = Db::getInstance();

        $req = $db->prepare("INSERT INTO Artists (Name) VALUES (:Name)");
		//SQL Example: INSERT INTO Artists (Name) VALUES ("Hello Mr Jay")
		
        $req->execute(array('Name' => $Name));
    }

    public static function Update($ArtistID, $Name) {
        $db = Db::getInstance();

        $req = $db->prepare("UPDATE Artists SET Name = :Name WHERE ArtistID = :ArtistID");
		//SQL Example: UPDATE Artists SET Name = "Billy Joel" WHERE ArtistID = 5
        $req->execute(array('Name' => $Name, 'ArtistID' => $ArtistID));
    }

    public static function Get($ArtistID) {
        $db = Db::getInstance();

        $req = $db->prepare('SELECT * FROM Artists WHERE ArtistID = :ArtistID');
		//SQL Example: SELECT * FROM Artists WHERE ArtistID = 5

        $req->execute(array('ArtistID' => $ArtistID));
        $result = $req->fetch(PDO::FETCH_OBJ);

        return new Artist($result->ArtistID, $result->Name);
    }

    public static function Delete($ArtistID) {
        $db = Db::getInstance();

        $req = $db->prepare('Delete FROM Artists WHERE ArtistID = :ArtistID');
		//SQL Example: DELETE FROM Artists WHERE ArtistID = 5
		
        $req->execute(array('ArtistID' => $ArtistID));
    }

}


