<?php 
    //include the Function file
	include( '../includes/Class.Functions.php' );
    
    //set new Function
	$fn = new Functions();
    
    //call function to check if user is logged in or not
	$fn->checkLoggedIn();
    
    //call function to delete post by ID
	$fn->deletePostByID( $_GET[ "id" ] );

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Post Deleted</title>
</head>

<body>
</body>
</html>