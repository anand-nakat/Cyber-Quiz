<?php
session_start();
if(isset($_SESSION['test-submitted']))
    {
        unset($_SESSION['test-submitted']);
    }

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Quizxx</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
</head>

<body>

    <!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">
                	<span class="glyphicon glyphicon-fire"></span> 
                	Quizxx
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>
                    <?php
                        if(!isset($_SESSION['login']))
                        {
                    ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="signup.php">Signup</a>
                        </li>
                    <?php
                        }
                        else{
                            echo'  
                            <li>
                                <a href="attempt history.php">Attempt History</a>
                            </li>
                            <li>
                                <a href="logout.php">Logout</a>
                            </li>';
                        }
                    ?>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

	<!-- Header -->
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h2>Bright emotions, happy audiences & Quizxx</h2>
                <p>During this time use Quizxx for distance learning
                </p>
                <a href="#main" class="btn btn-primary btn-lg">Get Started</a>
            </div>
        </div>
    </header>

	


    <!-- Promos -->
	<div class="container-fluid" id="main">
        <div class="row promo">
                <div class="col-md-6 promo-item item-1">
                    <h3>DBMS</h3>
                   <form method="POST" style="visibility:hidden" action="validate_topic.php">
                        <input type="hidden" name="topic" value="DBMS">
                   </form>
                </div>
               
				<div class="col-md-6 promo-item item-2">
                   <form method="POST" style="visibility:hidden" action="validate_topic.php">
                      <input type="hidden" name="topic" value="OS">
                   </form>
				</div>
           
				<div class="col-md-6 promo-item item-3">
                    <h3>NETWORKING</h3>	
                    <form method="POST" style="visibility:hidden" action="validate_topic.php">
                        <input type="hidden" name="topic" value="networking">
                    </form>
				</div>
            
				<div class="col-md-6 promo-item item-4">
					<form method="POST" style="visibility:hidden" action="validate_topic.php">
                        <input type="hidden" name="topic" value="c++">
                    </form>
				</div>
            
				<div class="col-md-6 promo-item item-5">
                    <form method="POST" style="visibility:hidden" action="validate_topic.php">
                        <input type="hidden" name="topic" value="java">
                     </form>
				</div>
        
				<div class="col-md-6 promo-item item-6">
                    <form method="POST" style="visibility:hidden" action="topic.php">
                        <input type="hidden" name="topic" value="python">	
                    </form>
				</div>
         </div>
    </div><!-- /.container-fluid -->


   

    	<!-- Content 2 -->
        <section class="content content-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="section-heading">Engage everyone,
                            everywhere</h2>
                        <p class="text-light">Bring people together (apart) with live quizzes and polls.</p>
                        <p class="text-light">Students ALWAYS see questions on their own screen.</p>
                        <p class="text-light">Build community and keep everyone engaged—even if you’re not in the same place!.</p>
    
                        <a href="#" class="btn btn-default btn-lg">Test It</a>
                    </div>    
                    <div class="col-sm-6">
                        <img class="img-responsive img-circle center-block" src="images/iphone.jpg" alt="">
                    </div>            
                    
                </div>
            </div>
        </section>    

	<!-- Content 3 -->
     <section class="content content-3" id="contact">
        <div class="container">
            <h2 class="section-heading">Contact Us</h2>
            <p><span class="glyphicon glyphicon-earphone"></span><br> +91 99456 77890</p>
            <p><span class="glyphicon glyphicon-envelope"></span><br> hitman45@gmail.com</p>            
            </div>
        </div>
    </section>
    
	<!-- Footer -->
    <footer class="page-footer">
    
    
        	
        <!-- Copyright etc -->
        
        		<p>Copyright &copy; CyberQuiz 20</p>
        
        
    </footer>

    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    
    <!-- Custom Javascript -->
    <script src="js/custom.js"></script>
    <script>
        $(".promo-item").click( function(){
            console.log("clic");
            $(this).find("form").submit();
        })
    </script>

</body>

</html>
