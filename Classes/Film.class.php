/**
* Class Film
*/

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

    /**
     * printActors
     *
     * Prints the top 5 cast members from the selected film along with thier roles.
     *
     * @param $input
     * @return mixed
     */
    function printActors($input) {

	include ('includes/database.php');

	$actors  = $db->prepare("  
	
		SELECT role.character, actor.name
		FROM role
		INNER JOIN actor
		ON role.actor_id = actor.id
		WHERE film_id = ?

	");

	$actors->execute([$input]);

	while ($actorsOBJ = $actors->fetchObject()) {
	
		echo $actorsOBJ->name;
		echo " as ";
		echo $actorsOBJ->character;
		echo "<br>";

	}

	return $actorsOBJ;

}

}