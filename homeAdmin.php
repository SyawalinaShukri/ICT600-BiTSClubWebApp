<?php
    session_start();

    $currentPage = 'homeAdmin.php';
     include "headerAdmin.php";

	 include "dbBiTS.php";
	 $query= "SELECT * from member_approval";
     $result =  mysqli_query($db, $query);

	 $query2= "SELECT COUNT(member_id) as members FROM member_approval WHERE mbr_approval='Approved'";
     $total_members= mysqli_fetch_assoc($db->query($query2));

     $query3= "SELECT COUNT(member_id) as applicants FROM member_approval WHERE mbr_approval IS NULL OR mbr_approval='' ";
     $total_applicants= mysqli_fetch_assoc($db->query($query3));

	 $query4= "SELECT COUNT(admin_id) as admins FROM admin";
     $total_admin= mysqli_fetch_assoc($db->query($query4));
    
 
    
?>


   <!-- ***** Cards Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                </div>
            </div>
			<div class="section-heading" colour:green>
				<h2>ADMIN <em>SEGMENT</em></h2>
		      </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        
                        <div class="down-content">
	
							<div class="section-heading" >
								
							<h2>Total Members: <em><?php echo $total_members['members'] ?></em></h2></br><br>


                            <ul class="social-icons">
                              <li><a href="members.php"><button class="w3-button">Veiw Members</button></a></li>
							</div>
                          </ul>
                        </div>
                    </div>
                </div>
				 <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                          
                        </div>
                        <div class="down-content">
							
							<div class="section-heading" >
								
							<h2>Total Applicants: <em><?php echo $total_applicants['applicants'] ?></em></h2></br><br>
		      				
	
                            <ul class="social-icons">
                                <li><a href="applicants.php"><button class="w3-button">View Applicants</button></a></li>
							</div>
                            </ul>
                        </div>
                    </div>
                </div>
				<div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                          
                        </div>
                        <div class="down-content">
							<div class="section-heading" >
						
							
								<h2>Total Admin: <em><?php echo $total_admin['admins'] ?></em></h2></br><br>
		      				

                            <ul class="social-icons">
                                <li><a href="admin.php"><button class="w3-button">View Admin</button></a></li>
							</div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->
	
	<?php include "footerAdmin.php";?>