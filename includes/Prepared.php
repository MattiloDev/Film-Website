<?php

$names = $db->prepare('

SELECT *
FROM film
LIMIT 5;
ORDER BY theatricalRelease Desc;

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

