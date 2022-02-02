<?php
	session_start();
	$currentPage = 'profileMemberRead.php';
	include "headerMember.php";
	
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="bits";
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname)or die("Connection Failed" . mysqli_connect_error($conn));
        
	$sql = "SELECT member_id, studentID, mbr_name, mbr_gender, mbr_prog, mbr_group, mbr_phone, mbr_email FROM member_approval WHERE member_id= '$member_id'";
	$result = mysqli_query($conn, $sql) or die("Connection Failed" . mysqli_error($conn));
	
	while ($row = mysqli_fetch_assoc($result)){
	?>
	
	<section class="section">	
	<div class="container rounded bg-white mt-5 mb-5">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
	
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
				<img class="rounded-circle mt-5" src="https://png.pngitem.com/pimgs/s/418-4181184_transparent-mikasa-ackerman-png-child-mikasa-ackerman-png.png"><br>
				
				<span class="font-weight-bold">
				<input type="text" value ="<?php echo $row['mbr_name']?>" disabled>
				</span><br>
				
				<span class="text-black-50">
				<input type="text" value ="<?php echo $row['mbr_email']?>" disabled>
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
					<input type="text" class="form-control" value ="<?php echo $row['studentID']?>" disabled>
					</div>
                </div>
				
				<div class="row mt-2">
                    <div class="col-md-12">
					<label for="mbr_name" class="labels">Name</label>
					<input type="text" class="form-control" value="<?php echo $row['mbr_name']?>" disabled>
					</div>
                </div>
				
				<div class="row mt-2">
                    <div class="col-md-12">
					<label for="mbr_gender" class="labels">Gender</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="mbr_gender" value="Male" <?php if ($row['mbr_gender']=='Male') echo "checked"?> disabled>
							<label class="form-check-label" for="exampleRadios1">Male</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="mbr_gender" value="Female" <?php if ($row['mbr_gender']=='Female') echo "checked"?> disabled>
							<label class="form-check-label" for="exampleRadios2">Female</label>
							
						</div>
					</div>
                </div>

				<div class="row mt-2">
                    <div class="col-md-6">
					<label for="mbr_prog" class="labels">Program</label>
					<select name="mbr_prog" id="mbr_prog" class="form-control" disabled>
						<option>Choose Program</option>
						<option value="CS240" <?php if ($row['mbr_prog']=='CS240') echo "selected"?> >CS240</option>
						<option value="CS245" <?php if ($row['mbr_prog']=='CS245') echo "selected"?> >CS245</option>
						<option value="CS248" <?php if ($row['mbr_prog']=='CS248') echo "selected"?> >CS248</option>
						<option value="CS251" <?php if ($row['mbr_prog']=='CS251') echo "selected"?> >CS251</option>
						<option value="CS255" <?php if ($row['mbr_prog']=='CS255') echo "selected"?> >CS255</option>
					</select>
					</div>
                </div> 

				<div class="row mt-2">
                    <div class="col-md-12">
					<label for="mbr_group" class="labels">Group</label>
					<input type="text" class="form-control" value="<?php echo $row['mbr_group']?>" disabled>
					</div>
                </div>
				
				<div class="row mt-3">
                    <div class="col-md-12">
					<label for="mbr_phone" class="labels">No Phone</label>
					<input type="text" class="form-control" value="<?php echo $row['mbr_phone']?>" disabled>
					</div>
                </div>
				
				<div class="row mt-2">
                    <div class="col-md-12">
					<label for="mbr_email" class="labels">Email</label>
					<input type="email" class="form-control" value="<?php echo $row['mbr_email']?>" disabled>
					</div>
                </div>
				
                <div class="mt-5 text-center">
					<?php echo "<td><a  href ='profileMemberupdate.php?member_id=".$row['member_id']."'>CLICK HERE TO UPDATE YOUR PROFILE</a></td>";?>
					
					
				</div>
            </div>
        </div>
    </div>
	</div>
	</section>
	</form>
	
	<?php
	}
	include "footerAdmin.php";	
	?>
	