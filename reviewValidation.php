<?
/**
 * reviewValidation.php
 * 
 * php file responsible for inserting the information from the review form into the database
 * 
 * @category php file
 * @author Matthew Hutchings
 * 
 * @param reviewerName, String, name of review from form
 * @param reviewContent, String, the content of the review from form
 * @param reviewID, int, id of review to be posted into database
 * @param likeDislike, Bool, whether the user liked or disliked the film overall
 * 
 */
?>


<?php
    
   // header('Location: filmPage.php? id='.echo $filmID;.'');

    include 'includes/database.php'; // loads database PDO connection

    //Strip tags is used to prevent php injections and unintended HTML embeds
	$name= strip_tags(trim($_POST['reviewerName'])); 
	$review= strip_tags(trim($_POST['reviewContent']));
    $filmID= strip_tags(trim($_POST['reviewID']));
    $liked =  strip_tags(trim($_POST['likeDislike']));

    var_dump($_POST);


	// prepares the insert query which will populate the review table
    $Statement = $db->prepare('
    
		INSERT INTO review (film_id, reviewer, comment,liked)
        VALUES (:filmid,:name,:comment,:liked);

        ');
    
    // executes the query with the processed data from the form

     $Statement->execute(array(':filmid' => $filmID,':name' => $name,':comment' => $review, ':liked' => $liked));
     
    header("Location: http://linuxproj.ecs.soton.ac.uk/~mwh1g17/Film-Website/filmPage.php?%20id=".$filmID);
    
?>