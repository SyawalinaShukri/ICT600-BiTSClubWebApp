<?php
    session_start();

    $currentPage = 'members.php';
     include "headerAdmin.php";
	 include "dbBits.php";
	
	
	  
	 $query= "SELECT * from member_approval where mbr_approval='Approved' ";
     $result =  mysqli_query($db, $query);
	
    
    
?>
   <!-- ***** Cards Starts ***** -->
	<section class="section">
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']?>">
				  <fieldset>
				  <div class="section-heading">
					<h2>LIST OF<em> MEMBERS</em></h2>
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
												
												echo "<td><a style='color:red;' href ='deleteMembers.php?member_id=".$row['member_id']."'>Delete</a></td>";
												
												
												
							
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

