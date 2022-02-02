<?php
session_start();

$currentPage = 'loginGuest.php';
include 'dbBits.php';


if (isset($_REQUEST['admin'])) {

    if (isset($_POST['admin_email']) && isset($_POST['admin_pass'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
 
		$admin_email = $_POST['admin_email'];
		$admin_pass = $_POST['admin_pass'];
 
     if (empty($admin_email)) {
		 header("Location: loginAdmin.php?error=User Name is required");
         exit();
     }
     else if(empty($admin_pass)){
		 header("Location: loginAdmin.php?error=User Password is required");
         exit();
     }
     else{

		$query="SELECT * FROM admin where admin_email='$admin_email' AND admin_pass='$admin_pass'" or die (mysqli_error());

		$result=mysqli_query($db, $query);


		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['admin_email'] === $admin_email && $row['admin_pass'] === $admin_pass) {
            	$_SESSION['admin_email'] = $row['admin_email'];
				$_SESSION['admin_id'] = $row['admin_id'];
            	$_SESSION['admin_name'] = $row['admin_name'];
				$_SESSION['admin_position'] = $row['admin_position'];
            	header("Location: homeAdmin.php");
		        exit();
            }
            else{
				header("Location: loginAdmin.php?error=Incorect User name or password");
		        exit();
			}
		}
        else{
			header("Location: loginAdmin.php?error=Incorect User name or password");
	        exit();
		}
    }
}else{
	header("Location: loginAdmin.php");
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
				
				 <h3><strong>Admin Log In</strong>&nbsp;</h3><br>
			  <br><br><input type="text" class="col-sm-8 col-lg-5" id="email" name="admin_email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" style="border: 1px solid grey; height:45px; width:1000px;">
			</div>
			<div class="pt-3 form outline mt-0">
			 <br><input type="password" class="col-sm-8 col-lg-5"id="password" name="admin_pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" style="border: 1px solid grey; height:45px; width:1000px;" >
			</div>
          
	 </div>
			<div class="form-group text-center mt-4">
			 <p align="center">
				<div class="main-button">
				 <button type="submit" class="btn btn-block btn-primary"  name="admin" id="login" class="login" value="Login" style="height:40px; width:500px; margin-left: auto; margin-right:auto;  margin-top:3%" >Login</button>
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