<?php

$names = $db->prepare('

SELECT *
FROM film
LIMIT 5;
ORDER BY theatricalRelease Desc;

');

$reviewNumber = $db->prepare('

SELECT id
FROM review;

');

$number = $db->prepare('

SELECT id
FROM film;

');

$random = $db->prepare('

SELECT *
FROM film
ORDER BY RAND();
LIMIT 1;


');

$filmInfo = $db->prepare('

SELECT *
FROM film

');

$genreNames =$db->prepare('

SELECT DISTINCT genre.name, genre.id
FROM genre
INNER JOIN film
ON genre.id = film.genre_id;

');

