
<!doctype html>

  <?php include 'includes/Head.php'; 

        if (!isset($_GET["id"])) {

            echo "404 Film not found";

        } else {

          $filmIDpre = $_GET["id"];
          $filmID = $filmIDpre - 1;

        }

      $reviewInfo = $db->prepare('

        SELECT *
        FROM review
        WHERE  film_id = '.$filmIDpre.'
        LIMIT 10;
        
');       

      $reviewInfo->execute();
      $reviews = $reviewInfo->fetchAll();

      $filmInfo->execute();
 			$info = $filmInfo->fetchAll();

       ?>


      <div class="row">

      

        <div class = "col-2 carosel">



        </div>

        <div class = "col-8 bg-dark p-4">

          <div class = "container p-2">

              <div class = "row">

              <div class = "col-xl-4 pl-2 center pr-4">

                     <img src="http://comp2203.ecs.soton.ac.uk/coursework/1617/assets/posters/<?php echo $info[$filmID]->id?>_massive.jpg"  height="500" alt="First slide">

              </div>

              <div class = "col-xl-8 ">

                <h1 class = "pb-3 marker text-white"> <?php echo $info[$filmID]->name?> </h1>

                <p class = "text-white"> Runtime: <?php echo $info[$filmID]->runtime?> Minutes  </p>
                <p class = "text-white"> Director: <?php echo $info[$filmID]->director?></p>
                <p class = "text-white"> Classification: <?php echo $info[$filmID]->classification?></p>
                <p class = "text-white"> <?php echo $info[$filmID]->description?></p>


              </div>

          </div>

          <h1 class = "text-center text-white marker"> reviews </h1>


              <p class = "text-white"> User like ratio : 50% </P> 
              <p class = "text-white"> IMDB score: 6.8 </p>

           

          <h2 class = "marker text-white"> leave a review: </h2>


            <div class = row>

            

            <div class="form-group">

			      <?php $getId=$_GET["id"];?>

				    <form action="reviewValidation.php" method="post">

           <p class = "text-white"> Name: </p>
           
          <input class="form-control" type="text" Name="reviewerName">

				  <p class = "text-white"> Review (500 word MAX): <br>
          
          <textarea class="form-control" rows = "7" type="textarea"  Name="reviewContent"> </textarea>

          <div class="form-check">
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

					<input class="btn btn-primary" type="Submit"> 

					<input type='hidden' Name='reviewID' value='<?php echo $getId; ?>'/>

					</div>

        

				</form>


			</div>

      



        </div>

          <h2 class = "text-white"> User Reviews:  </h2>


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

        <?php //include 'includes/footer.php'; ?>
  </body>


  </html>
