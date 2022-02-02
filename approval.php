<?php
	
	session_start();
    $currentPage = 'applicants.php';
     include "headerAdmin.php";
	 

if (isset($_GET['member_id'])) {
	$member_id = $_GET['member_id'];
	include "dbBits.php";

		$query = "SELECT * FROM member_approval WHERE member_id = '$member_id' ";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);
?>
<section class="section">
<div class="container">	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
	<div class="section-heading"><h2>MEMBER APPLICATION<em> APPROVAL</em></h2></div>
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
	<input type="radio" name="mbr_approval" value="Approved" <?php if ($row['mbr_approval']=='Approved') echo "checked"?>> Approved
	</br></br>
	Type:
	<input type="radio" name="mbr_type" value="Member" <?php if ($row['mbr_type']=='Member') echo "checked"?>> Member
	</br>
	</br>
	Admin ID:
	<input type="text"  name="adminID" value="<?php echo $row['adminID']?>" ></br></br>
	<input type="submit" class="a" name="UpdateUser" value=" APPROVE "></br>
	</form>
</section>
</div>
<?php
}
?>

<?php
if (isset($_POST['UpdateUser'])) {
	
	if ($_POST['member_id'] != '' && $_POST['studentID'] != '' && $_POST['adminID'] != '' && $_POST['mbr_name'] != '' && $_POST['mbr_gender'] != ''&& $_POST['mbr_prog'] != '' && $_POST['mbr_group'] != '' && $_POST['mbr_phone'] != '' && $_POST['mbr_email'] != '' && $_POST['mbr_pass'] != ''&&  $_POST['mbr_reg_date'] != ''&& $_POST['mbr_approval'] != ''&& $_POST['mbr_type'] != '') {
		
		
		$member_id= $_POST['member_id'];
		$studentID = $_POST['studentID'];
		$adminID = $_POST['adminID'];
        $mbr_name =$_POST['mbr_name'];
        $mbr_gender =$_POST['mbr_gender'];
        $mbr_prog = $_POST['mbr_prog'];
 		$mbr_group = $_POST['mbr_group'];
        $mbr_phone = $_POST['mbr_phone'];
 		$mbr_email =$_POST['mbr_email'];
        $mbr_pass =$_POST['mbr_pass'];
        $mbr_reg_date = $_POST['mbr_reg_date'];
 		$mbr_approval = $_POST['mbr_approval'];
        $mbr_type = $_POST['mbr_type'];
		
		include "dbBits.php";
		

		$sql = "UPDATE member_approval SET
				studentID = '$studentID',
				adminID = '$adminID',
				mbr_name = '$mbr_name',
				mbr_gender = '$mbr_gender',
				mbr_prog = '$mbr_prog',
				mbr_group = '$mbr_group',
				mbr_phone = '$mbr_phone',
				mbr_email = '$mbr_email',
				mbr_pass = '$mbr_pass',
				mbr_reg_date = '$mbr_reg_date',
				mbr_approval = '$mbr_approval',
				mbr_type = '$mbr_type'
				WHERE
				member_id = '$member_id' ";
						
		$result = mysqli_query($db, $sql);
		if ($result) {
			
			echo '<script type="text/javascript">';
            echo 'window.alert("Record approved successfully");';
            echo 'location.replace("members.php");';
            echo '</script>';

		} else {
			echo "Fail update data " . mysqli_error($db);
		}
	} else {
		echo "Please enter all required data.";
	}
		
}
include "footerAdmin.php";	
?>
