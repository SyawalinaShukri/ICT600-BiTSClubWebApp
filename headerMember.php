<!DOCTYPE html>
<html lang="en">

<?php	
	
	
    include "dbBits.php";
	$mbr_name= $_SESSION['mbr_name'];
	$member_id= $_SESSION['member_id'];
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
					    <a href="#" class="logo"> <em> Bits </em> CLUB</a>
					    <!-- ***** Logo End ***** -->
					  
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a class="<?php if($currentPage =='homemember.php'){echo 'active';}?>" href="homemember.php">Home</a></li>
							<li><a class="<?php if($currentPage =='aboutusmember.php'){echo 'active';}?>" href="aboutusmember.php">About Us</a></li>
							<li><a class="<?php if($currentPage =='profileMemberRead.php'){echo 'active';}?>" href="profileMemberRead.php" class="active">Profile</a></li>
							<li style="float: right;"><a href="logoutMember.php">Logout</a></li>
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
				            
				<h5 style='color:darkgrey;' >"Welcome <b class="mbr_name"><?php echo $mbr_name; ?>, the Member of Bachelor in IT Society (BITS) Session 2021 2022"</h5><br>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
	
</body>
</html>
	
	