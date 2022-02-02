<?php
	
	session_start();
    $currentPage = 'aboutAdmin.php';
     include "headerAdmin.php";

?>

<section class="section">
<div class="container">	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

	<div class="section-heading"><h2>UPDATE<em> ABOUT US INFO</em></h2></div>
		
	Admin ID:
	</br><input type="text"  name="admin_id" value="" required></br></br>
	Vision:
	</br><textarea name="vision" rows="6" cols="50" required></textarea></br></br>
	Mission:
	</br><textarea name="misision" rows="6" cols="50" required></textarea></br></br>
	Executive List:
	</br><textarea name="executive_list" rows="6" cols="50" required></textarea></br></br>
	
	

	<input type="submit" class="a" name="AddUser" value=" ADD "></br>
	</form>
</section>
</div>


<?php
if (isset($_POST['AddUser'])) {
	
	if ($_POST['admin_id'] != '' && $_POST['vision'] != '' && $_POST['misision'] != ''&& $_POST['executive_list'] != '') {
		
		
		$admin_id = $_POST['admin_id'];
        $vision =$_POST['vision'];
        $misision =$_POST['misision'];
        $executive_list = $_POST['executive_list'];
 	
		include "dbBits.php";
		
		$sql = "INSERT INTO about_us 
						(admin_id, vision, misision, executive_list)
						VALUES
						('$admin_id',
						'$vision',
						'$misision',
						'$executive_list')";
						
		$result = mysqli_query($db, $sql);
		if ($result) {
			echo '<script type="text/javascript">';
            echo 'window.alert("Record inserted successfully");';
            echo 'location.replace("aboutAdmin.php");';
            echo '</script>';
		} else {
			echo "Fail insert data " . mysqli_error($conn);
		}
	} else {
		echo "Please enter all required data.";
	}
		
}
include "footerAdmin.php";
?>

