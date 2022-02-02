<?php
    session_start();

    $currentPage = 'applicants.php';
     include "headerAdmin.php";
	 include "dbBits.php";
	
	
	  
	 $query= "SELECT * from member_approval where mbr_approval IS NULL OR mbr_approval=''";
     $result =  mysqli_query($db, $query);

	 $query2= "SELECT * from member_approval where mbr_approval='Rejected'";
     $result2 =  mysqli_query($db, $query2);
	
    
    
?>
   <!-- ***** Cards Starts ***** -->
	<section class="section">
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']?>">
				  <fieldset>
				  <div class="section-heading">
					<h2>MEMBER APPLICATION<em> APPROVAL</em></h2>
				 </div>
				  <table style="width:100%">
				  <tr>
					<th data-field="member_id" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">ID</th>
					<th data-field="studentID" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Student ID</th>
					<th data-field="mbr_name" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Name</th>
					<th data-field="mbr_gender" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Gender</th>
					<th data-field="mbr_prog" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Programme</th>
					<th data-field="mbr_group" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Group</th>
					<th data-field="mbr_phone" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Telephone Number</th>
					<th data-field="mbr_email" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Email</th>
					<th data-field="mbr_reg_date" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Registration Date</th>
					 
					<th colspan="2" class="form-group text-center mt-4">Select Approval</th>
				  </tr>
				  <tr>
					<?php
                                        if(mysqli_num_rows($result)>0){
                                            while($row= mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>".$row['member_id']."</td>";

                                                echo "<td>".$row['studentID']."</td>";

                                                echo "<td>".$row['mbr_name']."</td>";

                                                echo "<td>".$row['mbr_gender']."</td>";
												
												echo "<td>".$row['mbr_prog']."</td>";
												
												echo "<td>".$row['mbr_group']."</td>";
												
												echo "<td>".$row['mbr_phone']."</td>";
												
												echo "<td>".$row['mbr_email']."</td>";
												
												echo "<td>".$row['mbr_reg_date']."</td>";
												
												
												
												echo "<td><a style='color:green;' href ='approval.php?member_id=".$row['member_id']."'>Approve</a></td>";
												
												echo "<td><a style='color:red;' href ='reject.php?member_id=".$row['member_id']."'>Reject</a></td>";
												
												
							
                                                  }
                                        } else{
                                            echo "No results found!";
                                        }
                                               	

                                    ?>
				  </tr>
				  </table>
				  <br><br>
				 </fieldset>
			</form>
       </div>
    </section>
    <!-- ***** Cards Ends ***** -->


   <!-- ***** Cards Starts ***** -->
 	 <section class="section">
        <div class="container">
            <form action="/action_page.php">
				  <fieldset>
				  <div class="section-heading">
					<h2>REJECTED<em> APPLICANTS</em></h2>
				 </div>
				  <table style="width:100%">
				  <tr>
					<th data-field="member_id" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">ID</th>
					<th data-field="studentID" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Student ID</th>
					<th data-field="mbr_name" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Name</th>
					<th data-field="mbr_gender" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Gender</th>
					<th data-field="mbr_prog" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Programme</th>
					<th data-field="mbr_group" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Group</th>
					<th data-field="mbr_phone" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Telephone Number</th>
					<th data-field="mbr_email" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Email</th>
					<th data-field="mbr_reg_date" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Registration Date</th>
					 
					<th class="form-group text-center mt-4">Action</th>
				  </tr>
				  <tr>
					<?php
                                        if(mysqli_num_rows($result2)>0){
                                            while($row= mysqli_fetch_assoc($result2)){
                                                echo "<tr>";
                                                echo "<td>".$row['member_id']."</td>";

                                                echo "<td>".$row['studentID']."</td>";

                                                echo "<td>".$row['mbr_name']."</td>";

                                                echo "<td>".$row['mbr_gender']."</td>";
												
												echo "<td>".$row['mbr_prog']."</td>";
												
												echo "<td>".$row['mbr_group']."</td>";
												
												echo "<td>".$row['mbr_phone']."</td>";
												
												echo "<td>".$row['mbr_email']."</td>";

												
												echo "<td>".$row['mbr_reg_date']."</td>";
												
												
												
												echo "<td><a style='color:red;' href ='deleteRejectedApplicants.php?member_id=".$row['member_id']."'>Delete</a></td>";
												
												
												
							
                                                  }
                                        } else{
                                            echo "No results found!";
                                        }
                                               	

                                    ?>
				  </tr>
				  </table>
				  <br><br>
				 </fieldset>
			</form>
       </div>
    </section>

    <!-- ***** Cards Ends ***** -->
	
	<?php include "footerAdmin.php";?>

