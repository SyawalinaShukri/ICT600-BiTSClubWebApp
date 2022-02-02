<?php
    session_start();

    $currentPage = 'admin.php';
     include "headerAdmin.php";
	 include "dbBits.php";
	
	
	  
	 $query= "SELECT * from admin";
     $result =  mysqli_query($db, $query);
	
  	
    
?>

	
	
   <!-- ***** Cards Starts ***** -->
	<section class="section">
        <div class="container">
			
            <form action="<?php echo $_SERVER['PHP_SELF']?>">
				  <fieldset>
				  <div class="section-heading">
					<h2>LIST OF<em> ADMIN</em></h2>
				 </div>
					  <a  href ="addAdmin.php">Add Admin</a></br>
				  <table style="width:100%">
				  <tr>
					<th data-field="member_id" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">ID</th>
					<th data-field="studentID" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Student ID</th>
					<th data-field="admin_name" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Name</th>
					<th data-field="admin_gender" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Gender</th>
					<th data-field="admin_prog" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Programme</th>
					<th data-field="admin_group" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Group</th>
					<th data-field="admin_phone" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Telephone Number</th>
					<th data-field="admin_email" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Email</th>
					<th data-field="admin_reg_date" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Registration Date</th>
					<th data-field="admin_position" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Position</th>
					<th colspan="2" class="form-group text-center mt-4">Action</th>
				  </tr>
				  <tr>
					<?php
                                        if(mysqli_num_rows($result)>0){
                                            while($row= mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>".$row['admin_id']."</td>";

                                                echo "<td>".$row['studentID']."</td>";

                                                echo "<td>".$row['admin_name']."</td>";

                                                echo "<td>".$row['admin_gender']."</td>";
												
												echo "<td>".$row['admin_prog']."</td>";
												
												echo "<td>".$row['admin_group']."</td>";
												
												echo "<td>".$row['admin_phone']."</td>";
												
												echo "<td>".$row['admin_email']."</td>";
												
												echo "<td>".$row['admin_reg_date']."</td>";
												
												echo "<td>".$row['admin_position']."</td>";
												
												echo "<td><a style='color:green;' href ='updateAdmin.php?admin_id=".$row['admin_id']."'>Update</a></td>";
												
												echo "<td><a style='color:red;' href ='deleteAdmin.php?admin_id=".$row['admin_id']."'>Delete</a></td>";
												
							
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

