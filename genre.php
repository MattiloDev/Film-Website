<?
/**
 * genre.php
 * 
 * Responsible for rendering links to films of the selected genre 
 * 
 * @category php file
 * @author Matthew Hutchings
 * 
 */
?>

<!doctype html>

<?
/**
 * if statement to check what id has been passed into genre.php
 * 
 * @param id, int, id passed into the url to detirmine which genre has been selected
 * 
 * @var $genreIDpre, int, id taken from page url
 * @var $genreID, int, id after it has been processed
 */
?>

<?php include 'includes/Head.php';
  
  if (!isset($_GET["id"])) { //checks if the id field is set

    echo "404 Genre not found"; 

} else {

  $genreIDpre = $_GET["id"];
  $genreID = $genreIDpre - 1; //minus 1 is used because of conversion from id column starting at 1 and array pointer starting at 0

}

$genreNames->execute();
$names = $genreNames->fetchAll();

?>





<div class="row">

<div class = "col-3 text-center bg-dark">

<h1 class = "marker pt-4 pb-3 text-white"> Genres: </h1> 

<?
/**
 * foreach to print side menu of the different genres availible in the database
 * 
 */
?>

<?php foreach ($names as $genre) { ?>

<a class = "nostyle text-lg pb-2 text-white marker" href="genre.php? id=<?php echo $genre->id; ?>"> <?php echo $genre->name; ?> </a>
<br>

<?php  } ?>

</div>

<div class = "col-9 carosel p-4">

<?php

$GenreInfo = $db->prepare('

SELECT *
FROM film
WHERE genre_id = '.$genreIDpre.';

');

$GenreInfo->execute();
$genre = $GenreInfo->fetchAll();

/** 
 * foreach to print links to the films that belong to the selected genre
 * 
 * @param $names 
 */

foreach ($genre as $film) { ?> 

    <div class  = "container border-bottom border-white pt-4 pb-4">

    <div class = "row">

    <a class ="link" href="filmPage.php? id=<?php echo $film->id;?>">

    <div class  = "col-2">

        <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $film->id?>_small.jpg"  height="200" alt="Poster">

    </div>

    <div class = "col-10">

    <h4 class = "marker"> <?php echo $film->name; ?> </h4>
    <p> <?php echo mb_strimwidth($film->description, 0, 400, "...."); //trims the length of the description to 400 characters for easier display ?> </p>

    </a>

    </div>

    </div>

    </div>

<?php } ?>

</div>

  <?php include 'includes/footer.php'; ?>


