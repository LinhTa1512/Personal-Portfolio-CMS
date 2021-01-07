<?php 
    //include the Function file
	include( '../includes/Class.Functions.php' );
    
    //set new function
	$fn = new Functions();

    //call function checkLoggedIn
	$fn->checkLoggedIn();
    
    //call function to add Post
	$fn->addPost();

?>

<!doctype html>

<html lang="en">
	
	<head>

	  <meta charset="utf-8">
        
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

	  <title>Admin - Add Post</title>
        
    <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

<!--  Page's Bootstrap CSS -->
        <link href="../../css/bootstrap_manage.css"rel="stylesheet">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    

	     <script src="https://cdn.tiny.cloud/1/r4lqw15bjc16rp5v150n0bpdoprbi9hhbpfrl3ka7irsrf7l/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        
 <!--TinyMCE-->       
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

			<h2 class="text-center" style="color: white; letter-spacing: 5px;">Add Post</h2>

            <!--Show error if a form is not filled-->
			<?php

				if( isset( $error ) ){

					foreach( $error as $error ){

						echo '<p class="alert alert-danger" role="alert">' . $error . '</p>';

					}

				}

			?>

			<form action='' method='post'>

				<p><label><b>Title</b></label><br />
				<input type='text' name='postTitle' style="border-radius: 5px;" value='<?php if( isset( $error ) ) { echo $_POST[ 'postTitle' ]; }?>'></p>

				<p><label><b>Description</b></label><br />
				<textarea name='postDescription' cols='60' rows='10'><?php if( isset( $error ) ) { echo $_POST[ 'postDescription' ]; }?></textarea></p>

				<p><label><b>Content</b></label><br />
				<textarea name='postContent' cols='60' rows='10'><?php if( isset( $error ) ) { echo $_POST[ 'postContent' ]; }?></textarea></p>

				<p><input type='submit' name='add' class="btn btn-success" value='Submit'></p>

			</form>

		</div>
            
<!-- Page footer-->
                  
                <footer class="mastfoot mt-auto" style="text-align: center; padding: 2px;">
                            
                        </br>
    
                        <p class="logo text-white"> Linh Ta ©</p>
                        
                         <p><a href="#" class="backtotop text-white" style="padding: 2rem">Back to top</a></p>

                </footer>
    
	</body>
	
</html>
