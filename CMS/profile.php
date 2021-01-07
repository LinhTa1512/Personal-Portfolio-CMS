<?php
    //include the Function file
	include( 'includes/Class.Functions.php' );
    
   //set new function
	$fn = new Functions();

	$term = "";

    //call function 
    $settings = $fn ->getAllSettings();

?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <meta charset="utf-8" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
        <meta name="description" content="" />
        
        <meta name="author" content="" />
        
        <title>Profile Page</title>
        
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/bootstrap_profile.css" rel="stylesheet" />
        
    </head>
    
    <body id="page-top">
        
        <!-- Navigation-->
    
            <div class="container">
                
              <header class="nav mb-auto text-center">

                    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
              
                             <div class="inner">

                              <h3 class="nav-brand">Linh Ta.</h3>

                                  <nav class="nav nav-masthead justify-content-center">

                                    <a class="nav-link active" href="index.php">Home</a>

                                    <a class="nav-link" href="#">Profile</a>

                                    <a class="nav-link active" href="view-all-posts.php">Blog</a>
                                      
                                    <a class="nav-link active " href="contacts.php">Contact</a>    

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
                  
             </div>  


        <!-- Masthead-->
        <header class="masthead">
            
            <div class="container h-100">
                
                <div class="row h-100 align-items-center justify-content-center text-center">
                    
                    <div class="col-lg-10 align-self-end">
                        
                        <img src="uploads/<?php echo $settings["profile_picture"] ?>" class="profilePicture" focusable="false" role="img" alt="Profile Picture"/>
                        
                        <h1 class="text-uppercase text-white font-weight-bold">Linh Ta</h1>
                        
                        <hr class="divider my-4" />
                    </div>
                    
                    <div class="col-lg-8 align-self-baseline">
                        
                        <p class="text-white mb-5">Web Designer - Web Developer</p>
                        
                        <a class="btn btn-primary btn-xl " href="#about">Find Out More</a>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </header>
                  
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            
            <div class="container">
                
                <div class="row justify-content-center">
                    
                    <div class="col-lg-8 text-center">
                        
                        <h2 class="text-white mt-0">ABOUT</h2>
                        
                        <hr class="divider light my-4" />
                        
                        <p class="text-white mb-4">I am an aspiring web multimedia developer with a variety of software skills as well as design skills. My goal as a web designer /developer is to perfect every product of mine with passion</p>
                        
                        <a class="btn btn-light btn-xl" href="https://drive.google.com/file/d/1eplly888SQgZYPE30XQTvWT1kNwa-qCL/view">My CV</a>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </section>
                  
          <!-- Portfolio-->
        <section class="page-section bg-secondary text-white">
            
            <div class="container text-center">
                
                <h2 class="mb-4">My Portfolio</h2>
                
                <p class="text-white mb-4">This is a collection of my works as a web designer / developer.</p>
                
                <a class="btn btn-light btn-xl" href="view-all-portfolios.php">See More</a>
                
            </div>
            
        </section> 

<!--Call the media function to get each media post in a for each loop-->
                <?php

                        try {

                            $queryMedia = $fn->getAllMedia();

                            foreach ( $queryMedia as $media )
                            {

                    ?>  
                
          <div class=" media-display bg-secondary">        
              
                <div class="col-lg-4" style="float: left; margin-top:0,5rem; margin-bottom:2rem;">   
                    
                    <a href="view-portfolio.php?id=<?php echo $media[ "media_id"]; ?>">
                        
                        <div id="media-<?php echo $media[ "media_id" ]; ?>">
                            
                             <figure class="caption-3">
                                 
                                    <img src="uploads/<?php echo $media["media_filename"]; ?>"class="image" id="image" focusable="false" role="img" aria-label="<?php echo $media["media_title"] ?>"/>
                                 
                                    <figcaption class="px-5 py-3 bg-white shadow-sm">
                                        
                                          <h2 class="h5 mb-1 font-weight-bold font-italic" href=""><?php echo $media[ "media_title" ]; ?></h2>
                                        
                                          <p class="mb-0 text-small font-italic"><?php echo $media[ "media_description" ]; ?></p>
                                        
                                    </figcaption>
                                 
                          </figure>
                            
                        </div>
                        
                     </a>
                    
                </div>
                  
                      <!--Catch an error raised by PDO  and gets the exception message-->
                    <?php

                            }

                        } catch ( PDOException $e ) {

                                echo $e->getMessage();

                        }

                    ?>
             </div>  
                  
        <!-- Contact-->
        <section class="page-section bg-primary" id="contact" style="clear: both;">
            
            <div class="container">
                
                <div class="row justify-content-center">
                    
                    <div class="col-lg-8 text-center">
                        
                        <h2 class=" text-white mt-0">Let's Get In Touch!</h2>
                        
                        <hr class="divider my-4" />
                        
                        <p class="text-white mb-5"> Get in touch to know more about me and what I can offer! Or leave your contact here for further interactions</p>
                        
                        <a class="btn btn-light btn-xl" href="contacts.php">Contact</a>
                        
                    </div>
                    
                </div>
                
                </br>
            
                <div class="row">
                    
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        
                        <i class="fas fa-phone fa-3x mb-3 text-white"></i>
                        
                        <div class="phonenum text-white">+1 (555) 123-4567</div>
                        
                    </div>
                    
                    <div class="col-lg-4 mr-auto text-center">
                        
                        <i class="fas fa-envelope fa-3x mb-3 text-white"></i>
                        
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block text-white" href="mailto:contact@yourwebsite.com">linhta.work@gmail.com</a>
                        
                    </div>
                    
                    <div class="col-lg-7 mx-auto text-center">
            
                        <!-- Facebook-->
                        <li class="list-inline-item"><a href="https://www.facebook.com/" class="social-link social-facebook "><i class="fab fa-facebook fa-3x"></i></a></li>
                        <!-- Behance-->
                        <li class="list-inline-item"><a href="https://www.behance.net/" class="social-link social-behance"><i class="fab fa-behance fa-3x"></i></a></li>
                    
                        <!-- Github-->
                        <li class="list-inline-item "><a href="https://github.com/" class="social-link social-github"><i class="fab fa-github fa-3x"></i></a></li>
                        
                    <!-- Instagram-->
                        <li class="list-inline-item "><a href="https://www.instagram.com/" class="social-link social-instagram"><i class="fab fa-instagram fa-3x"></i></a></li>
            
                      </div>
                    
                </div>
            
            </div>
                
        </section>
        
        <!-- Footer-->
        <footer class="bg-light py-5">
            
            <div class="container text-center">
                
                <div class="small text-center text-muted">Linh Ta © </div>
                
                <a href="#" class="small text-center text-muted font-italic" style="padding-top: 5px;">Back to top</a>
                
            </div>
            
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        
        <!-- Core theme JS-->
        <script src="scripts.js"></script>
        
    </body>
    
</html>
