<?php
	
	session_start();

    $currentPage = 'gueststatus.php';
     include "headerGuest.php";


	if(isset($_POST['create'])){
	 $id = $_POST ['id'];
	 $name = $_POST ['name'];
	 $gender = $_POST ['gender'];
	 $programme = $_POST ['programme'];
	 $grp = $_POST ['grp'];
	 $phoneNo = $_POST ['phoneNo'];
	 $email = $_POST ['email'];
	 $guestpassword = $_POST ['guestpassword'];
	 $passwordConfirm = $_POST ['passwordConfirm'];
	 $registrationDate = $_POST ['registrationDate'];
	 
include "dbBits.php";

$sql = "INSERT INTO member_approval(studentID, mbr_name, mbr_gender, mbr_prog, mbr_group, mbr_phone, mbr_email, mbr_pass, mbr_confirm_pass, mbr_reg_date)
VALUES ('$id', '$name', '$gender', '$programme', '$grp', '$phoneNo', '$email', '$guestpassword', '$passwordConfirm', '$registrationDate') ; INSERT INTO guest (studentID, guest_name, guest_email, guest_pass, guest_confirm_pass) 
VALUES ('$id','$name','$email','$guestpassword','$passwordConfirm');";
$check_studentID = mysqli_query($conn, "SELECT studentID FROM member_approval where studentID = '$id'");
if (mysqli_num_rows($check_studentID)>0){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('User already exist. Please login.')
    window.location.href='loginguest.php';
    </SCRIPT>");
	} else {
		if (mysqli_multi_query($conn, $sql)) {
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='gueststatus.php';
    </SCRIPT>");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	mysqli_close($conn);
}

}
?>

</div>

<!-- PHP DONE -->

   <!-- ***** Registration Starts ***** -->
  <div style=" width:100%; padding-top:30px">
        <form class="box" action="guestregister.php" method="post" onsubmit="return validate(this)" style="padding-left: 100px;border-color:#277264" enctype=			
        		"multipart/form-data" >  
			<br>
            
			      
            <h3 style="padding-right:503px; font-size: x-large: color: orange;"> BiTS Club Guest Registration</h3><hr>     

                <table>

                      
                    <tr>
                    	 <td><br><label for="id">Student Id</label> </td> 
                         <td><input type="number" maxlength="20" name="id" 
                         style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " required></td>
                    </tr> 
                    
                    <tr>
                        <td><br><label for="name">Name</label></td> 
						 <td><input type="text" maxlength="100" name="name"
                         style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " required></td>
                    </tr>
                    
                    <tr>
                        <td><br><label for="gender">Gender</label></td> 
 						<td><select class="gender" type="gender" id="gender" name="gender"  
                        style="border: 1px solid grey; height:35px; width:500px		;  margin-left: 15%; "required>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                     </select> </td>
                    </tr>
                    
                    <tr>
                        <td><br><label for="programme">Programme</label></td> 
 						<td><select class="programme" type="programme" id="programme" name="programme" placeholder="programme code" 
                        style="border: 1px solid grey; height:35px; width:500px		;  margin-left: 15%; "required>
                                          <option value="CS240">CS240</option>
                                          <option value="CS245">CS245</option>
                                          <option value="CS251">CS251</option>
                                          <option value="CS255">CS255</option>
                                     </select> </td>
                    </tr>
                    
                    <tr>
                        <td><br><label for="grp">Group</label></td> 
 						<td><input type="text" maxlength="8" name="grp" 
                        style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; "required > </td>
                    </tr>
                    
                    
                    <tr>
                        <td><br><label for="phoneNo">Phone Number</label></td> 
 						<td><input type="text" maxlength="11" name="phoneNo"
                        style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " required> </td>
                    </tr>  
                                      
                    <tr>
                        <td><br><label for="email">Email</label></td> 
 						<td><input type="email" maxlength="64" name="email"
                        style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " required> </td>
                    </tr>  
                    
                    <tr>
                        <td><br><label for="guestpassword">Password</label></td> 
 						<td><input type="password" minlength="8" name="guestpassword"
                        style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " required> </td>
                    </tr>  
                    
                    <tr>
                        <td><br><label for="passwordConfirm">Confirmation Password</label></td> 
 						<td><input type="password" minlength="8" name="passwordConfirm"
                        style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " required> </td>
                    </tr>  
                    
                    <tr>
                        <td><br><label for="registrationDate">Registration Date</label></td> 
 						<td><input type="date"  name="registrationDate"
                        style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " required> </td>
                    </tr>   
                    
              
                </table><hr>
                <input class="btn btn-primary" type="submit" name="create" value="Register"/>
                
           </form>
    </div>
    <!-- ***** Registration Ends ***** -->

   <?php include "footerAdmin.php";?>