
	<?php
	session_start();
	$currentPage = 'profileMemberRead.php';
	include "headerMember.php";
	
	if (isset($_GET['member_id'])) {
	$member_id = $_GET['member_id'];
	include "dbBits.php";

		$query = "SELECT * FROM member_approval WHERE member_id = '$member_id' ";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);
	?>  
	
	<section class="section">
	<div class="container rounded bg-white mt-5 mb-5">
	<form method="post" action="profileMemberupdate.php">
	
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
				<img class="rounded-circle mt-5" src="https://png.pngitem.com/pimgs/s/418-4181184_transparent-mikasa-ackerman-png-child-mikasa-ackerman-png.png"><br>
				
				<span for="mbr_name" class="text-black-50">
				<input type="hidden" value ="<?php echo $row['mbr_name']?>" ><?php echo $row['mbr_name']?>
				</span><br>
				
				<span for="mbr_email" class="text-black-50">
				<input type="hidden" value ="<?php echo $row['mbr_email']?>"><?php echo $row['mbr_email']?>
				</span>				
			</div>
        </div>
		
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">My Profile</h3>
                </div>
				
                <div class="row mt-2">
                    <div class="col-md-12">
					<label for="studentID" class="labels">Student ID</label>
					<input type="text" name="studentID" class="form-control" value ="<?php echo $row['studentID']?>">
					</div>
                </div>
				
				<div class="row mt-2">
                    <div class="col-md-12">
					<label for="mbr_name" class="labels">Name</label>
					<input type="text" name="mbr_name" class="form-control" value="<?php echo $row['mbr_name']?>">
					</div>
                </div>
				
				<div class="row mt-2">
                    <div class="col-md-12">
					<label for="mbr_gender" class="labels">Gender</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="mbr_gender" value="Male" <?php if ($row['mbr_gender']=='Male') echo "checked"?>>
							<label class="form-check-label" for="mbr_gender">Male</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="mbr_gender" value="Female" <?php if ($row['mbr_gender']=='Female') echo "checked"?>>
							<label class="form-check-label" for="mbr_gender">Female</label>
						</div>
					</div>
                </div>

				<div class="row mt-2">
                    <div class="col-md-6">
					<label for="mbr_prog" class="labels">Program</label>
					<select name="mbr_prog" id="mbr_prog" class="form-control">
						<option>Choose Program</option>
						<option value="CS240" <?php if ($row['mbr_prog']=='CS240') echo "selected"?>>CS240</option>
						<option value="CS245" <?php if ($row['mbr_prog']=='CS245') echo "selected"?>>CS245</option>
						<option value="CS248" <?php if ($row['mbr_prog']=='CS248') echo "selected"?>>CS248</option>
						<option value="CS251" <?php if ($row['mbr_prog']=='CS251') echo "selected"?>>CS251</option>
						<option value="CS255" <?php if ($row['mbr_prog']=='CS255') echo "selected"?>>CS255</option>
					</select>
					</div>
                </div> 

				<div class="row mt-2">
                    <div class="col-md-12">
					<label for="mbr_group" class="labels">Group</label>
					<input type="text" name="mbr_group" class="form-control" value="<?php echo $row['mbr_group']?>">
					</div>
                </div>
				
				<div class="row mt-3">
                    <div class="col-md-12">
					<label for="mbr_phone" class="labels">No Phone</label>
					<input type="text" name="mbr_phone" class="form-control" value="<?php echo $row['mbr_phone']?>">
					</div>
                </div>
				
				<div class="row mt-2">
                    <div class="col-md-12">
					<label for="mbr_email" class="labels">Email</label>
					<input type="email" name="mbr_email" class="form-control" value="<?php echo $row['mbr_email']?>">
					</div>
                </div>
				
                <div class="mt-5 text-center">
					<input type="hidden" class="btn btn-primary profile-button" name="member_id" value="<?php echo $row['member_id']; ?>">
					<input type="submit" class="btn btn-primary profile-button" name="UpdateUser" value="Update">
				</div>
            </div>
        </div>
    </div>
	</div>
	</section>
	</form>
	
	<?php
	}
	?>
	<!-- ***** Cars Ends ***** -->
	
	<?php
	if (isset($_POST['UpdateUser'])) {
	
	if ($_POST['member_id'] != '' && $_POST['studentID'] != '' &&  $_POST['mbr_name'] != '' && $_POST['mbr_gender'] != ''&& $_POST['mbr_prog'] != '' && $_POST['mbr_group'] != '' && $_POST['mbr_phone'] != '' && $_POST['mbr_email'] != '') {
		
		
		$member_id= $_POST['member_id'];
		$studentID = $_POST['studentID'];
        $mbr_name =$_POST['mbr_name'];
        $mbr_gender =$_POST['mbr_gender'];
        $mbr_prog = $_POST['mbr_prog'];
 		$mbr_group = $_POST['mbr_group'];
        $mbr_phone = $_POST['mbr_phone'];
 		$mbr_email =$_POST['mbr_email'];
		
		include "dbBits.php";
		

		$sql = "UPDATE member_approval SET
				studentID = '$studentID',
				mbr_name = '$mbr_name',
				mbr_gender = '$mbr_gender',
				mbr_prog = '$mbr_prog',
				mbr_group = '$mbr_group',
				mbr_phone = '$mbr_phone',
				mbr_email = '$mbr_email'
				WHERE
				member_id = '$member_id' ";
						
		$result = mysqli_query($db, $sql);
		if ($result) {
			
			echo '<script type="text/javascript">';
            echo 'window.alert("Record updated successfully");';
            echo 'location.replace("profileMemberRead.php");';
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
