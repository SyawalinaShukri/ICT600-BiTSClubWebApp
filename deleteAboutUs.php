<?php

session_start();
    $currentPage = 'aboutAdmin.php';
     include "headerAdmin.php";
	 
if (isset($_GET['about_id'])){
	$about_id = $_GET['about_id'];
	include "dbBits.php";

	
	$sql = "SELECT * FROM about_us WHERE about_id = '$about_id'";
	$result = mysqli_query($db, $sql) or die("Connection failed: " . mysqli_error($db));
	$row = mysqli_fetch_assoc($result);
?>

<section class="section">
<div class="container">	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

	<div class="section-heading"><h2>DELETE<em> ABOUT US INFO</em></h2></div>
	
	About ID:
	<input type="hidden" name="about_id" value="<?php echo $row['about_id']?>" ><?php echo $row['about_id']?></br></br>
	Admin ID:
	<input type="hidden"  name="admin_id" value="<?php echo $row['admin_id']?>" ><?php echo $row['admin_id']?></br></br>
	Vision:
	</br><input type="hidden"  name="vision" value="<?php echo $row['vision']?>" ><?php echo $row['vision']?></br></br>
	Mission:
	</br><input type="hidden"  name="misision" value="<?php echo $row['misision']?>" ><?php echo $row['misision']?></br></br>
	Executive List:
	</br><input type="hidden"  name="executive_list" value="<?php echo $row['executive_list']?>" ><?php echo $row['executive_list']?></br></br>
	
	
	<input type="submit" class="b" name="DeleteUser" value="Delete"></br>
	
	</form>
</section>
</div>
	
	
<?php
}
?>

<?php
if (isset($_POST['DeleteUser'])){
	$about_id = $_POST['about_id'];	
	include "dbBits.php";
	
	$sql = "DELETE FROM about_us
			WHERE about_id = '$about_id'";
	
	
	if (mysqli_query($db, $sql)) {
			echo '<script type="text/javascript">';
            echo 'window.alert("Record deleted successfully");';
            echo 'location.replace("aboutAdmin.php");';
            echo '</script>';
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
	mysqli_close($db);
	}

include "footerAdmin.php";
	
?>	

