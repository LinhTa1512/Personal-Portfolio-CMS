<?php 

    //include the Function file
	include( '../includes/Class.Functions.php' );

    //set new Function
	$fn = new Functions();
    
    //call function to check if user is logged in or not
	$fn->checkLoggedIn();
    
    //call function to get each contact by ID
    $contact = $fn->getContactByID( $_GET["id"] );

    //call function to edit a contact
	$fn->editContact();

?>

<!doctype html>

<html lang="en">
	
	<head>

	  <meta charset="utf-8">
        
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

	  <title>Admin - Edit Contact</title>
        
      <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

    <!--  Page's Bootstrap CSS -->
        <link href="../../css/bootstrap_manage.css"rel="stylesheet">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">    
        
         <!--Tiny MCE -->
	  <script src="https://cdn.tiny.cloud/1/r4lqw15bjc16rp5v150n0bpdoprbi9hhbpfrl3ka7irsrf7l/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        
      <script>
            tinymce.init({
              selector: 'textarea',
              plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
              toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
              toolbar_mode: 'floating',
              tinycomments_mode: 'embedded',
              tinycomments_author: 'Author name',
           });
  </script>

	</head>

	<body><!-- Navigation Bar-->  
        
         <div class="container">
            
              <header class="masthead mb-auto text-center">

                        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

                            <div class="inner">

                                  <h3 class="masthead-brand">Linh Ta.</h3>
                                  
                                    <h3 class="masthead-admin"> ( admin site )</h3>

                                      <nav class="nav nav-masthead justify-content-center">

                                        <a class="nav-link active" href="../index.php">Client Site</a>
                                          
                                        <a class="nav-link active" href="#">Uploads</a>
                                          
                                        <a class="nav-link active" href="manage_portfolio.php">Portfolio</a>

                                        <a class="nav-link active" href="manage_blog.php">Blog</a>
                                          
                                        <a class="nav-link active" href="manage_contact.php">Contact</a>  

                                        <a class="nav-link active" href="logout.php"id="logout" >Log Out</a>

                                      </nav>

                                </div> 

                            </div>  
                  
                    </header>

		<div id="wrapper" style="color: white">

			<h2 class="text-center" style="color: white; letter-spacing: 5px;">Edit Contact</h2>

      <!--Show error if a form is not filled-->
			<?php

				if( isset( $error ) ){

					foreach( $error as $error ){

						echo '<p class="error">' . $error . '</p>';

					}

				}

			?>

			<form action="" method="post">
				
				<input type='hidden' name='contactID' value='<?php echo $contact[ "contact_id" ]; ?>'></p>

				<p><label><b>Name</b></label><br />
				<input type='text' name='contactName' style="width: 400px; border-radius: 5px;" value='<?php echo $contact[ "contact_name" ]; ?>'></p>

				<p><label><b>Email</b></label><br />
                <input type='text' name='contactEmail' style="width: 400px; border-radius: 5px;" value='<?php echo $contact[ "contact_email" ]; ?>'></p>
            
                <p><label><b>Phone</b</label><br />
                    <input type='text' name='contactPhone' style="width: 400px; border-radius: 5px;" value='<?php echo $contact[ "contact_phone" ]; ?>'></p>

		        <p><label><b>Message</b></label><br />
				<textarea name='contactMessage'  cols='60' rows='10'><?php echo $contact[ "contact_message" ]; ?></textarea></p>

				<p><input type='submit' class="btn btn-success" name='edit' value='Edit Contact'></p>

			</form>

		</div>
             
		   <!-- Page footer-->
                  
                <footer class="mastfoot mt-auto" style="text-align: center; padding: 2px;">
                            
                        </br>
    
                        <p class="logo text-white"> Linh Ta ©</p>
                        
                         <p><a href="#" class="backtotop text-white" style="padding: 2rem">Back to top</a></p>

                </footer>
        
<!--  jQuery and Bootstrap Bundle  -->

         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>  
        
	</body>
	
</html>
