<!DOCTYPE html>
<html lang="en">
<?php
     include "dbBits.php";
	$admin= $_SESSION['admin_name'];
    $id= $_SESSION['admin_id'];
	$post= $_SESSION['admin_position'];
 
    
    
?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	 <title>BiTS</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
	
	<style>
		p.main {
  			text-align: justify;
			}	
		table, th, td{ 
			border: 1px solid black;
			}
			
	 input[type=text] {
			padding: 5px;
			border: 2px solid #cccccc;
			-webkit-border-radius: 5px;
			border-radius: 5px;
		  }
      input[type=text]:focus {
			border-color: #33333;
		  }
      input.a[type=submit]{
			padding: 5px 15px;
			background: #99e0b2;
			border: 0 none;
			cursor: pointer;
			-webkit-border-radius: 5px;
			border-radius: 5px;
			}
		input.b[type=submit]{
			padding: 5px 15px;
			background: #ff6666;
			border: 0 none;
			cursor: pointer;
			-webkit-border-radius: 5px;
			border-radius: 5px;
			}
	</style>
	
	
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
					  <a href="index.html" class="logo"> <em> Bits </em> CLUB</a>
					  <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a class="<?php if($currentPage =='homeAdmin.php'){echo 'active';}?>" href="homeAdmin.php">Home</a></li>
							<li><a class="<?php if($currentPage =='admin.php'){echo 'active';}?>" href="admin.php">Admin</a></li>
							<li><a class="<?php if($currentPage =='members.php'){echo 'active';}?>" href="members.php">Members</a></li>
                            <li><a class="<?php if($currentPage =='applicants.php'){echo 'active';}?>" href="applicants.php">Applicants</a></li>
							<li><a class="<?php if($currentPage =='aboutAdmin.php'){echo 'active';}?>" href="aboutAdmin.php">About Us</a></li>
							<li style="float: right;"><a href="logoutAdmin.php">Logout</a></li>
							
							
                    </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
	
	<!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/BiTSHEADER.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
	             <h2>FSKM <em> BiTS CLUB </em></h2>
				 
              
				<h5 style='color:darkgrey;' >"Welcome <b class="admin_name"><?php echo $admin; ?>, the <b class="admin_position"><?php echo $post; ?> of Bachelor in IT Sosciety (BITS) Session 2021 2022"</h5><br>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->