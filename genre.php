<!doctype html>

  <?php include 'includes/Head.php'; ?>



<div class="row">

      

<div class = "col-3 bg-dark">



</div>

<div class = "col-9 carosel p-4">

<?php

$filmInfo->execute();
$genre = $filmInfo->fetchAll();
// var_dump($genre);

foreach ($genre as $film) { ?> 

    <div class  = "container border-bottom border-white pt-4 pb-4">

    <div class = "row">

    <div class  = "col-2">

        <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $film->id?>_small.jpg"  height="200" alt="First slide">

    </div>

    <div class = "col-10">

    <h4 class = "marker"> <?php echo $film->name; ?> </h4>
    <p> <?php echo mb_strimwidth($film->description, 0, 400, "...."); ?> </p>


    </div>

    </div>

    </div>

<?php } ?>

<div>


