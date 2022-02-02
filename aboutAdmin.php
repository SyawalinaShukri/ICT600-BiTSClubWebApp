<?php
    session_start();

    $currentPage = 'aboutAdmin.php';
     include "headerAdmin.php";
	 include "dbBits.php";
	
	
	  
	 $query= "SELECT * from about_us" or die (mysqli_error());
     $result =  mysqli_query($db, $query);
	
    
    
?>
   <!-- ***** Cards Starts ***** -->
	<section class="section">
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']?>">
				  <fieldset>
				  <div class="section-heading">
					<h2>EDIT<em> ABOUT US PAGE</em></h2>
				 </div>
					  <a  href ="addAboutUs.php">Add Info</a></br>
				  <table style="width:100%">
				  <tr>
					<th data-field="member_id" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">ID</th>
					<th data-field="studentID" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Admin ID</th>
					<th data-field="mbr_name" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Vision</th>
					<th data-field="mbr_gender" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Mision</th>
					<th data-field="mbr_prog" data-filter-control="select" data-sortable="true" class="form-group text-center mt-4">Executive List</th>
					<th colspan="2" class="form-group text-center mt-4">Action</th>
				  </tr>
				  <tr>
					<?php
                                        if(mysqli_num_rows($result)>0){
                                            while($row= mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>".$row['about_id']."</td>";

                                                echo "<td>".$row['admin_id']."</td>";

                                                echo "<td>".$row['vision']."</td>";

                                                echo "<td>".$row['misision']."</td>";
												
												echo "<td>".$row['executive_list']."</td>";
												
												echo "<td><a style='color:green;' href ='updateAboutUs.php?about_id=".$row['about_id']."'>Update</a></td>";
												
												echo "<td><a style='color:red;' href ='deleteAboutUs.php?about_id=".$row['about_id']."'>Delete</a></td>";
			
							
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

