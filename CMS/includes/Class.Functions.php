<?php

    //create function class
	class Functions 
	{
        //Construct Function
		function __construct( ) {
			
            //Includes the php that contains the connection to the database
			include ( "Config.php" );
			
			$this->_db = $db;
			
		}
		
        //Log in function
		public function login()
		{
			
			//variable to store error message
			global $error;
            
            //if the summit button is pressed
			if ( isset( $_POST[ 'submit' ] ) ) 
			{
                //if username or password is not correct
				if ( empty( $_POST[ 'username' ] ) || empty( $_POST[ 'password' ] ) ) 
				{
                    
                  //create this error  
					$error = "Username or Password is invalid"; 
                    
                    //if username or password is correct
				} else {   
                    
                    //collect form data with POST method
					$username = $_POST[ 'username' ]; 
					
					$password = $_POST[ 'password' ]; 
                    
                    //Un-quotes the quoted string
					$username = stripslashes( $username );
					
					$password = stripslashes( $password );
					
					try {
					
                        //select data from the table in the database
						$query = $this->_db->prepare( "SELECT * FROM login WHERE username=:username" );
                        
                        //Binds a parameter to the specified variable name
						$query->bindParam( ":username", $username, PDO::PARAM_STR );
                        
                        //carry out the query
						$query->execute();
					
                    //catch an error raised by PDO.
					} catch ( PDOException $e ) {

						echo $e->getMessage();

					}
					
                    //fetch data
					$row = $query->fetch();

					if ( $row ) 
					{
                        //if the password is correct
						if ( password_verify( $password, $row[ 'password' ] ) )
						{

							$_SESSION[ 'tmpsuccess' ] = $username;

							//redirecting to admin page
							header( "location: authenticator.php" );
                            
                         //if the password is incorrect
						} else {

							$error = "Password is invalid"; 

						}

					} else {

						$error = "Username is invalid"; 

					}

				}

			}
			
		}
		
        //Check if the user is logged in function
		public function checkLoggedIn()
		{
			
			try {
			 
				$query = $this->_db->prepare( "SELECT username FROM login WHERE username=:username" );
                
              
				$query->bindParam( ":username", $_SESSION[ 'username' ], PDO::PARAM_STR );

				$query->execute();
			
			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}

			$row = $query->fetch();
			
           
			$loggedInUser = $row[ 'username' ];
            
             //if the user is not logged in
			if( !isset( $loggedInUser ) )
			{
                //head to the log in page
				header( 'Location: login.php' );

			}
			
		}
        
        //Add post function
        public function addUser()
            
		{
                    global $error; 

                    if( isset( $_POST[ "register" ] ) )

                    {
                        //Un-quotes the quoted string. Applies the callback to the elements of the given arrays
                        $_POST = array_map( 'stripslashes', $_POST );

                        //collect form data
                        extract( $_POST );

                        // basic validation

                        if( $firstname =='' ){

                            $error[] = 'Please enter the firstname.';

                        }    

                        if( $lastname =='' ){

                            $error[] = 'Please enter the lastname.';

                        }

                        if( $username =='' ){

                            $error[] = 'Please enter the username.';

                        }

                        if( $password =='' ){

                            $error[] = 'Please enter the password.';

                        }

                        if( !isset( $error ) ){

                        $firstname = $_POST[ 'firstname' ];

                        $lastname = $_POST[ 'lastname' ];    

                        $username = $_POST[ 'username' ];
                            
                        //creates a new password hash using bcrypt algorithm   
                        $password = password_hash(  $_POST[ 'password' ],PASSWORD_DEFAULT );

                        try {

                            $query = $this->_db->prepare( "INSERT INTO login ( firstname, lastname, username, password ) VALUES ( :firstname, :lastname, :username, :password )" );

                            $query->bindParam( ":firstname", $firstname, PDO::PARAM_STR );

                            $query->bindParam( ":lastname", $lastname, PDO::PARAM_STR );

                            $query->bindParam( ":username", $username, PDO::PARAM_STR );

                            $query->bindParam( ":password", $password, PDO::PARAM_STR );

                            $query->execute();

                            if ($query){

                            //redirect to register page
                            header('Location: ../cms/register.php?action=added');

                            exit;

                            }

                        } catch ( PDOException $e ) {

                            echo $e->getMessage();

                        }

                }

            }
            
        }
        
        //Collect and display all post function
		public function getAllPosts( $term )
		{
			// if a keyword is searched
			if( isset( $_POST[ "term" ] ) )
			{
				try {
                    //get the post that has the keyword in the title or description
					$query = $this->_db->prepare( "SELECT post_id, post_title, post_description, post_date FROM blog_posts WHERE post_title OR post_description LIKE :term ORDER BY post_id DESC" );

					$query->bindParam( ":term", $term, PDO::PARAM_STR );

					$query->execute();

				} catch ( PDOException $e ) {

					echo $e->getMessage();

				}

			} else {

				try{

					$query = $this->_db->query( "SELECT post_id, post_title, post_description, post_date FROM blog_posts ORDER BY post_id DESC" );

				} catch ( PDOException $e ) {

					echo $e->getMessage();

				}

			}

			return $query;
			
		}
        
		//get post by an ID function
		function getPostByID( $postID )
		{
			
			try {

				$query = $this->_db->prepare( "SELECT post_id, post_title, post_description, post_content, post_date FROM blog_posts WHERE post_id = :postID" );

				$query->bindParam( ':postID', $postID, PDO::PARAM_INT );

				$query->execute();

				$row = $query->fetch();

				if( $row[ "post_id" ] == "") 
				{

					header( "Location: index.php" );

					exit;

				} else {
					
					return $row;
					
				}

			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}
			
		}
		
        //add a new post function
		public function addPost()
		{
			
			global $error;
			
			//if form has been submitted process it
			if( isset( $_POST[ 'add' ] ) )
			{

				$_POST = array_map( 'stripslashes', $_POST );

				//collect form data
				extract( $_POST );

				// basic validation
				if( $postTitle =='' ){

					$error[] = 'Please enter the title.';

				}

				if( $postDescription =='' ){

					$error[] = 'Please enter the description.';

				}

				if( $postContent =='' ){

					$error[] = 'Please enter the content.';

				}

				if( !isset( $error ) ){

					try {

						//insert into database
						$query = $this->_db->prepare( 'INSERT INTO blog_posts (post_title, post_description, post_content, post_date) VALUES (:postTitle, :postDescription, :postContent, :postDate)' );

						$query->execute( array(
							':postTitle' => $postTitle,
							':postDescription' => $postDescription,
							':postContent' => $postContent,
							':postDate' => date( 'Y-m-d H:i:s' )
						));

						//redirect to manage page
						header('Location: ../cms/manage_blog.php?action=added');

						exit;

					} catch( PDOException $e ) {

						echo $e->getMessage();

					}

				}

			}
			
		}
		
        //edit a new post function
		public function editPost()
		{
			
			global $error;
			
			//if form has been submitted process it
			if( isset( $_POST[ 'edit' ] ) )
			{

				$_POST = array_map( 'stripslashes', $_POST );

				//collect form data
				extract( $_POST );

				//very basic validation
				if( $postTitle =='' ){

					$error[] = 'Please enter the title.';

				}

				if( $postDescription =='' ){

					$error[] = 'Please enter the description.';

				}

				if( $postContent =='' ){

					$error[] = 'Please enter the content.';

				}

				if( !isset( $error ) ){

					try {
				        //Prepares a statement for execution and returns a statement object
						$query = $this->_db->prepare( 'UPDATE blog_posts SET post_title=:postTitle, post_description=:postDescription, post_content=:postContent, post_date=:postDate WHERE post_id=:postID' );
                        
						//Binds parameter to variable names
						$query->bindParam( ':postID', $postID, PDO::PARAM_INT );
						$query->bindParam( ':postTitle', $postTitle, PDO::PARAM_STR );
						$query->bindParam( ':postDescription', $postDescription, PDO::PARAM_STR );
						$query->bindParam( ':postContent', $postContent, PDO::PARAM_STR );
						$query->bindParam( ':postDate', date( 'Y-m-d H:i:s' ) );

                        //Execute statement
						$query->execute();

						//redirect to manage page
						header('Location: ../cms/manage_blog.php?action=added');

						exit;
                        
                        //Catch an error raised by PDO  and gets the exception message    
					} catch( PDOException $e ) {

						echo $e->getMessage();

					}

				}

			}
			
		}
    
    //delete a post by its ID function
	function deletePostByID( $postID )
		{
			
			try {
                //Create delete function
				$query = $this->_db->prepare( "DELETE FROM blog_posts WHERE post_id = :postID" );

				$query->bindParam( ':postID', $postID, PDO::PARAM_INT );

				$query->execute();

				//header( "Location: manage.php" );

			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}
			
		}
      
     //upload a file function
      function doImageUpload()
		{
			//if the upload button is clicked
			if( isset( $_POST[ "imageUploadButton" ] ) )
			{
				
				$error = array();
				
                //upload image into the upload folder root to store the image
				$uploadFolder = "../uploads/";
				
                // for each error-> notify as a upload status
				foreach( $_FILES[ "images" ][ "error" ] as $key => $status )
				{
					// if a file is uploaded
					if ( $status == UPLOAD_ERR_OK )
					{
						
						$uploadOk = 1;
						
                        //get the name of the file
						$name = $_FILES[ "images" ][ "name" ][ $key ];
                        
						$pathToUpload = $uploadFolder . basename ( $name );
						
                        //get the extension type of the file
						$fileType = pathinfo( $pathToUpload, PATHINFO_EXTENSION );
						
                        // get the size of the file image
						$checkIfItIsAnImage = getimagesize( $_FILES[ "images" ][ "tmp_name" ][ $key ] );
						
                        //create an error
						$error[ "filename" ] = basename ( $name );
						
                        //if the file is not an image file
						if ( !$checkIfItIsAnImage )
						{
							//create error message
							$errorMessage = "Sorry - " . basename ( $name ) . " was not an image.";
							
							$error[ "error" ][] = $errorMessage;
                            
                            //file cannot be uploaded
							$uploadOk = 0;

						}
                        
						//if the file already existed/uploaded
						if ( file_exists ( $pathToUpload ) )			
						{
							//create error message
							$errorMessage = "Sorry - file " . basename ( $name ) . " already exists.";
							
							$error[ "error" ][] = $errorMessage;
                            
							//file cannot be uploaded
							$uploadOk = 0;

						}
                        
						//if the size of the image is not applicable
						if ( $_FILES[ "images" ][ "size" ][ $key ] > 1000000)
						{
                            //create error message
							$errorMessage = "Sorry - your file " . basename( $name ) . " is too large.";
							
							$error[ "error" ][] = $errorMessage;
                            
							//file cannot be uploaded
							$uploadOk = 0;

						}
                        
						//if the file type is not JPG, PNG, JPEG or GIF
						if( $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" )
						{
                            //create error message
							$errorMessage = "Sorry - only JPG, JPEG, PNG and GIF files are allowed.";
							
							$error[ "error" ][] = $errorMessage;
                            
                            //file cannot be uploaded
							$uploadOk = 0;

						}
						
                        //if the file is not uploaded
						if( !$uploadOk )
						{
                            //create error message
							$errorMessage = "Sorry - your file " . basename ( $name ) . " was not uploaded.";
							
							$error[ "error" ][] = $errorMessage;
							
							return $error;

						} else {
							// if the file is moved to the upload folder
							if( move_uploaded_file( $_FILES[ "images" ][ "tmp_name" ][ $key ], $uploadFolder . $name ) ) 
							{
								//check if it is a profile picture
								if( $_POST[ "isProfile" ] )
								{					
                                    //set the file name to be the name of the image
									$profileFilename = $name;
                                    
                                    //update to the table in the database
									$query = $this->_db->prepare( 'UPDATE settings SET settings_value=:settingsValue WHERE settings_key="profile_picture"' );

									$query->bindParam( ':settingsValue', $profileFilename, PDO::PARAM_STR );

									$query->execute();
                                    
                                    // creat an error message when profile picture is uploaded
									$errorMessage = "Profile picture " . basename ( $name ) . " has been uploaded and updated.";

									$error[ "error" ][] = $errorMessage;

									$error[ "success" ] = true;
									
								} else {
                                    
								    //collect form data with POST method
									$imageTitle = $_POST[ "imageTitleInput" ];

									$imageDescription = $_POST[ "imageDescriptionInput" ];
                                    
                                    $imageContent = $_POST ["imageContentInput"];

									$imageFilename = $name;

									//insert into database
									$query = $this->_db->prepare( 'INSERT INTO media ( media_title, media_description, media_content, media_filename) VALUES ( :imageTitle, :imageDescription, :imageContent, :imageFilename)' );
                                    
                                    //execute the statement
									$query->execute( array(
										':imageTitle' => $imageTitle,
										':imageDescription' => $imageDescription,
                                        ':imageContent' => $imageContent,
										':imageFilename' => $imageFilename
									));
                                    // error message when upload is successful
									$errorMessage = "The file " . basename ( $name ) . " has been uploaded.";

									$error[ "error" ][] = $errorMessage;

									$error[ "success" ] = true;
									
								}

							} else {					
								// error message when upload is failed
								$errorMessage = "Sorry - there was error uploading your file.";
								
								$error[ "success" ] = false;

							}
							
							return $error;
													
						}
						
					}
					
				}
				
			}	
			
		}
		
        //get profile picture function
		function getAllSettings()
		{
			
			try{

				$query = $this->_db->prepare( "SELECT * FROM settings" );

				$query->execute();

				$data = $query->fetchAll();
				
				foreach( $data as $setting )
				{
				
					$settings[ $setting[ "settings_key" ] ] = $setting[ "settings_value" ];
					
				}
				
				return $settings;

			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}
			
		}
		
        //get all media function
		function getAllMedia() 
		{
			
			try{

				$query = $this->_db->prepare( "SELECT * FROM media ORDER BY media_date DESC" );

				$query->execute();

				$data = $query->fetchAll();
				
				return $data;

			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}
			
		}
        
		 //delete media by each ID function
		function deleteMediaByID( $mediaID )
		{
			
			try {
				
				$query = $this->_db->prepare( "SELECT media_filename FROM media WHERE media_id = :mediaID" );

				$query->bindParam( ':mediaID', $mediaID, PDO::PARAM_INT );

				$query->execute();

				$media = $query->fetch();
			
				$query = $this->_db->prepare( "DELETE FROM media WHERE media_id = :mediaID" );

				$query->bindParam( ':mediaID', $mediaID, PDO::PARAM_INT );

				$query->execute();
                
				//unlink from the upload foldrer
				unlink(  "../uploads/" . $media[ "media_filename" ] );

                
			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}
			
		}
        
         //get media by each ID function
        function getMediaByID( $mediaID )
		{
			
			try {

				$query = $this->_db->prepare( "SELECT media_id, media_title, media_description, media_content, media_filename, media_date FROM media WHERE media_id = :mediaID" );

				$query->bindParam( ':mediaID', $mediaID, PDO::PARAM_INT );

				$query->execute();

				$row = $query->fetch();

				if( $row[ "media_id" ] == "") 
				{

					header( "Location:manage_file-upload.php" );

					exit;

				} else {
					
					return $row;
					
				}

			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}
			
		}
        
        //edit media function
        function editMedia()
		{
			
			global $error;
			
			//if form has been submitted process it
			if( isset( $_POST[ 'edit' ] ) )
			{

				$_POST = array_map( 'stripslashes', $_POST );

				//collect form data
				extract( $_POST );

				//very basic validation
				if( $mediaTitle =='' ){

					$error[] = 'Please enter the title.';

				}

				if( $mediaDescription =='' ){

					$error[] = 'Please enter the description.';

				}

				if( $mediaContent =='' ){

					$error[] = 'Please enter the content.';

				}

				if( !isset( $error ) ){

					try {
				        //Prepares a statement for execution and returns a statement object
						$query = $this->_db->prepare( 'UPDATE media SET media_title=:mediaTitle, media_description=:mediaDescription, media_content=:mediaContent, media_date=:mediaDate WHERE media_id=:mediaID' );
                        
						//Binds parameter to variable names
						$query->bindParam( ':mediaID', $mediaID, PDO::PARAM_INT );
						$query->bindParam( ':mediaTitle', $mediaTitle, PDO::PARAM_STR );
						$query->bindParam( ':mediaDescription', $mediaDescription, PDO::PARAM_STR );
						$query->bindParam( ':mediaContent', $mediaContent, PDO::PARAM_STR );
						$query->bindParam( ':mediaDate', date( 'Y-m-d H:i:s' ) );

                        //Execute statement
						$query->execute();

						//redirect to manage page
						header('Location: ../cms/manage_portfolio.php?action=added');

						exit;
                        
                        //Catch an error raised by PDO  and gets the exception message    
					} catch( PDOException $e ) {

						echo $e->getMessage();

					}

				}

			}
			
		}
        
        //add a new contact function
        public function addContact()
    
		{
			
			global $error;
			
			//if form has been submitted process it
			if( isset( $_POST[ 'add' ] ) )
			{

				$_POST = array_map( 'stripslashes', $_POST );

				//collect form data
				extract( $_POST );

				// basic validation
				if( $contactName =='' ){

					$error[] = 'Please enter the name.';

				}

				if( $contactPhone =='' ){

					$error[] = 'Please enter the phone number.';

				}

				if( $contactEmail =='' ){

					$error[] = 'Please enter the email.';

				}
                
                if( $contactMessage =='' ){

					$error[] = 'Please enter the message.';

				}

				if( !isset( $error ) ){

					try {

						//insert into database
						$query = $this->_db->prepare( 'INSERT INTO contacts (contact_name, contact_phone, contact_email, contact_message, contact_date) VALUES (:contactName, :contactPhone, :contactEmail, :contactMessage, :contactDate)' );

						$query->execute( array(
							':contactName' => $contactName,
							':contactPhone' => $contactPhone,
							':contactEmail' => $contactEmail,
                            ':contactMessage' => $contactMessage,
							':contactDate' => date( 'Y-m-d H:i:s' )
						));

						//redirect to thank you page
						header('location: ./cms/thankyou.php?');

						exit;

					} catch( PDOException $e ) {

						echo $e->getMessage();

					}

				}

			}
			
		}
        
        //get all contacts function
        function getAllContact() 
		{
			
			try{

				$query = $this->_db->prepare( "SELECT * FROM contacts ORDER BY contact_date DESC" );

				$query->execute();

				$data = $query->fetchAll();
				
				return $data;

			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}
			
		}
        
        //get contact by each ID funtion
          function getContactByID( $contactID )
		{
			
			try {

				$query = $this->_db->prepare( "SELECT contact_id, contact_name, contact_phone, contact_email, contact_message, contact_date FROM contacts WHERE contact_id = :contactID" );

				$query->bindParam( ':contactID', $contactID, PDO::PARAM_INT );

				$query->execute();

				$row = $query->fetch();

				if( $row[ "contact_id" ] == "") 
				{

					header( "Location:manage.php" );

					exit;

				} else {
					
					return $row;
					
				}

			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}
			
		}
        
        //edit contact function
        function editContact()
		{
			
			global $error;
			
			//if form has been submitted process it
			if( isset( $_POST[ 'edit' ] ) )
			{

				$_POST = array_map( 'stripslashes', $_POST );

				//collect form data
				extract( $_POST );

				/// basic validation
				if( $contactName =='' ){

					$error[] = 'Please enter the title.';

				}

				if( $contactPhone =='' ){

					$error[] = 'Please enter the description.';

				}

				if( $contactEmail =='' ){

					$error[] = 'Please enter the content.';

				}
                
                if( $contactMessage =='' ){

					$error[] = 'Please enter the content.';

				}

				if( !isset( $error ) ){

					try {
				        //Prepares a statement for execution and returns a statement object
						$query = $this->_db->prepare( 'UPDATE contacts SET contact_name=:contactName, contact_email=:contactEmail, contact_phone=:contactPhone, contact_message=:contactMessage, contact_date=:contactDate WHERE contact_id=:contactID' );
                        
						//Binds parameter to variable names
						$query->bindParam( ':contactID', $contactID, PDO::PARAM_INT );
						$query->bindParam( ':contactName', $contactName, PDO::PARAM_STR );
						$query->bindParam( ':contactEmail', $contactEmail, PDO::PARAM_STR );
						$query->bindParam( ':contactPhone', $contactPhone, PDO::PARAM_STR );
                        $query->bindParam( ':contactMessage', $contactMessage, PDO::PARAM_STR );
						$query->bindParam( ':contactDate', date( 'Y-m-d H:i:s' ) );

                        //Execute statement
						$query->execute();

						//redirect to manage page
						header('Location: ../cms/manage_contact.php?action=added');

						exit;
                        
                        //Catch an error raised by PDO  and gets the exception message    
					} catch( PDOException $e ) {

						echo $e->getMessage();

					}

				}

			}
			
		}
        
        //delete a contact by an ID function
        function deleteContactByID( $contactID )
		{
			
			try {
                //Create delete function
				$query = $this->_db->prepare( "DELETE FROM contacts WHERE contact_id = :contactID" );

				$query->bindParam( ':contactID', $contactID, PDO::PARAM_INT );

				$query->execute();

				//header( "Location: manage.php" );

			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}
			
		}
        	    
	}

?>