<?
/**
 * Prepared.php
 * 
 * Where all of the global SQL queries are defined and prepared
 * 
 * @category php file
 * @author Matthew Hutchings
 */
?>

<?php

/*
 * $names
 * 
 * gets all information about the 5 most recent films in the database sorted by thier theatrical release
 * 
 */

$names = $db->prepare('

SELECT *
FROM film
LIMIT 5;
ORDER BY theatricalRelease Desc;

');

/*
 * $reviewNumber 
 * 
 * selects all IDs from the review table, used to count the number of reviews on the website
 * 
 */

$reviewNumber = $db->prepare('

SELECT id
FROM review;

');

/*
 * $number 
 * 
 * selects all IDs from the film table, used to count the number of film on the website
 * 
 */

$number = $db->prepare('

SELECT id
FROM film;

');

/*
 * $random 
 * 
 * gets all information about a random film within the film table
 * 
 */

$random = $db->prepare('

SELECT *
FROM film
ORDER BY RAND();
LIMIT 1;

');

/*
 * $filmInfo 
 * 
 * gets all information about every film within the film database
 * 
 */

$filmInfo = $db->prepare('

SELECT *
FROM film

');

/*
 * $genrenames 
 * 
 * creates a new table view with a genre name and genre id from the genre and film tables
 * 
 */

$genreNames =$db->prepare('

SELECT DISTINCT genre.name, genre.id
FROM genre
INNER JOIN film
ON genre.id = film.genre_id;

');

