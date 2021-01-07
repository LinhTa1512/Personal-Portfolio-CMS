<?php

//create session
session_start();

//requires the Google Authenticator file
require "../includes/Authenticator.php";

// if the request method of the server does not equal to post
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    
    header("location: authenticator.php");
    
    //exit 
    die();
    
}

$authenticator = new Authenticator();

//check if the QRCode is equal to the code provided on Google Authenticator app
$checkResult = $authenticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance

if (!$checkResult) {
    
    //if does not equal
    $_SESSION['failed'] = true;
    
    header("location: authenticator.php");
    
    //exit 
    die();
    
} else {
    
    $_SESSION['failed'] = false;
    
    $_SESSION[ 'session_id' ] = session_id();

    $_SESSION[ 'username' ] = $_SESSION[ 'tmpsuccess' ] ;
    
}


?>

<!DOCTYPE html>

<html lang="en">
    
<head>
    
    <meta charset="UTF-8">
    
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Authentication Successful</title>
             
<!-- Bootstrap core CSS -->
    
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
<!--  Page's Bootstrap CSS -->   
    
        <link href="../../css/bootstrap_authenticator.css" rel="stylesheet">

</head>
    
<body>
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-6 offset-md-3"  style="width: 600px; background: white; padding: 20px; box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.1); margin-top: 100px; border-radius: 10px;">
                
                <hr>
                
                    <div style="text-align: center;">
                        
                           <h1>Authentication Successful</h1>
                        
                           <p><a href="../index.php">You  can access the site here </a></p>
                        
                    </div>
                
            </div>
            
        </div>
        
    </div>
    
<!--  jQuery and Bootstrap Bundle-->
      
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>       
    
</body>
    
</html>