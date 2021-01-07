<?php
    
    //include the Function file
	include( 'includes/Class.Functions.php' );

    //set new function
	$fn = new Functions();

	$term = "";
    
    //call function add contact
    $fn->addContact();
		
?>
<head>
	<title>Contact</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
	<link rel="stylesheet" type="text/css" href="../css/bootstrap_contacts.css">
<!--===============================================================================================-->
</head>

<body>
         
<!-- Navigation Bar-->  
      
    <div class="container">
        
        <header class="masthead mb-auto text-center">

                    <div class="cover d-flex w-100 p-3 mx-auto flex-column">

                            <div class="inner">

                                  <h3 class="masthead-brand">Linh Ta.</h3>

                                      <nav class="nav nav-masthead justify-content-center">

                                        <a class="nav-link active" href="index.php">Home</a>

                                        <a class="nav-link active" href="profile.php">Profile</a>

                                        <a class="nav-link active" href="view-all-posts.php">Blog</a>
                                          
                                        <a class="nav-link " href="#">Contact</a>  

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
        
    <div class="container-contact100">
        
		<div class="wrap-contact100">
            
			<form class="contact100-form validate-form" action="" method="post" enctype="multipart/form-data" name="contactInput">
                
				<span class="contact100-form-title">
					Contact Me
				</span>
                
                       <!-- Show alert when a form fill is missing-->                     
                            <?php

                                if( isset( $error ) ){

                                    foreach( $error as $error ){

                                        echo '<p class="alert alert-danger" role="alert">' . $error . '</p>';

                                    }

                                }

                            ?>
                    
                    	<div class="wrap-input100 validate-input bg1">
                            
                            <span class="label-input100">Name</span>
                            
                            <input class="input100" type="text" name="contactName" id="contactName" placeholder="Enter your Name" >
                        </div>
                        
                    
                        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" >
                            
                            <span class="label-input100">Email</span>
                            
                            <input class="input100" type="text"name="contactEmail" id="contactEmail" placeholder="Enter your Email ">
                            
                        </div>
                        
                    
                        <div class="wrap-input100 bg1 rs1-wrap-input100">
                            
                            <span class="label-input100">Phone</span>
                            
                            <input class="input100" type="text" name="contactPhone" id="contactPhone" placeholder="Enter your Phone Number"  >
                            
                        </div>
                        
                    
                        <div class="wrap-input100 validate-input bg0 rs1-alert-validate">
                            
                            <span class="label-input100">Message</span>
                            
                            <textarea class="input100"  name="contactMessage" id="contactMessage"  placeholder="Your message here..." ></textarea>
				        </div>
        
                    
                        <div class="container-contact100-form-btn">
                            
                            <button class="contact100-form-btn" type="submit" name="add" id="add">
                                
                        
                                    Submit
                                    <i class="fa fa-long-arrow-right m-l-7" ></i>
             
                                
                            </button>
                            
                        </div>
                    
                </form>
                
            </div>
            
        </div> 
        
    </div>     
        
<!--  jQuery and Bootstrap Bundle-->
      
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>            
        
        </body>
    
</html>