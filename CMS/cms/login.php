<?php

    //include the funtions file
	include( '../includes/Class.Functions.php' );

    //set new function
	$fn = new Functions();

    //call the log-in funciton created in the functions file
	$fn->login();
	
?>

<!doctype html>
<html lang="en">
      <head>
<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--  Page's Bootstrap CSS -->      

        <link rel="stylesheet" type="text/css" href="../../css/bootstrap_login.css">

      </head>
    
        <body>
<!-- Log in Form-->      
            
                 <div id="login" class="wrapper">
                     
                            <form class="form-signin" action="" method="post">  
                                
                                <br/>
                                
                                  <h2 class="form-signin-heading text-center ">LOGIN</h2>
                                
                                    <p class="form-signin-paragraph text-center "> Please fill in all details</p>
                                
                                      <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
                                        <br>
                                
                                      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>     
                                
                                        <label class="checkbox">
                                              
                                        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
                                              
                                        </label>
                                        <br>
                                
                                  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button>   
                                
                                <p><?php echo $error; ?></p>
                                
                            </form>
                     
                      </div>

        <!--  jQuery and Bootstrap Bundle -->
            
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

      </body>
    
</html>