<?php
	
	session_start();
    $currentPage = 'admin.php';
     include "headerAdmin.php";
	 

if (isset($_GET['admin_id'])) {
	$admin_id = $_GET['admin_id'];
	include "dbBits.php";

		$query = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);
?>
<section class="section">
<div class="container">	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

	<div class="section-heading"><h2>UPDATE<em> ADMIN</em></h2></div>
	Admin ID:
	<input type="hidden"  name="admin_id" value="<?php echo $row['admin_id']?>" ><?php echo $row['admin_id']?></br></br>
	Student ID:
	<input type="text" name="studentID" value="<?php echo $row['studentID']?>" required></br></br>
	Name:
	<input type="text" name="admin_name" value="<?php echo $row['admin_name']?>" required></br></br>
	Gender:
	<input type="radio" name="admin_gender" value="Male" <?php if ($row['admin_gender']=='Male') echo "checked"?>> Male
	<input type="radio" name="admin_gender" value="Female" <?php if ($row['admin_gender']=='Female') echo "checked"?>> Female</br></br>
	Programme:
	<select name="admin_prog">
		<option value="">Choose</option>
		<option value="CS240"  <?php if ($row['admin_prog']=='CS240') echo "selected"?> >CS240</option>
		<option value="CS245" <?php if ($row['admin_prog']=='CS245') echo "selected"?>>CS245</option>
		<option value="CS251" <?php if ($row['admin_prog']=='CS251') echo "selected"?>>CS251</option>
		<option value="CS255" <?php if ($row['admin_prog']=='CS255') echo "selected"?>>CS255</option>
	</select></br></br>
	Group:
	<input type="text" name="admin_group" value="<?php echo $row['admin_group']?>"required ></br></br>
	Phone:
	<input type="text" name="admin_phone" value="<?php echo $row['admin_phone']?>" required></br></br>
	Email:
	<input type="text" name="admin_email" value="<?php echo $row['admin_email']?>" required></br></br>
	Password:
	<input type="password" name="admin_pass" value="<?php echo $row['admin_pass']?>" required></br></br>
	Registration Date:
	<input type="date" name="admin_reg_date" value="<?php echo $row['admin_reg_date']?>" required></br></br>
	Position:
	<input type="text" name="admin_position" value="<?php echo $row['admin_position']?>" required></br></br>
	
	

	<input type="submit" class="a" name="UpdateUser" value=" UPDATE "></br>
	</form>
</section>
</div>
<?php
}
?>

<?php
if (isset($_POST['UpdateUser'])) {
	
	if ($_POST['admin_id'] != '' && $_POST['studentID'] != '' && $_POST['admin_name'] != '' && $_POST['admin_gender'] != ''&& $_POST['admin_prog'] != '' && $_POST['admin_group'] != '' && $_POST['admin_phone'] != '' && $_POST['admin_email'] != '' && $_POST['admin_pass'] != ''&&  $_POST['admin_reg_date'] != ''&& $_POST['admin_position'] != '') {
		
		
		$admin_id= $_POST['admin_id'];
		$studentID = $_POST['studentID'];
        $admin_name =$_POST['admin_name'];
        $admin_gender =$_POST['admin_gender'];
        $admin_prog = $_POST['admin_prog'];
 		$admin_group = $_POST['admin_group'];
        $admin_phone = $_POST['admin_phone'];
 		$admin_email =$_POST['admin_email'];
        $admin_pass =$_POST['admin_pass'];
        $admin_reg_date = $_POST['admin_reg_date'];
 		$admin_position = $_POST['admin_position'];
		
		include "dbBits.php";
		

		$sql = "UPDATE admin SET
				studentID = '$studentID',
				admin_name = '$admin_name',
				admin_gender = '$admin_gender',
				admin_prog = '$admin_prog',
				admin_group = '$admin_group',
				admin_phone = '$admin_phone',
				admin_email = '$admin_email',
				admin_pass = '$admin_pass',
				admin_reg_date = '$admin_reg_date',
				admin_position = '$admin_position'
				WHERE
				admin_id = '$admin_id'";
						
		$result = mysqli_query($db, $sql);
		if ($result) {
			
			echo '<script type="text/javascript">';
            echo 'window.alert("Record updated successfully");';
            echo 'location.replace("admin.php");';
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
