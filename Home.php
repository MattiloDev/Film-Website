<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="Custom.css" rel="stylesheet"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Permanent+Marker" rel="stylesheet">


    <title> Film Finder </title>
  </head>
  <body>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



        <?php include 'includes/headerNav.php'; ?>




		<?php require 'includes/database.php';




			 $names = $db->prepare('

				SELECT *
				FROM film
				LIMIT 5;
				ORDER BY theatricalRelease Desc;

            ');

            $number = $db->prepare('

                SELECT COUNT (*)
                FROM film;
            
            ');

             $random = $db->prepare('

                SELECT *
                FROM film
                ORDER BY RAND();
                LIMIT 1;


            ');

		    $names->execute();
			$latest5 = $names->fetchAll();


		?>

        <div class= "container-fluid ">

        <div class= "row border-bottom border-white">


            <div class = "col-md-8  p-4 pt-3 pb-5 carosel">

                <h1 class = "text-center pb-3 marker text-white"> Latest Releases </h1>

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">


                                <a class ="link" href="filmPage.php? id=<?php echo $latest5[0]->id;?>">


                                <div class = "container">

                                <div class = "row ">

                                    <div class = "col-md-4">

                                         <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $latest5[0]->id?>_massive.jpg"  height="350" alt="First slide">

                                    </div>

                                    <div class = "col-md-8">

                                        <H1 > <?php echo $latest5[0] -> name; ?> </H1>

                                        <p class = "text-white"><?php echo $latest5[0] -> description; ?>   </p>




                                    </div>

                                </div>

                              </div>

                              </a>


                              </div>

                              <div class="carousel-item ">


                                    <a class ="link" href="filmPage.php? id=<?php echo $latest5[1]->id;?>">
                                    <div class = "container">

                                    <div class = "row">

                                        <div class = "col-md-4">

                                             <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $latest5[1]->id?>_massive.jpg"  height="350" alt="First slide">

                                        </div>

                                        <div class = "col-md-8">

                                            <H1><?php echo $latest5[1] -> name; ?></H1>



                                            <p class = "text-white"><?php echo $latest5[1] -> description; ?>   </p>


                                        </div>

                                    </div>




                                    </div>
                                  </a>


                                  </div>

                                  <div class="carousel-item">

                                        <a class ="link" href="filmPage.php? id=<?php echo $latest5[2]->id;?>">
                                        <div class = "container">

                                        <div class = "row">

                                            <div class = "col-md-4">

                                                 <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $latest5[2]->id?>_massive.jpg"  height="350" alt="First slide">

                                            </div>

                                            <div class = "col-md-8">

                                                <H1><?php echo $latest5[2] -> name; ?></H1>



                                                <p class = "text-white"><?php echo $latest5[2] -> description; ?>   </p>


                                            </div>

                                        </div>

                                        <?php  $names->closeCursor(); ?>


                                        </div>
                                      </a>


                                      </div>




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



            <div class = "col-md-4 text-center bg-dark">

              <?php

              $random->execute();
              $randomFilm = $random->fetchAll();
             

               ?>

                <h1 class ="p-3 text-danger marker"> Film of the Day</h1>

                <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $randomFilm[0]->id;?>_massive.jpg" height = "350" alt = "Film of the day" >

                <h2 class = "p-3  text-danger"> <?php echo $randomFilm[0] -> name; ?> </h2>

                

            </div>





        </div>

        <div class = "row pb-4">

             <div class = "col-md-4 text-center bg-dark">

                 <h1 class ="p-3 text-danger marker"> Movies Tracked </h1>

                 <?php

                    $number->execute();
                    $numberOfFilms = $random->fetchAll();

                ?>

                 <p class = "text-danger"> Movies on Database :<?php echo numberOfFilms[0]; ?> </p>

                 <p class = "text-danger"> Most Popular Genre : Action </p>

             </div>




            <div class = "col-md-8 text-center   carosel">

                <h1 class ="p-3 text-white marker"> What is Film Finder? </h1>

                <p class = "text-white"> Film Finder is a Online Database that stores information on the lastest films</p>

                <p class = "text-white"> Every Day there is a new Film of the day </p>



            </div>

        </div>

        </div>


		<?php include 'includes/footer.php'; ?>










        </div>

        </div>





  </body>
</html>
