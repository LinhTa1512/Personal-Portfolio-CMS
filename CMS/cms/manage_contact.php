<?php

    //include the Function file
	include( '../includes/Class.Functions.php' );
    
    //set new function
	$fn = new Functions();

    //call function checkLoggedIn
	$fn->checkLoggedIn();

    //call function delete Contact by ID
	$fn->deleteContactByID( $_GET[ "id" ] );

	$term = "";
		
?>
<!doctype html>

<html>

    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Manage Contact </title>
              
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

                                        <a class="nav-link active" href="manage_blog.php">Blog</a>
                                          
                                        <a class="nav-link" href="#">Contact</a>  

                                        <a class="nav-link active" href="logout.php"id="logout" >Log Out</a>

                                      </nav>

                                </div> 

                            </div>  
                  
                    </header>
             
     <section class = "cms-contact-section " style="clear:both"> 
         
 <!--Call the media function to get each contact post in a for each loop-->    
                                  <?php

                                    try {

                                        $queryContact = $fn->getAllContact();

                                        foreach ( $queryContact as $contact )
                                        {

                                ?>
         
                                 <div class="row" style="padding:1rem; margin-bottom: 1rem;">

                                     <div  id="contact-<?php echo $contact[ "contact_id" ]; ?>"  class="card-signin" style="width: 70rem;  background-color: white;">

                                            <div class="card-body">

                                                <h1 class="card-title"><?php echo $contact[ "contact_name" ]; ?></h1>

                                                <p class="card-time">Posted on: <?php echo date( "jS M Y H:i:s", strtotime( $contact[ "contact_date" ] ) ); ?></p>

                                                <p class="card-text">Email:<?php echo $contact[ "contact_email" ]; ?></p>

                                                <p class="card-text">Phone Number:<?php echo $contact[ "contact_phone" ]; ?></p>

                                                <p class="card-text">Message:<?php echo $contact[ "contact_message" ]; ?></p>    

                                                <a id="<?php echo $contact[ "contact_id" ]; ?>" class="btn btn-danger delete-contact" style="color:white;">Delete</a>
                                
                                                 <a href="edit-contact.php?id=<?php echo $contact[ "contact_id" ]; ?>" class="btn btn-primary">Edit</a>

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