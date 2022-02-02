<?php 
$currentPage = 'loginGuest.php';
include "headerLogin.php";
?>		
<!-- ***** LogIn/SignUp Starts ***** -->
		
		<div style=" width:100%; padding-top:30px">
        <form class="box" action="signupsql.php" method="post" onsubmit="return validate(this)" style="padding-left: 100px;border-color:#277264" enctype=			
        		"multipart/form-data" >  
			<br>
            
			      
            <h3 style="padding-right:503px; font-size: x-large: color: orange;"> BiTS Club Guest Sign Up</h3><hr>     

                <table>

                      
                    <tr>
                    	 <td><br><label for="id">Student Id</label> </td> 
                         <td><input type="text" maxlength="20" name="studentID" 
                         style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " ></td>
                    </tr> 
                    
                    <tr>
                        <td><br><label for="name">Name</label></td> 
						 <td><input type="text" maxlength="100" name="guest_name"
                         style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " ></td>
                    </tr> 
                                      
                    <tr>
                        <td><br><label for="email">Email</label></td> 
 						<td><input type="email" maxlength="64" name="guest_email"
                        style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " > </td>
                    </tr>  
                    
                    <tr>
                        <td><br><label for="password">Password</label></td> 
 						<td><input type="password" minlength="8" name="guest_pass"
                        style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " > </td>
                    </tr>  
                    
                    <tr>
                        <td><br><label for="confirmPassword">Comfirmation Password</label></td> 
 						<td><input type="password" minlength="8" name="guest_confirm_pass"
                        style="border: 1px solid grey; height:35px; width:500px;  margin-left: 15%; " > </td>
                    </tr>  
                    
              
                </table><hr>
                <div class="col-md-4">
                <input class="btn btn-block btn-primary" type="submit" name="memberSignup" value="Sign Up" style="font-size:18px; background-color: orange; color: whitesmoke;  "> 
			
			</div>
			
           </form>
    </div>
	
				
<!-- ***** LogIn/SignUp Ends ***** -->
 <?php include "footerAdmin.php";?>