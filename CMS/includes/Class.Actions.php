<?php

// Delete post Function AJAX

	include( 'Class.Functions.php' );

	$fn = new Functions();

// if the deletePost function exists
	if( isset( $_POST[ "deletePost" ] ) )
	{
		// perform deletePost function with the datas sent across
		$fn->deletePostByID( $_POST[ "id" ] );
		
		echo "Post Deleted";
		
	}
    // if the deletePost function exists
	if( isset( $_POST[ "deleteMedia" ] ) )
	{
		// perform deletePost function with the datas sent across
		$fn->deleteMediaByID( $_POST[ "id" ] );
		
		echo "Media Deleted";
		
	}
    // if the deletePost function exists
    if( isset( $_POST[ "deleteContact" ] ) )
	{
		// perform deletePost function with the datas sent across
		$fn->deleteContactByID( $_POST[ "id" ] );
		
		echo "Contact Deleted";
		
	}

?>