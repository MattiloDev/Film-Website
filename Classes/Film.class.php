<?
/**
 * Film.class.php
 * 
 * Class used to define and call functions on film objects
 * 
 */
?>


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
	public $imdb_id;
	public $metascore;
	
		/**
		* printActors()
        * 
		* prints the top five actors and thier roles from the selected film
		
        * @category function
        * @author Matthew Hutchings 
		*
		* @param film, int, id of the selected film 
		*/

 	function printActors($film) {

		include ('includes/database.php');

		$actors  = $db->prepare("  
	
			SELECT role.character, actor.name
			FROM role
			INNER JOIN actor
			ON role.actor_id = actor.id
			WHERE film_id = ?

		");

		$actors->execute([$film]);

		while ($actorsOBJ = $actors->fetchObject()) {
	
			echo $actorsOBJ->name;
			echo " as ";
			echo $actorsOBJ->character;
			echo "<br>";

		}

		return $actorsOBJ;

	}
	  		
	 	/**
		* setMetascore()
        * 
        * Sets the metascore of a film
        * @category function
        * @author Matthew Hutchings 
		* 
		*/
		
 	function setMetascore() {

		$stream;

	 	$stream = json_decode(file_get_contents('http://www.omdbapi.com/?apikey=de376b8f&i='.$this->imdb_id.''));

	 	$this->metascore = $stream->Metascore;

		echo $this->metascore;

 	}

}