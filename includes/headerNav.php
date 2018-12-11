 <nav class="navbar navbar-dark navbar-expand-md bg-dark border-bottom border-white ">

 <?php
     require 'includes/database.php';
     require 'includes/Prepared.php';


                $genreNames->execute();
                $names = $genreNames->fetchAll();

                //var_dump($names);

?> 

                <a class="navbar-brand" href="Home.php">
                  <img class="p-2" src="Assets/logo_cropped.png" height= "80" alt="Film Site logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <a class = "navItem text-white pl-4 pr-4" href = "Home.php">

                    Home

                </a>

                <li class="nav-item dropdown">
                    <a class="navItem marker text-white dropdown-toggle pr-2" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                          Genres
                          
                     </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <?php foreach ($names as $genre) { ?>

                <a class="dropdown-item" href="genre.php? id=<?php echo $genre->id; ?>"> <?php echo $genre->name; ?> </a>

           <?php  } ?>

        </div>
      </li>

                <a class = "navItem text-white pl-4 pr-4" href = "Home.php">

                    About

                </a>

                  </div>

            </nav>
