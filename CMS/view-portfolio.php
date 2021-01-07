<?php 

    // include the function file 
	include( 'includes/Class.Functions.php' );

    //set new function
	$fn = new Functions();
    
    //call the function to get media by ID  
    $media = $fn->getMediaByID( $_GET[ "id" ] );

?>

<!doctype html>

<html lang="en">
    
      <head>
          
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">

        <title>View Post</title>

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

                        </div>    

            </header>

    <body>

    <!-- BLOG POST-->
        
         <div id="media-<?php echo $media[ "media_id" ]; ?>" class="media-post">

                <div class="media" style="padding:1rem; margin-bottom: 1rem;">

                      <div class="card-signin" style="width: 70rem;  background-color: white;">
                          
                                <div style="margin-top:20px;">

								<img src="uploads/<?php echo $media["media_filename"];?>" class="imageid" focusable="false" role="img" aria-label="<?php echo $media["media_title"] ?>" />

							</div>

                                <div class="card-body">

                                <h1 class="card-title"><?php echo $media[ "media_title" ]; ?></h1>

                                <p class="card-time">Posted on: <?php echo date( "jS M Y H:i:s", strtotime( $media[ "media_date" ] ) ); ?></p>
                                    
                                <p class="card-description"><b><?php echo $media[ "media_description" ]; ?></b></p>  

                                <p class="card-content"> <?php echo $media[ "media_content" ]; ?></p>

                                </div>

                    </div>

              </div><!--/.row-->

        </div><!-- /.blog-post --> 
    

     <!-- Page footer-->

        <footer class="blog-footer" style="text-align: center">

                    <p class="logo text-white"> Linh Ta ©</p>

                    <p><a href="#" class="backtotop text-white" style="padding: 2rem">Back to top</a></p>

        </footer>   

         <!--  jQuery and Bootstrap Bundle  -->

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>  

    </body>
	
</html>