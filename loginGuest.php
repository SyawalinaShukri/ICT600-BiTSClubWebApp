<?php
session_start();

$currentPage = 'loginGuest.php';
include 'dbBits.php';


if (isset($_REQUEST['guest'])) {

    if (isset($_POST['guest_email']) && isset($_POST['guest_pass'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
 
		$guest_email = $_POST['guest_email'];
		$guest_pass = $_POST['guest_pass'];
 
     if (empty($guest_email)) {
		 header("Location: loginGuest.php?error=User Name is required");
         exit();
     }
     else if(empty($guest_pass)){
		 header("Location: loginGuest.php?error=User Password is required");
         exit();
     }
     else{

		$query="SELECT * FROM guest where guest_email='$guest_email' AND guest_pass='$guest_pass'" or die (mysqli_error());

		$result=mysqli_query($db, $query);


		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['guest_email'] === $guest_email && $row['guest_pass'] === $guest_pass) {
            	$_SESSION['guest_email'] = $row['guest_email'];
				$_SESSION['studentID'] = $row['studentID'];
            	$_SESSION['guest_name'] = $row['guest_name'];
            	header("Location: guesthome.php");
		        exit();
            }
            else{
				header("Location: loginGuest.php?error=Incorect User name or password");
		        exit();
			}
		}
        else{
			header("Location: loginGuest.php?error=Incorect User name or password");
	        exit();
		}
    }
}else{
	header("Location: loginGuest.php");
	exit();
}
}
?>

	
	<?php include "headerLogin.php";?>

		
<!-- ***** LogIn/SignUp Starts ***** -->
		 <div class="loginBox"> 
         <form action=""method="post">
 		
			 <div class="form-group text-center mt-4"><br>
			 <div class="pt-3 form outline mt-0">
            <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
				
				 <h3><strong>Guest Log In</strong>&nbsp;</h3><br>
			  <br><br><input type="email" class="col-sm-8 col-lg-5" id="email" name="guest_email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" style="border: 1px solid grey; height:45px; width:1000px;">
			</div>
			<div class="pt-3 form outline mt-0">
			 <br><input type="password" class="col-sm-8 col-lg-5"id="password" name="guest_pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" style="border: 1px solid grey; height:45px; width:1000px;" >
			</div>
	 </div>
			<div class="form-group text-center mt-4">
			 <p align="center">
				<div class="main-button">
				 <button type="submit" class="btn btn-block btn-primary"  name="guest" id="login" class="login" value="Login" style="height:40px; width:500px; margin-left: auto; margin-right:auto;  margin-top:3%" >Login</button>
                </div>
			</p>
          
				<br><br><br> <p>"Don't have an account? "</p>
				<li><a href="SignupGuest.php">Sign Up</a></li>
                
                <br><p>"Log in as member? "</p>
				<li><a href="loginMember.php">Member Login</a></li>
				
				 <br><p>"Log in as admin? "</p>
				<li><a href="loginAdmin.php">Admin Login</a></li>
				</div>
			</div>
        </form>
    </div>
	
				
<!-- ***** LogIn/SignUp Ends ***** -->
	
   <?php include "footerAdmin.php";?>