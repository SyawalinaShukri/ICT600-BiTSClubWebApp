<?php
    session_start();

    $currentPage = 'guestabout.php';
     include "headerGuest.php";

	 include "dbBiTS.php";
	 
    
?>
<!-- ***** Cards Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                </div>
            </div>
			  <div class="section-heading">
				<h2>ABOUT THE <em> ORGANIZATION </em> </h2>
		      </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        
                        <div class="down-content">

                            <ul type="roman">
								
                              <li><b>Vision</b></li>
								<ul type="square">
									<li><?php
											$conn = mysqli_connect("localhost", "root", "", "bits");
							
											if(!$conn) 
											{ 
												die(" Connection Error "); 
											}
											
											$query = "SELECT * FROM `about_us`";
											$result = mysqli_query($conn, $query);
												
											if($result)
											{
												while($row=mysqli_fetch_assoc($result))
												{
													echo " <h6> $row[vision]</h6> ";
												}
											}
										?> </li>
                          </ul>
                        </div>
                    </div>
                </div>
				 <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                          
                        </div>
                        <div class="down-content">
	
                            <ul type="roman">
                                <li><b>Mision</b></li>
									<ul type="square">
										<li><?php
											$conn = mysqli_connect("localhost", "root", "", "bits");
							
											if(!$conn) 
											{ 
												die(" Connection Error "); 
											}
											
											$query = "SELECT * FROM `about_us`";
											$result = mysqli_query($conn, $query);
												
											if($result)
											{
												while($row=mysqli_fetch_assoc($result))
												{
													echo " <h6> $row[misision]</h6> ";
												}
											}
										?> </li>
                            </ul>
                        </div>
                    </div>
                </div>
				<div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                          
                        </div>
                        <div class="down-content">
                        
                            <ul type="roman">
                                <li><b>List of Executive Committee</b></li>
									<ol>
										<?php
											$conn = mysqli_connect("localhost", "root", "", "bits");
							
											if(!$conn) 
											{ 
												die(" Connection Error "); 
											}
											
											$query = "SELECT * FROM `about_us`";
											$result = mysqli_query($conn, $query);
												
											if($result)
											{
												while($row=mysqli_fetch_assoc($result))
												{
													echo " <h6> $row[executive_list]</h6> ";
												}
											}
										?> 
									</ol>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
	

            <div class="main-button text-center">
                <a href="guestregister.php">Register as a Member Now</a>
            </div>
        </div>
    </section>
    <!-- ***** Cards Ends ***** -->
     <?php include "footerAdmin.php";?>