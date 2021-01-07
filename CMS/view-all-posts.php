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

                <title>View all posts</title>

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

                                    <a class="nav-link" href="#">Blog</a>
                                    
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
        
<!-- Search Bar-->
        
              <div class="sample nine">
                  
                  <form action="" name="searchForm" id="searchForm" method="post">
                      
                      <div class="searchBar justify-content-center">
                          
                            <input id="term" type="text" name="term" placeholder="Search..." >
                      
                            <button type="submit" class="btn btn-search" name="search">
                                
                                 <i class="fa fa-search"></i>
                                
                              </button>
                          
                      </div>
                      
            </div>
              
<!-- Call function for get all searched posts-->     	
                <?php

                    try {

                        $query = $fn->getAllPosts( $term );

                        while( $row = $query->fetch() ) {

                ?>
                  
  <!-- BLOG POSTS-->                   
                  
            <div class="row" style="padding:1rem; margin-bottom: 1rem;">

                          <div class="card-signin" style="width: 70rem;  background-color: white;">

                                       <div class="card-body">

                                    <h1 class="card-title"<a href="../view-post.php?id=<?php echo $row[ "post_id" ]; ?>"style="color:#000000"><?php echo $row[ "post_title" ]; ?></a></h1>

                                    <p class="card-time">Posted on: <?php echo date( "jS M Y H:i:s", strtotime( $row[ "post_date" ] ) ); ?></p>

                                    <p class="card-text"><?php echo $row[ "post_description" ]; ?></p>

                                    <p><a href="view-post.php?id=<?php echo $row[ "post_id" ]; ?>" class="btn btn-primary">Read more...</a></p>

                                  </div>

                          </div>
           </div>

  <!--Catch an error raised by PDO  and gets the exception message-->
        <?php

             }

                 } catch ( PDOException $e ) {

                      echo $e->getMessage();

             }

        ?>

<!-- Page footer-->
      
               <footer class="blog-footer" style="text-align: center">

                        <p class="logo text-white"> Linh Ta ©</p>

                        <p><a href="#" class="backtotop text-white" style="padding: 2rem">Back to top</a></p>

                </footer> 

<!--  jQuery and Bootstrap Bundle-->
      
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      
              <script src="scripts.js"></script>
      
                 </div>   

            </div>

    </body>

</html>

