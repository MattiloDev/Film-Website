<!doctype html>

<?
/**
*   Home.php
*
*   Page is responsible for rendering the home screen
*   
*   @author Matthew Hutchings
*   @category PHP file
*   
*
*/
?>

<?php 

    include 'includes/Head.php'; // renders the navigation bar and adds links to the bootstrap scripts
    require ('Classes/Film.class.php'); // enables use of the film class

	$names->execute(); // from prepared.php, gets the 5 most recent films by thier theatrical release
                
?>

<div class= "container-fluid bg-dark"> <!-- Main container that holds all body content -->

<div class= "row border-bottom border-white">

    <div class = "col-lg-8  p-4 pt-3 pb-5 carosel"> <!-- contains the film carosel -->

        <h1 class = "text-center pb-3 marker text-white"> Latest Releases </h1>

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?
             /**
             * 
             *  While loop to create each carosel item
             * 
             *  @var $filmOBJ, Film Object, an object storing all the information about a film
             *  @var $names, Film[], an array containing film objects of the five most recent films
             * 
             */
            ?>
                <?php while ($filmOBJ = $names->fetchObject('Film')) { ?>
                <?
                /**
                 * 
                 * If statement to make sure one, and only one film is classfied as an active item
                 * 
                 */
                ?>
                    <?php if ($filmOBJ->id == 1) { 
                        echo   '<div class="carousel-item active">';
                    }  else {
                        echo  '<div class="carousel-item">';
                    } ?>

                <a class ="link" href="filmPage.php? id=<?php echo $filmOBJ->id;?>"> 
                <!--  <a> tag wrapped around each carosel item that directs to the film page of the selected film -->

                    <div class = "container">

                         <div class = "row ">

                            <div class = "col-md-4">

                                <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $filmOBJ->id?>_massive.jpg"  height="350" alt="First slide">
                                <!-- gathers the correct image from the assets folder, the film object attribute id is inserted into the url to get the correct poster for each film -->
                            </div>

                            <div class = "col-md-8">

                                <H1 > <?php echo $filmOBJ->name; ?> </H1>
                                <p class = "text-white"><?php echo $filmOBJ->description; ?>   </p>
                                <!-- gathers the title and description of each film -->

                            </div>

                        </div>

                    </div>

                    </a>

                </div>

        <?php } ?>

    </div>
    <!-- Bootstrap carosel controls -->
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

<?php $names->closeCursor() // closes the execution of this query so other queries can be loaded ?>


    <div class = "col-md-4 text-center bg-dark center-block"> <!-- container for the random film feature -->

        <?php

            $random->execute();
            $randomFilm = $random->fetchAll();
            $random->closeCursor();

            /**
             * 
             *  Query that gathers infomation about a random film in the database
             * 
             *  @var $randomFilm, Film[], an array containing a random film object
             */

             
        ?>
     
        <h1 class ="p-3 text-danger marker"> Film of the Day</h1>

        <a class ="link" href="filmPage.php? id=<?php echo $randomFilm[0]->id;?>">

            <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $randomFilm[0]->id;?>_massive.jpg" height = "350" alt = "Film of the day" >

            <h2 class = "p-3  text-danger"> <?php echo $randomFilm[0] -> name; ?> </h2>

        </div>

         </a>

    </div>

    <div class = "row  border-white border-bottom">

        <div class = "col-md-4 text-center bg-dark">

            <h1 class ="p-3 text-danger marker"> Movies Tracked </h1>

            <?php

                $number->execute();
                $numberOfFilms = $number->fetchAll();
                //gathers all the rows in the film database
                   
                $reviewNumber->execute();
                $reviewNum = $reviewNumber->fetchAll();
                //gathers all the rows is the review database 

            ?>
                
            <p class = "text-danger"> Movies on Database: <?php  echo COUNT($numberOfFilms); ?> </p>

            <p class = "text-danger"> Reviews on Database: <?php echo COUNT($reviewNum); ?>  </p>

            <!-- count is used to get the number of items inside the array and print it -->
        
        
        </div>

        <div class = "col-md-8 text-center   carosel">

            <h1 class ="p-3 text-white marker"> Film Finder by Red Carpet Films </h1>

            <p class = "text-white"> Film Finder is a Online Database that stores information on the lastest films</p>

            <p class = "text-white"> Users can leave reviews on films and view the reviews of other users </p>

            <p class = "text-white"> The website also incorporates information from Metacritic and IMDB through the OMDB API </p>

                    
        </div>

     </div>

       
    </div>

    </div>

    </div>


    <div class = "row">

        <div class = "col-12 bg-dark">

        <h1 class  ="text-danger text-center border-bottom border-white marker p-4"> Top 3 films by our users </h1>

        

        <?php
        
        $reviewCounter->execute();
        $likedfilms = $reviewCounter->fetchAll();
        
        /**
         * 
         * foreach to render each of the top 3 films
         * 
         * @param $likedfilms, Film[], array containing the relevant information about the top three films
         * 
         */

        foreach ($likedfilms as $film) { ?> 

            <a class ="link" href="filmPage.php? id=<?php echo $film->id; ?>">

            <div class  = "container border-bottom border-white pt-4 pb-4">

                <div class = "row"> 

                <div class  = "col-sm-3 ">

                    <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $film->id ?>_massive.jpg"  height="300" alt="Poster">
                    

                </div>

                <div class  = "col-sm-9 border-left border-white">

                    <h4 class = "marker text-danger"> <?php echo $film->name; ?> </h4>
                    <h4 class = "text-danger"> <?php echo $film->num ?> People Liked this film </h4>
                    <p class = "text-white"> <?php echo mb_strimwidth($film->description, 0, 400, "...."); ?>

                </div>

                </div>
            
            </div>

            </a>
    
        <?php } ?>
    
        </div>

    </div>

    <?php include 'includes/footer.php'; 
    // responsible for loading the footer of the page
    ?>


    </div>

</div>




</body>


</html>
