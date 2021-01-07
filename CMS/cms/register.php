<?php
     //include the Function file
	include( '../includes/Class.Functions.php' );

    //set new function
	$fn = new Functions();

    //call function to add new user
	$fn->addUser();

?>

<!doctype html>

<html lang="en">
    
  <head>
      
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">

                <title>Register</title>

<!-- Bootstrap core CSS -->
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--  Page's Bootstrap CSS -->
              <link rel="stylesheet" href='../../css/bootstrap_register.css'>

  </head>
    
    <body>
        <!-- Navbar-->
        <header>

                <div class="container">

                      <header class="masthead mb-auto text-center">

                            <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

                                <div class="inner">

                                      <h3 class="masthead-brand">Linh Ta.</h3>

                                          <nav class="nav nav-masthead justify-content-center">

                                            <a class="nav-link active" href="../index.php">Home</a>

                                            <a class="nav-link active" href="../profile.php">Profile</a>

                                            <a class="nav-link active" href="../view-all-posts.php">Blog</a>

                                            <a class="nav-link active " href="../contacts.php">Contact</a>      
                                            
                                            <!-- Only show this nav link if the user is logged in-->
                                            <?php 
                                            if(isset($_SESSION[ 'username' ]))
                                            {

                                            ?>

                                              <a class="nav-link active" href="manage.php">Admin</a>
                                              <a class="nav-link active" href="logout.php" id="logout" >Log Out</a>
                                          <?php

                                            } else {
                                                        
                                          ?>
                                        <!-- Show this nav link when they are not logged in-->          
                                          <a class="nav-link active" href="login.php" id="login" >Log In</a>

                                          <?php

                                            }

                                          ?>

                                          </nav>

                                    </div> 

                                </div>    

                    </header>

            <body>
        </header>


        <div class="container">
            
            <div class="row py-5 mt-4 align-items-center">
                
                <!-- For Demo Purpose -->
                
                <div class="col-md-5 pr-lg-5 mb-5 mb-md-0  text-center w-100">
                    
                    <img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
                    
                    <h1 style="color: white;">Create an Account</h1>
                    
                    <p class="font-italic mb-0 text-white">Please create an account to access the portfolio</p>
                    
                </div>

                <!-- Registeration Form -->
                <div class="col-md-7 col-lg-6 ml-auto">

                    <form action="" method="post">
                        
                          <div class=" form-group text-center w-100 text-white">
                                
                               <h1 style="letter-spacing: 10px;"><b>REGISTER </b></h1>
                                
                                <p style="letter-spacing: 5px;"> Fill in your information here</p>
                                
                        </div>
                        
    <!-- Show alert when a form fill is missing-->                     
                            <?php

                                if( isset( $error ) ){

                                    foreach( $error as $error ){

                                        echo '<p class="alert alert-danger" role="alert">' . $error . '</p>';

                                    }

                                }

                            ?>
                        
                <div class="row">
                            
                     <!-- First Name -->
                    <div class="input-group col-lg-6 mb-4">
                        
                        <div class="input-group-prepend">
                            
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                
                                <i class="fa fa-user text-muted"></i>
                                
                            </span>
                            
                        </div>
                        
                        <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md"  value='<?php if( isset( $error ) ) { echo $_POST[ 'firstname' ]; }?>'>
                        
                    </div>
                    

                    <!-- Last Name -->
                    <div class="input-group col-lg-6 mb-4">
                        
                        <div class="input-group-prepend">
                            
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                
                                <i class="fa fa-user text-muted"></i>
                                
                            </span>
                            
                        </div>
                        
                        <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md"  value='<?php if( isset( $error ) ) { echo $_POST[ 'lastname' ]; }?>'>
                        
                    </div>

                            <!-- Email Address -->
                            <div class="input-group col-lg-12 mb-4">

                                <div class="input-group-prepend">

                                    <span class="input-group-text bg-white px-4 border-md border-right-0">

                                        <i class="fa fa-envelope text-muted"></i>

                                    </span>

                                </div>

                                <input id="email" type="email" name="username" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" value='<?php if( isset( $error ) ) { echo $_POST[ 'username' ]; }?>'>

                            </div>

                            <!-- Password -->
                            <div class="input-group col-lg-12 mb-4">

                                <div class="input-group-prepend">

                                    <span class="input-group-text bg-white px-4 border-md border-right-0">

                                        <i class="fa fa-lock text-muted"></i>

                                    </span>

                                </div>

                                <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md" value='<?php if( isset( $error ) ) { echo $_POST[ 'password' ]; }?>'>

                            </div>

                            <!-- Submit Button -->
                            <div class="form-group col-lg-12 mx-auto mb-0">

                                <button class="btn btn-primary btn-block py-2 font-weight-bold text-white" name="register" type="submit">Register 

                                </button>

                            </div>

                            <!-- Divider Text -->
                            <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">

                                <div class="border-bottom w-100 ml-5"></div>

                                <span class="px-2 small text-white font-weight-bold text-muted">OR</span>

                                <div class="border-bottom w-100 mr-5"></div>

                            </div>

                            <!-- Already Registered -->
                            <div class="text-center w-100">

                                <p class="text-white">Already Registered? <a href="login.php" class="text-white font-weight-bold ml-2">Login</a></p>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

<!--  jQuery and Bootstrap Bundle  -->

         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>  
                    
          <script src="../scripts.js"></script>
            
    </body>
    
</html>    
