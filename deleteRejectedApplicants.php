<?php

session_start();
    $currentPage = 'applicants.php';
     include "headerAdmin.php";
	 
if (isset($_GET['member_id'])){
	$member_id = $_GET['member_id'];
	include "dbBits.php";

	
	$sql = "SELECT * FROM member_approval WHERE member_id = '$member_id'";
	$result = mysqli_query($db, $sql) or die("Connection failed: " . mysqli_error($db));
	$row = mysqli_fetch_assoc($result);
?>

<section class="section">
<div class="container">	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

	<div class="section-heading"><h2>DELETE<em> REJECTED APPLICANTS</em></h2></div>
	Member ID:
	<input type="hidden"  name="member_id" value="<?php echo $row['member_id']?>" ><?php echo $row['member_id']?></br></br>
	Student ID:
	<input type="hidden" name="studentID" value="<?php echo $row['studentID']?>" ><?php echo $row['studentID']?></br></br>
	Name:
	<input type="hidden" name="mbr_name" value="<?php echo $row['mbr_name']?>" ><?php echo $row['mbr_name']?></br></br>
	Gender:
	<input type="hidden" name="mbr_gender" value="<?php echo $row['mbr_gender']?>" ><?php echo $row['mbr_gender']?></br></br>
	Programme:
	<input type="hidden" name="mbr_prog" value="<?php echo $row['mbr_prog']?>" ><?php echo $row['mbr_prog']?></br></br>
	Group:
	<input type="hidden" name="mbr_group" value="<?php echo $row['mbr_group']?>" ><?php echo $row['mbr_group']?></br></br>
	Phone:
	<input type="hidden" name="mbr_phone" value="<?php echo $row['mbr_phone']?>" ><?php echo $row['mbr_phone']?></br></br>
	Email:
	<input type="hidden" name="mbr_email" value="<?php echo $row['mbr_email']?>" ><?php echo $row['mbr_email']?></br></br>
	Password:
	<input type="hidden" name="mbr_pass" value="<?php echo $row['mbr_pass']?>" ><?php echo $row['mbr_pass']?></br></br>
	Registration Date:
	<input type="hidden" name="mbr_reg_date" value="<?php echo $row['mbr_reg_date']?>" ><?php echo $row['mbr_reg_date']?></br></br>
	Approval:
	<input type="hidden" name="mbr_approval" value="<?php echo $row['mbr_approval']?>" ><?php echo $row['mbr_approval']?></br></br>
	Type:
	<input type="hidden" name="mbr_type" value="<?php echo $row['mbr_type']?>" ><?php echo $row['mbr_type']?></br></br>
	Admin ID:
	<input type="hidden" name="adminID" value="<?php echo $row['adminID']?>" ><?php echo $row['adminID']?></br></br>
	
	
	<input type="submit" class="b" name="DeleteUser" value="Delete"></br>
	
	</form>
</section>
</div>
	
	
<?php
}
?>

<?php
if (isset($_POST['DeleteUser'])){
	$member_id = $_POST['member_id'];	
	include "dbBits.php";
	
	$sql = "DELETE FROM member_approval
			WHERE member_id = '$member_id'";
	
	
	if (mysqli_query($db, $sql)) {
			echo '<script type="text/javascript">';
            echo 'window.alert("Record deleted successfully");';
            echo 'location.replace("applicants.php");';
            echo '</script>';
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
	mysqli_close($db);
	}

include "footerAdmin.php";
	
?>	

