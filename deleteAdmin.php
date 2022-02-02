<?php

session_start();
    $currentPage = 'admin.php';
     include "headerAdmin.php";
	 
if (isset($_GET['admin_id'])){
	$admin_id = $_GET['admin_id'];
	include "dbBits.php";

	
	$sql = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
	$result = mysqli_query($db, $sql) or die("Connection failed: " . mysqli_error($db));
	$row = mysqli_fetch_assoc($result);
?>

<section class="section">
<div class="container">	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

	<div class="section-heading"><h2>DELETE<em> ADMIN</em></h2></div>
	Admin ID:
	<input type="hidden"  name="admin_id" value="<?php echo $row['admin_id']?>" ><?php echo $row['admin_id']?></br></br>
	Student ID:
	<input type="hidden" name="studentID" value="<?php echo $row['studentID']?>" ><?php echo $row['studentID']?></br></br>
	Name:
	<input type="hidden" name="admin_name" value="<?php echo $row['admin_name']?>" ><?php echo $row['admin_name']?></br></br>
	Gender:
	<input type="hidden" name="admin_gender" value="<?php echo $row['admin_gender']?>" ><?php echo $row['admin_gender']?></br></br>
	Programme:
	<input type="hidden" name="admin_prog" value="<?php echo $row['admin_prog']?>" ><?php echo $row['admin_prog']?></br></br>
	Group:
	<input type="hidden" name="admin_group" value="<?php echo $row['admin_group']?>" ><?php echo $row['admin_group']?></br></br>
	Phone:
	<input type="hidden" name="admin_phone" value="<?php echo $row['admin_phone']?>" ><?php echo $row['admin_phone']?></br></br>
	Email:
	<input type="hidden" name="admin_email" value="<?php echo $row['admin_email']?>" ><?php echo $row['admin_email']?></br></br>
	Password:
	<input type="hidden" name="admin_pass" value="<?php echo $row['admin_pass']?>" ><?php echo $row['admin_pass']?></br></br>
	Registration Date:
	<input type="hidden" name="admin_reg_date" value="<?php echo $row['admin_reg_date']?>" ><?php echo $row['admin_reg_date']?></br></br>
	Position:
	<input type="hidden" name="admin_position" value="<?php echo $row['admin_position']?>" ><?php echo $row['admin_position']?></br></br>
	
	
	<input type="submit" class="b" name="DeleteUser" value="Delete"></br>
	
	</form>
</section>
</div>
	
	
<?php
}
?>

<?php
if (isset($_POST['DeleteUser'])){
	$admin_id = $_POST['admin_id'];	
	include "dbBits.php";
	
	$sql = "DELETE FROM admin
			WHERE admin_id = '$admin_id'";
	
	
	if (mysqli_query($db, $sql)) {
			echo '<script type="text/javascript">';
            echo 'window.alert("Record deleted successfully");';
            echo 'location.replace("admin.php");';
            echo '</script>';
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
	mysqli_close($db);
	}

include "footerAdmin.php";
	
?>	

