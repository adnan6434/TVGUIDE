<?php
session_start();
	include("db.php");?>
<?php
if(isset($_POST['register']))
{
	$firstname=mysqli_real_escape_string($conn,$_POST['first_name']);
	$lastname=mysqli_real_escape_string($conn,$_POST['last_name']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$DOB=mysqli_real_escape_string($conn,$_POST['date_of_birth']);
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$conpass=mysqli_real_escape_string($conn,$_POST['password2']);
	$roleid=$_POST['roleid'];

if($password!=$conpass)
{
	           $error="Passwords Doesn't match";
                header('Location:register.php?error='.urlencode($error));
                exit();
}
else
{

$sql = "INSERT INTO user (FirstName,LastName, UserName, Email, Password, DateOfBirth, RoleID)
       VALUES ('$firstname','$lastname','$username','$email','$password','$DOB','$roleid')";
        if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:userlogin.php');
                exit();
            }

}
    
}

?>