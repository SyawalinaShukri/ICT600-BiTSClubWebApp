<?php
    session_start();

    $currentPage = 'gueststatus.php';
     include "headerGuest.php";

	 include "dbBiTS.php";
	 
	$sql = "SELECT studentID, mbr_name, mbr_gender, mbr_prog, mbr_group, mbr_phone, mbr_email, mbr_reg_date, mbr_approval, mbr_type FROM member_approval WHERE studentID= '$id'";
	$result = mysqli_query($db, $sql) or die("Connection Failed" . mysqli_error($db));
	
	while ($row = mysqli_fetch_assoc($result)){
	?>
	
	<section class="section">	
	<div class="container rounded bg-white mt-5 mb-5">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
	
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
				<img class="rounded-circle mt-5" src="https://png.pngitem.com/pimgs/s/418-4181184_transparent-mikasa-ackerman-png-child-mikasa-ackerman-png.png"><br>
				
				<label for="mbr_approval" class="labels">Approval Status</label>
				<span class="font-weight-bold">
				<input type="text" value ="<?php echo $row['mbr_approval']?>" disabled>
				</span><br>
				
				<label for="mbr_type" class="labels">Type</label>
				<span class="text-black-50">
				<input type="text" value ="<?php echo $row['mbr_type']?>" disabled>
				</span>	
			</div>
        </div>
		
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Application Details</h3>
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
			<?php
					if ($row['mbr_approval']=='Approved') {
						
						echo '<a style="color:green;" href="loginMember.php">Congratulation. Click HERE to login as member now.</a>';

					} 
					else if($row['mbr_approval']=='Rejected') {
						
						echo '<a style="color:red;" href="guestregister.php"> Our apologies, application rejected. Click HERE to register again</a>';

					}
		
					else {
						echo "Your application is still pending. Please check again some other time.";
					}
			?>		
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
    
    