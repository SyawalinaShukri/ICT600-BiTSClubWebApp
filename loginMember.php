<?php
session_start();
$currentPage = 'loginGuest.php';
include 'dbBits.php';


if (isset($_REQUEST['member'])) {

    if (isset($_POST['mbr_email']) && isset($_POST['mbr_pass'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
 
		$mbr_email = $_POST['mbr_email'];
		$mbr_pass = $_POST['mbr_pass'];
 
     if (empty($mbr_email)) {
		 header("Location: loginMember.php?error=User Name is required");
         exit();
     }
     else if(empty($mbr_pass)){
		 header("Location: loginMember.php?error=User Password is required");
         exit();
     }
     else{

		$query="SELECT * FROM member_approval where mbr_email='$mbr_email' AND mbr_pass='$mbr_pass' AND mbr_approval='Approved' " or die (mysqli_error());

		$result=mysqli_query($db, $query);


		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['mbr_email'] === $mbr_email && $row['mbr_pass'] === $mbr_pass) {
            	$_SESSION['mbr_email'] = $row['mbr_email'];
				$_SESSION['member_id'] = $row['member_id'];
            	$_SESSION['mbr_name'] = $row['mbr_name'];
            	header("Location: homemember.php");
		        exit();
            }
            else{
				header("Location: loginMember.php?error=Incorect User name or password");
		        exit();
			}
		}
        else{
			header("Location: loginMember.php?error=Incorect User name or password");
	        exit();
		}
    }
}else{
	header("Location: loginMember.php");
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
				
				 <h3><strong>BiTS Member Log In</strong>&nbsp;</h3><br>
			  <br><br><input type="text" class="col-sm-8 col-lg-5" id="email" name="mbr_email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" style="border: 1px solid grey; height:45px; width:1000px;">
			</div>
			<div class="pt-3 form outline mt-0">
			 <br><input type="password" class="col-sm-8 col-lg-5"id="password" name="mbr_pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" style="border: 1px solid grey; height:45px; width:1000px;" >
			</div>
	 </div>
			<div class="form-group text-center mt-4">
			 <p align="center">
				<div class="main-button">
				 <button type="submit" class="btn btn-block btn-primary"  name="member" id="login" class="login" value="Login" style="height:40px; width:500px; margin-left: auto; margin-right:auto;  margin-top:3%" >Login</button>
                </div>
			</p>
          
				<br><br><br> <p>"Don't have an account? "</p>
				<li><a href="SignupGuest.php">Sign Up</a></li>
                
                <br> <p>"Log in as guest "</p>
				<li><a href="loginGuest.php">Guest Login</a></li>
				
				 <br><p>"Log in as admin? "</p>
				<li><a href="loginAdmin.php">Admin Login</a></li>
				</div>
			</div>
        </form>
    </div>
	
				
<!-- ***** LogIn/SignUp Ends ***** -->
<?php include "footerAdmin.php";?>