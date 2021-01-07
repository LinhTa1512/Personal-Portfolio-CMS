<?php

    //include the function file
	include( 'includes/Class.Functions.php' );

    //set new function
	$fn = new Functions();

    //if the term is searched
	if( isset( $_POST[ "term" ] ) )
	{
		//then get term using post method
		$term = "%" . $_POST[ "term" ] . "%";
		
	} else {
		
		$term = "";
		
	}


?>

<!doctype html>

<html lang="en">
    
  <head>
      
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">

                <title>View all portfolios</title>

<!-- Bootstrap core CSS -->
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--  Page's Bootstrap CSS -->
            <link href="../css/bootstrap_viewallblogpost.css" rel="stylesheet">

            <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">   

  </head>
    
  <body>
      
<!-- Navigation Bar-->  
      
        <div class="container">

              <header class="masthead mb-auto text-center">

                    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

                        <div class="inner">

                              <h3 class="masthead-brand">Linh Ta.</h3>

                                  <nav class="nav nav-masthead justify-content-center">

                                    <a class="nav-link active" href="index.php">Home</a>

                                    <a class="nav-link active" href="profile.php">Profile</a>

                                    <a class="nav-link active" href="view-all-posts.php">Blog</a>
                                      
                                    <a class="nav-link active" href="contacts.php">Contact</a>  

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

                        </div>   

            </header>         
           
<!-- MEDIA-->     
            <section class="cms-gallery-section" style="clear:both;">
                
                </br>
            
                <h1 class="sectionHeader text-center">PORTFOLIOS</h1>

                <br/>

                <?php

                    try {

                        $queryMedia = $fn->getAllMedia();

                        foreach ( $queryMedia as $media )
                        {

                ?>
                  <div class="col-lg-4 py-2" style="float: left;">
                      
                         <div id="media-<?php echo $media[ "media_id" ]; ?>">
                                
                             <a href="view-portfolio.php?id=<?php echo $media[ "media_id"]; ?>">
                                 
                                  <figure class="caption-2 mb-0 shadow-sm border border-white border-md">

                                        <img src="uploads/<?php echo $media["media_filename"]; ?>" class="image" focusable="false" role="img" aria-label="<?php echo $media["media_title"] ?>" />

                                            <figcaption class="p-4 bg-white">

                                                  <h2 class="h5 font-weight-bold mb-2 font-italic"><?php echo $media[ "media_title" ]; ?> </h2></a>
                                         
                                                 <p class="mb-0 text-small font-italic text-muted">Posted on: <?php echo date( "jS M Y H:i:s", strtotime( $media[ "media_date" ] ) ); ?></p>

                                                  <p class="mb-0 text-small font-italic text-muted"><?php echo $media[ "media_description" ]; ?></p>

                                            </figcaption>

                                  </figure>
                                 
                        </div>

              </div>

      <!--Catch an error raised by PDO  and gets the exception message-->
                <?php

                        }

                    } catch ( PDOException $e ) {

                            echo $e->getMessage();

                    }

                ?>

		<br/>
	
		</section> 

<!-- Page footer-->
      
               <footer class="blog-footer" style="text-align: center; clear: both;">
                   
                        <br/>
                   
                        <p class="logo text-white"> Linh Ta ©</p>

                        <p><a href="#" class="backtotop text-white" style="padding: 1rem">Back to top</a></p>

                </footer> 

<!--  jQuery and Bootstrap Bundle-->
      
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      
                <script src='cms/scripts.js'></script>
      
                 </div>   

            </div>

    </body>

</html>

