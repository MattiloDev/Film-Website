
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


        if (!isset($_GET["id"])) {

            echo "404 Film not found";

        } else {

          $filmID = $_GET["id"];
          $filmID = $filmID - 1;

        }

        $filmInfo = $db->prepare('

         SELECT *
         FROM film



       ');

      $filmInfo->execute();
 			$info = $filmInfo->fetchAll();

       ?>


      <div class="row">

        <div class = "col-2 carosel">



        </div>

        <div class = "col-8 bg-dark p-4">

          <div class = "container p-2">







              <div class = "row">

              <div class = "col-sm-4 pl-2 pr-4">

                     <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $info[$filmID]->id?>_massive.jpg"  height="500" alt="First slide">

              </div>

              <div class = "col-sm-8 ">

                <h1 class = "pb-3 marker text-white"> <?php echo $info[$filmID]->name?> </h1>

                <p class = "text-white"> Runtime: <?php echo $info[$filmID]->runtime?> Minutes  </p>
                <p class = "text-white"> Director: <?php echo $info[$filmID]->director?></p>
                <p class = "text-white"> Classification: <?php echo $info[$filmID]->classification?></p>
                <p class = "text-white"> <?php echo $info[$filmID]->description?></p>






              </div>

          </div>

          <div class = row>

              <h1 class = "text-center"> reviews </h1>

            </div>



        </div>

        </div>

        <div class = "col-2 carosel">



        </div>

        <?php include 'includes/footer.php'; ?>
  </body>


  </html>
