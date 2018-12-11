
<?php

/**
 *
 *
 */
    
   // header('Location: filmPage.php? id='.echo $filmID;.'');

    include 'includes/database.php'; 

	$name= strip_tags(trim($_POST['reviewerName']));
	$review= strip_tags(trim($_POST['reviewContent']));
    $filmID= strip_tags(trim($_POST['reviewID']));
    $liked =  strip_tags(trim($_POST['likeDislike']));

    var_dump($_POST);


	
    $Statement = $db->prepare('
    
		INSERT INTO review (film_id, reviewer, comment,liked)
        VALUES (:filmid,:name,:comment,:liked);

        ');
        
     $Statement->execute(array(':filmid' => $filmID,':name' => $name,':comment' => $review, ':liked' => $liked));
    
?>