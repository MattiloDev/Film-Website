
<?php


Class Film {

public $id;

	public $genre_id;
	public $name;	
	public $description;
	public $runtime;
	public $director;
	public $classification;
	public $theatricalRelease;
    public $dvdRelease;
    
    public function getActors() {

      include("includes/database.php");

      $actors = $db->prepare("
    
       SELECT *
       FROM role
       WHERE film_id = ?

    ");

    $actors->execute([$this->id]);

    return $actors;

    }

}