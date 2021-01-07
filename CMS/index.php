<?php

    //include functions file
	include( 'includes/Class.Functions.php' );

    //set new fucntion
	$fn = new Functions();

	$term = "";
		
?>

<!doctype html>

    <html lang="en">
        
          <head>
              
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
              
            <title>Linh Ta's Personal Portfolio Homepage</title>

            <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

           <!-- Bootstrap core CSS -->
              
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
              
            <!-- Page's Bootstrap CSS  -->
              
            <link href= "../css/bootstrap_cover.css" rel="stylesheet">
              
          </head>
        
<!-- Navigation Bar-->  
        
          <body class="text-center">
            
              <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
                  
                  <header class="masthead mb-auto">
                      
                        <div class="inner">
                            
                          <h3 class="masthead-brand">Linh Ta.</h3>
                            
                              <nav class="nav nav-masthead justify-content-center">
                                  
                                    <a class="nav-link" href="#">Home</a>
                                  
                                    <a class="nav-link active" href="profile.php">Profile</a>
                                  
                                    <a class="nav-link active" href="view-all-posts.php">Blog</a>
                                  
                                    <a class="nav-link active " href="contacts.php">Contact</a>  
                                  
                                   <?php 
                                    if(isset($_SESSION[ 'username' ]))
                                    {
                                        
                                    ?>
                                  
                                      <a class="nav-link active" href="cms/manage.php">Admin</a>
                                      <a class="nav-link active" href="cms/logout.php" id="logout" >Log Out</a>
                                  <?php
                                        
                                    } else {
                                  
                                  ?>
                                  <a class="nav-link active" href="cms/login.php" id="login" >Log In</a>
                                  
                                  <?php
                                        
                                    }
                                  
                                  ?>
                                   
                                  
                              </nav>
                            
                        </div>
                      
                  </header>
                  
<!--Main welcome-->
                  
                 <strong id="welcome">Welcome: <em><?php echo $_SESSION[ 'username'] ?></em></strong>        

                  <main role="main" class="inner cover">

                        <h1 class="cover-heading">Hello, I'm Linh</h1>

                        <p class="lead">Welcome to my Personal Portfolio </p>

                        <p class="lead">
                            
                                 <?php 
                                    if(isset($_SESSION[ 'username' ]))
                                    {
                                        
                                    ?>
                                   
                                  <a href="cms/logout.php" id="logout" class="btn btn-lg btn-secondary">Log Out</a>
                                        
                            
                                  <?php
                                        
                                    } else {
                                  
                                  ?>
                                  <a href="cms/login.php" id="login" class="btn btn-lg btn-secondary">Log In</a>
                                  
                                  <?php
                                        
                                    }
                                  
                                  ?>

                        </p>

                  </main>

<!-- Page footer-->
                  
                  <footer class="mastfoot mt-auto" style="text-align: center">

                    <div class="inner">

                          <p class="logo text-white"> Linh Ta ©</p>

                    </div>

                  </footer>

                </div> <!--Container -->
              
        </body>
        
</html>
