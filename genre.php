<!doctype html>

  <?php include 'includes/Head.php';
  
  if (!isset($_GET["id"])) {

    echo "404 Genre not found";

} else {

  $genreIDpre = $_GET["id"];
  $genreID = $genreIDpre - 1;

}?>



<div class="row">

      

<div class = "col-3 bg-dark">



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


foreach ($genre as $film) { ?> 

    <div class  = "container border-bottom border-white pt-4 pb-4">

    <div class = "row">

    <a class ="link" href="filmPage.php? id=<?php echo $film->id;?>">

    <div class  = "col-2">

        <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $film->id?>_small.jpg"  height="200" alt="Poster">

    </div>

    <div class = "col-10">

    <h4 class = "marker"> <?php echo $film->name; ?> </h4>
    <p> <?php echo mb_strimwidth($film->description, 0, 400, "...."); ?> </p>

    </a>

    </div>

    </div>

    </div>

<?php } ?>

<div>


