 <?php
session_start();


include 'dbBits.php';

    if(isset($_POST['memberSignup']))
    {		
        
        $studentID = $_POST['studentID'];
        $guest_name =$_POST['guest_name'];
        $guest_email =$_POST['guest_email'];
        $guest_pass = $_POST['guest_pass'];
        $guest_confirm_pass = $_POST['guest_confirm_pass'];

        $insert = "INSERT INTO guest (studentID, guest_name, guest_email, guest_pass,guest_confirm_pass) 
        VALUES ('$studentID', '$guest_name', '$guest_email', '$guest_pass', '$guest_confirm_pass')";
    
        if ($db->query($insert) === TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.alert("Record updated successfully");';
            echo 'location.replace("loginGuest.php");';
            echo '</script>';
        } else {
        echo "Error: " . $insert . "<br>" . $db->error;
        }
    }
    
    mysqli_close($db); // Close connection

?> 