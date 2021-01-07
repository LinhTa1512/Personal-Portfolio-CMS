<?php
     //include the Function file
	include( '../includes/Class.Functions.php' );
    
    //set new function
	$fn = new Functions();
    
    //call the function to check if user is logged in or not
	$fn->checkLoggedIn();
    
    //call function to upload image
	$uploadStatus = $fn->doImageUpload();

	$term = "";
		
?>
<!doctype html>

<html>

    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Portfolio Content Management System </title>
        
<!-- Bootstrap core CSS -->
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

<!--  Page's Bootstrap CSS -->
            <link href="../../css/bootstrap_manage.css"rel="stylesheet">

            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    
 <!--  TinyMCE -->       

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
                                          
                                        <a class="nav-link" href="#">Uploads</a>
                                          
                                        <a class="nav-link active" href="manage_portfolio.php">Portfolio</a>

                                        <a class="nav-link active" href="manage_blog.php">Blog</a>
                                          
                                        <a class="nav-link active" href="manage_contact.php">Contact</a>  

                                        <a class="nav-link active" href="logout.php"id="logout" >Log Out</a>

                                      </nav>

                                </div> 

                            </div>  
                  
                    </header>
        

                    <section class="cms-upload-section" >

                        <br/>

                        <div class="file-wrapper">	

                        <h1><b>Uploads</b></h1>

                        <br/>

                        <form action="" method="post" enctype="multipart/form-data" name="imageUpload">

                            <div class="form-group">

                                <div id="imageInformation">

                                    <label for="imageTitleInput"><b>Image Title</b></label>

                                    <input type="text" class="form-control" id="imageTitleInput" name="imageTitleInput" placeholder="Enter a title for this image">

                                    <br/>

                                    <label for="imageDescriptionInput"><b>Image Description</b></label>

                                    <input type="text" class="form-control" id="imageDescriptionInput" name="imageDescriptionInput" placeholder="Enter a description for this image">

                                    <br/>

                                    <label for="imageContent"><b>Image Content</b></label>

                                    <textarea type="text"   id="imageContentInput" name='imageContentInput' cols='60' rows='10'></textarea>

                                </div>

                                </br>

                                <label for="images"><i>Please choose an image to upload</i></label>

                                <!-- mime types here https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types#Discrete_types -->

                                <input type="file" class="form-control-file" multiple name="images[]" accept="image/*" id="images">

                                <br/>					

                                <input type="checkbox" id="isProfile" name="isProfile">

                                <label for="profile">Is this your profile picture?</label>

                                <br/><br/>

                                <button type="submit" id="imageUploadButton" name="imageUploadButton" class="btn btn-success" alt="Upload Image">Upload</button>

                            </div>

                             </div>

                        </form>
                        <!--If the upload status is called-->
                        <?php if ( $uploadStatus ) { ?>
                        
                         <!--Alert Success or else alert Failure-->
                            <div class="alert <?php if( $uploadStatus[ "success" ] ) { ?> alert-success <?php } else { ?> alert-danger <?php } ?>" role="alert">

                                <?php 
                                    
                                     // for each upload status error, echo the error               
                                    foreach( $uploadStatus[ "error" ] as $error )				
                                    {

                                        echo "<p>" . $error . "</p>"; 

                                    }

                                ?>

                            </div> 	

                        <?php } ?>

                    </section>
          
<!-- Page footer-->
                  
                  <footer class="mastfoot mt-auto" style="text-align: center; padding: 2px;">
                            
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