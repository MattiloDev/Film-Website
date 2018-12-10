<!doctype html>


<?php include 'includes/Head.php';
require ('Classes/Film.class.php');

	$names->execute();
    
                
?>

<div class= "container-fluid ">

<div class= "row border-bottom border-white">

    <div class = "col-md-8  p-4 pt-3 pb-5 carosel">

        <h1 class = "text-center pb-3 marker text-white"> Latest Releases </h1>

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            
                <?php while ($filmOBJ = $names->fetchObject('Film')) { ?>

                <?php if ($filmOBJ->id == 1) { 
                  echo   '<div class="carousel-item active">';
                }  else {
                   echo  '<div class="carousel-item">';
                } ?>

                <a class ="link" href="filmPage.php? id=<?php echo $filmOBJ->id;?>">

                    <div class = "container">

                         <div class = "row ">

                            <div class = "col-md-4">

                                <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $filmOBJ->id?>_massive.jpg"  height="350" alt="First slide">

                            </div>

                            <div class = "col-md-8">

                                <H1 > <?php echo $filmOBJ->name; ?> </H1>
                                <p class = "text-white"><?php echo $filmOBJ->description; ?>   </p>

                            </div>

                        </div>

                    </div>

                    </a>

                </div>

        <?php } ?>

    </div>

    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

    </div>

</div>

<?php $names->closeCursor() ?>


    <div class = "col-md-4 text-center bg-dark">

        <?php

            $random->execute();
            $randomFilm = $random->fetchAll();
            $random->closeCursor();
             
        ?>
     
        <h1 class ="p-3 text-danger marker"> Film of the Day</h1>

        <a class ="link" href="filmPage.php? id=<?php echo $randomFilm[0]->id;?>">

            <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $randomFilm[0]->id;?>_massive.jpg" height = "350" alt = "Film of the day" >

            <h2 class = "p-3  text-danger"> <?php echo $randomFilm[0] -> name; ?> </h2>

        </div>

         </a>

    </div>

    <div class = "row pb-4">

        <div class = "col-md-4 text-center bg-dark">

            <h1 class ="p-3 text-danger marker"> Movies Tracked </h1>

            <?php

                $number->execute();
                $numberOfFilms = $number->fetchAll();
                   
                $reviewNumber->execute();
                $reviewNum = $reviewNumber->fetchAll();

            ?>
                
            <p class = "text-danger"> Movies on Database: <?php  echo COUNT($numberOfFilms); ?> </p>

            <p class = "text-danger"> Reviews on Database: <?php echo COUNT($reviewNum); ?>  </p>

        </div>

        <div class = "col-md-8 text-center   carosel">

            <h1 class ="p-3 text-white marker"> What is Film Finder? </h1>

            <p class = "text-white"> Film Finder is a Online Database that stores information on the lastest films</p>

            <p class = "text-white"> Every Day there is a new Film of the day </p>

            <p class = "text-white"> Users can leave reviews on films and view the reviews of other users </p>

        </div>
        </div>

    </div>

    <?php include 'includes/footer.php'; ?>


    </div>

</div>


</body>


</html>
