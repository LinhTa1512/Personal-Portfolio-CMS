<?php

    //include the Function file
	include( '../includes/Class.Functions.php' );
    
    //set new function
	$fn = new Functions();

    //call the function to check if user is logged in or not
	$fn->checkLoggedIn();

	$term = "";
		
?>
<!doctype html>

<html>

    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Manage Portfolio </title>
              
        <!-- Bootstrap core CSS -->
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

<!--  Page's Bootstrap CSS -->
            <link href="../../css/bootstrap_manage.css"rel="stylesheet">

            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    </head>
    
    <body>
        
<!-- Navigation Bar-->  
        
         <div class="container">
            
              <header class="masthead mb-auto text-center">

                        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

                            <div class="inner">

                                  <h3 class="masthead-brand">Linh Ta.</h3>
                                  
                                    <h3 class="masthead-admin"> ( admin site )</h3>

                                      <nav class="nav nav-masthead justify-content-center">

                                        <a class="nav-link active" href="../index.php">Client Site</a>
                                          
                                        <a class="nav-link  active" href="manage_file-upload.php">Uploads</a>
                                          
                                        <a class="nav-link active" href="manage_portfolio.php">Portfolio</a>

                                        <a class="nav-link" href="#">Blog</a>
                                          
                                        <a class="nav-link active" href="manage_contact.php">Contact</a>  

                                        <a class="nav-link active" href="logout.php"id="logout" >Log Out</a>

                                      </nav>

                                </div> 

                            </div>  
                  
                    </header>
             
 <!--Blog-->            
    <section class = "cms-blog-section " style="clear:both"> 
        
                 <br/>
        
                    <div class="table-wrapper">
                        
                        <div class="table-title">
                            
                            <div class="row">
                                
                                <div class="col-sm-8"><h2><b>Post Details</b></h2></div>
                                
                                <div class="col-sm-4">
                                    
                                     <a href="add-post.php?id=<?php echo $row[ "post_id" ]; ?>" class="btn btn-success add-new" ><i class="fa fa-plus"></i>Add Post</a>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        <table class="table table-bordered">
                            
                            <thead>
                                
                                <tr>
                                    <th>Name</th>
                                    
                                    <th>Date</th>
                                    
                                    <th>Description</th>
                                    
                                    <th>Actions</th>
                                </tr>
                                
                            </thead>

                            <tbody>
                                
 <!--Call the media function to get each media post in a for each loop-->                                  
                                <?php

                                    try {

                                        $query = $fn->getAllPosts( $term );

                                        while( $row = $query->fetch() ) {

                                    ?>

                                <tr  id="row-<?php echo $row[ "post_id" ]; ?>" class="table-body" >
                                    
                                        <td class="title"><?php echo $row[ "post_title" ]; ?></td>
                                    
                                        <td class="date"><?php echo date( "jS M Y H:i:s", strtotime( $row[ "post_date" ] ) ); ?></td>
                                    
                                        <td class="text"><a href="../view-post.php?id=<?php echo $row[ "post_id" ]; ?>">Read more...</a></td>
                                    
                                        <td>
                                            <a href="edit-post.php?id=<?php echo $row[ "post_id" ]; ?>" class="edit-post" data-toggle="tooltip"> <i class="material-icons">&#xE254;</i></a>
                                            
                                           <a id="<?php echo $row[ "post_id" ]; ?>" class="delete-post" data-toggle="tooltip" > <i class="material-icons">&#xE872;</i></a>
                                            
                                        </td>

                                </tr>
                                
<!--Catch an error raised by PDO  and gets the exception message-->
                                    <?php

                                        }

                                    } catch ( PDOException $e ) {

                                        echo $e->getMessage();

                                    }

                                ?>
                                
                          </tbody>

                        </table>

                </div>

    </section>
             
        <!-- Page footer-->
                  
                  <footer class="mastfoot mt-auto" style="clear:both;text-align: center; padding: 2px;">
                            
                          </br>
    
                          <p class="logo text-white"> Linh Ta ©</p>
                        
                          <p><a href="#" class="backtotop text-white" style="padding: 2rem">Back to top</a></p>

                  </footer>

            
<!--  jQuery and Bootstrap Bundle-->
      
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            
                <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>   
        
     <!--JavaScript link-->    
        
                <script src="scripts.js"></script>
                
                <script src="../scripts.js"></script>
        
        </div>

    </body>

</html>