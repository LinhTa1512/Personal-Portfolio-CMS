<?php

//create session
session_start();

//requires the Google Authenticator file
require '../includes/Authenticator.php';

//create new string
$authenticator = new Authenticator();

//make sure the QR Code stay the same on reload
//if(!isset($_SESSION['auth_secret'])) {
    
    //generate a random secret
    $secret =  $authenticator->generateRandomSecret(); 
    
    $_SESSION['auth_secret'] = $secret;
    
//}

//create a QRcode
$QRcode = $authenticator ->getQR( 'Linh Ta Portfolio',  $_SESSION['auth_secret'] );

//Sending an email containing the QRcode to the registered username
$to = $_SESSION[ 'tmpsuccess' ];

$subject = "QR Code";

$message = "<html><head><title>QR Code</title></head><body><img src='" . $QRcode . "' alt='Verify Code' /></body></html>";

mail($to, $subject, $message);

//if the QRCode equal to the code on Google Authenticator app
if (!isset($_SESSION['failed'])) {
    
    $_SESSION['failed'] = false;
    
}

?>

<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Time-Base Authentication based on Google Authenticator</title>
        
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <link href="../../css/bootstrap_authenticator.css" rel="stylesheet">
        
    </head>
    
    <body class="bg">
        
        <div class="container">
        
            <div class="row">
                
                <div class="col-md-6 offset-md-3" style="background: white; padding: 20px;box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.1); margin-top: 100px; border-radius: 10px;"> 
                <h1 class="text-center"> Time-Based Authentication </h1>

                    <p class="text-center"><i> A <b> QR code </b>will be sent to your registered email. Please download the <b>Google Authenticator</b> application to your mobile devices to scan the <b>QR code</b> !</i></p>
                    
                    <hr>
                     
                    <form action="check.php" method="post">
                        
                        <div style="text-align: center;">
                            
                            <!--- Alert-->
                               <?php if ($_SESSION['failed']): ?>
                            
                                    <div class="alert alert-danger" role="alert">
                                        
                                                <strong>Oops...!</strong> Invalid Code.
                                        
                                    </div>
                            
                                    <?php   
                            
                                        $_SESSION['failed'] = false;
                            
                                    ?>
                            
                                <?php endif ?>
                            
                            <input type="text" class="form-control" name="code" placeholder="******" >
                            
                            <br><br>
                            
                            <button type="submit" class="btn btn-md btn-primary">Verify</button>
                            
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