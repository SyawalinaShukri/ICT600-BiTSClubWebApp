<?php
	
	session_start();
    $currentPage = 'aboutAdmin.php';
     include "headerAdmin.php";
	 

if (isset($_GET['about_id'])) {
	$about_id = $_GET['about_id'];
	include "dbBits.php";

		$query = "SELECT * FROM about_us WHERE about_id = '$about_id'";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);
?>
<section class="section">
<div class="container">	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

	<div class="section-heading"><h2>UPDATE<em> ABOUT US INFO</em></h2></div>
	About ID:
	<input type="hidden" name="about_id" value="<?php echo $row['about_id']?>" ><?php echo $row['about_id']?></br></br>
	Admin ID:
	</br><input type="text"  name="admin_id" value="<?php echo $row['admin_id']?>" required></br></br>
	Vision:
	</br><textarea name="vision" rows="6" cols="50" required><?php echo $row['vision']?></textarea></br></br>
	Mission:
	</br><textarea name="misision" rows="6" cols="50" required><?php echo $row['misision']?></textarea></br></br>
	Executive List:
	</br><textarea name="executive_list" rows="6" cols="50" required><?php echo $row['executive_list']?></textarea></br></br>
	

	<input type="submit" class="a" name="UpdateUser" value=" UPDATE "></br>
	</form>
</section>
</div>
<?php
}
?>

<?php
if (isset($_POST['UpdateUser'])) {
	
	if ($_POST['about_id'] != '' && $_POST['admin_id'] != '' && $_POST['vision'] != '' && $_POST['misision'] != ''&& $_POST['executive_list'] != '') {
		
		
		$about_id= $_POST['about_id'];
		$admin_id = $_POST['admin_id'];
        $vision =$_POST['vision'];
        $misision =$_POST['misision'];
        $executive_list = $_POST['executive_list'];
 		
		
		include "dbBits.php";
		

		$sql = "UPDATE about_us SET
				admin_id = '$admin_id',
				vision = '$vision',
				misision = '$misision',
				executive_list = '$executive_list'
				WHERE
				about_id = '$about_id'";
						
		$result = mysqli_query($db, $sql);
		if ($result) {
			
			echo '<script type="text/javascript">';
            echo 'window.alert("Record updated successfully");';
            echo 'location.replace("aboutAdmin.php");';
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
