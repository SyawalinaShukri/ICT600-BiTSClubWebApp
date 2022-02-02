<?php
	
	session_start();
    $currentPage = 'admin.php';
     include "headerAdmin.php";

?>

<section class="section">
<div class="container">	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

	<div class="section-heading"><h2>ADD<em> ADMIN</em></h2></div>
	Student ID:
	<input type="text" name="studentID" value="" required></br></br>
	Name:
	<input type="text" name="admin_name" value="" required></br></br>
	Gender:
	<input type="radio" name="admin_gender" value="Male"> Male
	<input type="radio" name="admin_gender" value="Female" > Female</br></br>
	Programme:
	<select name="admin_prog">
		<option value="">Choose</option>
		<option value="CS240" >CS240</option>
		<option value="CS245" >CS245</option>
		<option value="CS251" >CS251</option>
		<option value="CS255" >CS255</option>
	</select></br></br>
	Group:
	<input type="text" name="admin_group" value="" required></br></br>
	Phone:
	<input type="text" name="admin_phone" value="" required></br></br>
	Email:
	<input type="text" name="admin_email" value="" required></br></br>
	Password:
	<input type="password" name="admin_pass" value="" required></br></br>
	Registration Date:
	<input type="date" name="admin_reg_date" value="" required></br></br>
	Position:
	<input type="text" name="admin_position" value="" required></br></br>
	
	

	<input type="submit" class="a" name="AddUser" value=" ADD "></br>
	</form>
</section>
</div>


<?php
if (isset($_POST['AddUser'])) {
	
	
	if ( $_POST['studentID'] != '' && $_POST['admin_name'] != '' && $_POST['admin_gender'] != ''&& $_POST['admin_prog'] != '' && $_POST['admin_group'] != '' && $_POST['admin_phone'] != '' && $_POST['admin_email'] != '' && $_POST['admin_pass'] != ''&&  $_POST['admin_reg_date'] != ''&& $_POST['admin_position'] != '') {
		
		
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
		
		$sql = "INSERT INTO admin 
						(studentID, admin_name, admin_gender, admin_prog, admin_group, admin_phone, admin_email, admin_pass, admin_reg_date, admin_position)
						VALUES
						('$studentID',
						'$admin_name',
						'$admin_gender',
						'$admin_prog',
						'$admin_group',
						'$admin_phone',
						'$admin_email',
						PASSWORD('$admin_pass'),
						'$admin_reg_date',
						'$admin_position')";
						
		$result = mysqli_query($db, $sql);
		if ($result) {
			echo '<script type="text/javascript">';
            echo 'window.alert("Record inserted successfully");';
            echo 'location.replace("admin.php");';
            echo '</script>';
		} else {
			echo "Fail insert data " . mysqli_error($db);
		}
	} else {
		echo "Please enter all required data.";
	}
		
}
include "footerAdmin.php";
?>

