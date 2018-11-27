
<?php 

	$name=$_POST[reviewerName];
	$review=$_POST[reviewContent];
	$filmID=$_POST[id];
	
    include 'includes/database.php'; 
    

    $Statement = $database->prepare('
    

		INSERT INTO review (id, film_id, reviewer, comment,liked)
        VALUES (:id,:filmID,:name,:comment,:liked )');
        

    $Statement->execute(array('filmid' => $$filmID, ':name'=> $name, ':value' => $value));
    


    ?>