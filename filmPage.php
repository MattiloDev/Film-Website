
<!doctype html>
<?
/**
 * FilmPage.php
 * 
 * Page that is responsible for loading all of the information about the requested film. Films are distingueshed
 * by the id that is passed into the url when this page is linked to
 * 
 * @category php file
 * @author Matthew Hutchings
 * 
 */
?>

<?php include 'includes/Head.php'; // renders the navigation bar and adds links to the bootstrap scripts
require ('Classes/Film.class.php');// enables use of the film class

      /**
       * 
       *  If statement to check if the id field is set in the url and if so fetch it from the url 
       *  
       *  @param 'id', int, id of the film in the film table of the database
       * 
       *  @var filmIDpre, int, id value stored within the url
       *  @var filmID, id value after processing 
       * 
       */

      if (!isset($_GET["id"])) { //checks if a id is set

          echo "404 Film not found";

      } else {

        $filmIDpre = $_GET["id"]; // returns the id from the url and assigns it to $filmIDpre
        $filmID = $filmIDpre - 1; // 1 is subtracted from the the id due to conversion from the id column which starts at 1 to an array which starts at 0

      }

    /**
     *  reviewInfo
     * 
     *  SQL query that gathers the lastest 10 reviews for the current film 
     * 
     */

    $reviewInfo = $db->prepare('

      SELECT *
      FROM review
      WHERE  film_id = '.$filmIDpre.'
      ORDER BY id DESC
      LIMIT 10;
      
      
    ');

    /**
     * 
     * filmInfo
     * 
     * Gathers all information availible about the selected film
     * 
     */  

    $filmInfo = $db->prepare('

      SELECT *
      FROM film
      WHERE  id = '.$filmIDpre.';

    ');

    /**
     * OMDBinfo
     * 
     * Gathers the imdb_id of the current film for use with the OMDB API
     * 
     */

    $OMDBinfo = $db->prepare('
      
      SELECT imdb_id
      FROM film
      WHERE  id = '.$filmIDpre.';
    
    ');

    $reviewInfo->execute();
    $reviews = $reviewInfo->fetchAll();

    $OMDBinfo->execute();
    $OMDB = $OMDBinfo->fetchAll();

    $filmInfo->execute();
    $filmOBJ=$filmInfo->fetchObject('Film');
    
    /**
     * stream(file_get_contents)
     * 
     * Gets information about the current film using the OMDB Api
     * 
     * @param imdb_id, int, the id of the selected film on IMDB
     */
    $stream  = file_get_contents('http://www.omdbapi.com/?apikey=de376b8f&i='.$filmOBJ->imdb_id.'');
    $filmIMDB = json_decode($stream);
   
    
     ?>

     
    <div class="row">

      <div class = "col-2 visible-xl carosel">

      

      </div>

      <div class = "col-8 bg-dark pt-5 p-4">

        <div class = "container p-2"> <!-- contains the display of information about the selected film -->

            <div class = "row">

            <div class = "col-xl-4 pl-2 center pr-4">

                   <img class = "center" src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $filmOBJ->id?>_massive.jpg"  height="500" alt="First slide">

            </div>

            <div class = "col-xl-8">

              <h1 class = "pb-3 marker text-white"> <?php echo $filmOBJ->name?> </h1>

              <p class = "text-white"> Runtime: <?php echo $filmOBJ->runtime?> Minutes  </p>
              <p class = "text-white"> Director: <?php echo $filmOBJ->director?></p>
              <p class = "text-white"> Classification: <?php echo $filmOBJ->classification?></p>
      
              <?
              /**
               *  If statement used for conditional formatting of the metascore
               * 
               *  @param Metascore, int, metascore of the selected film from the OMDB API
               */
              ?>

              <?php if ($filmIMDB->Metascore > 0 && $filmIMDB->Metascore < 40 ) { ?>

              <p class = "text-white"> Metacritic Score: </p>
              
              <div class ="rating bg-danger">

               <p class = "text-white ratingText"> <?php echo $filmIMDB->Metascore?></p>

              </div>

            <?php  } elseif($filmIMDB->Metascore > 40 && $filmIMDB->Metascore < 65) { ?>

              <p class = "text-white"> Metacritic Score: </p> 

              <div class ="rating bg-warning">
              
              <p class = "rating text-white ratingText">  <?php echo $filmIMDB->Metascore?></p>

              </div>

            <?php  } elseif ($filmIMDB->Metascore >= 65 && $filmIMDB->Metascore <= 100) { ?>

               <p class = "text-white"> Metacritic Score: </p>

               <div class ="rating bg-success">
               
                <p class = "text-white ratingText"> <?php echo $filmIMDB->Metascore?></p>

              </div>
              
            <?php  } else { ?>

              <p class = "text-white"> Film has no Metacritic ratings </p>

            <?php } ?>


              <p class = "text-white"> <?php echo $filmOBJ->description?></p>
            
            </div>

        </div>

        <div class ="row pt-5">
  
        <div class = "col-6"> <!-- contains the form used to post reviews to the database -->

        <h2 class = "marker text-white"> leave a review: </h2>

          <div class="form-group"> <!-- start of form --> 

          <?php $getId=$_GET["id"];?> <!-- gets the id of film the review is being written on and assigns it to $getId -->

          <form action="reviewValidation.php" method="post"> <!--desginates that the form information will be posted to reviewValidation.php when submitted -->

         <p class = "text-white"> Name: </p>
         
        <input class="form-control" type="text" Name="reviewerName">

        <p class = "text-white"> Review: <br>
        
        <textarea class="form-control" rows = "7" cols = "40" type="text"  Name="reviewContent"> </textarea>

        <div class="form-check"> <!-- radio button group used for the like dislike boolean value. -->
        <input class="form-check-input" type="radio" name="likeDislike" id="true" value="1" checked>
        <label class="form-check-label text-white" for="true">
         Liked
        </label>
        </div>

        <div class="form-check">
        <input class="form-check-input" type="radio" name="likeDislike" id="false" value="0">
        <label class="form-check-label text-white" for="false">
         Disliked
        </label>
        </div>

        <input class="btn btn-primary" type="Submit"> <!-- submits the form -->

        <input type='hidden' Name='reviewID' value='<?php echo $getId; ?>'/> <!-- hidden value reviewID containing getId variable is posted to the validation page -->

        </div>

      </form>

      </div>

    <div class = "col-6  text-center">

      <h1 class = "text-center marker text-white"> Cast </h1>


    <!-- printActors() method is called, used to display the main 5 cast members of each film -->
    <h3 class = "text-white text-center pt-3"><?php $filmOBJ->printActors($filmOBJ->id); ?></h3> 

    </div> 

  </div>

      </div>

        <h2 class = "text-white"> User Reviews:  </h2>

        <?
        /**
         * foreach used to render reviews for the selected film. For each review item it's attributes are styled and displayed in
         * the reviews section
         * 
         * @param $reviews, Object[], array of objects that contain the information of each review for the selected film
         */
        ?>

        <?php foreach ($reviews as $review) { ?>

        <div class = "border-top border-bottom">

        <h3 class ="p-3 text-danger marker"> <?php echo $review->reviewer; ?> </h3>
        <p class= "text-white">  <?php
        
        if ($review->liked == '1') {

          echo 'Liked It';

        }

        elseif ($review->liked == '0') {

          echo "didn't like it";

        }
        
        
        ?> </p>

        <p class= "text-white"> Review: <?php echo $review->comment; ?> </p>

        </div>

      <?php  } ?>

      

      </div>

     

      <div class = "col-2 carosel">



      </div>

    
    <?php include 'includes/footer.php'; ?> <!-- responsible for loading the footer of the page -->
      


      
</body>


</html>
