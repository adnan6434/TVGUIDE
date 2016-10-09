<?php
session_start();
include("db.php"); //Establishing connection with our database

$error = ""; //Variable for storing our errors.
if(isset($_POST['login']))
{
if(empty($_POST["username"]) || empty($_POST["password"]))
{
$error = "Both fields are required.";
 header('Location:userlogin.php?error='.urlencode($error));
                exit();
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

// To protect from MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
//Check username and password from database
$sql="SELECT *	 FROM user WHERE UserName='$username' and Password='$password'";
$result=mysqli_query($conn,$sql);

//If username and password exist in our database then create a session.
//Otherwise echo error.
if(mysqli_num_rows($result)>0)
{ 
	$row=mysqli_fetch_assoc($result);
			$_SESSION['name']=$row['UserName'];
			$_SESSION['role']=$row['RoleID'];
			$_SESSION['id']=$row['Id'];
			// Initializing Session
			if($_SESSION['role']==1)
			{
		       header("location:adminhome.php"); // Redirecting To Other Page
		       exit();
			}
			else if($_SESSION['role']==2)
			{
				
					header("location:userhome.php");
					exit();
			}


}
else
{
	
$error ="username  or password doesnt match";

 header('Location:userlogin.php?error='.urlencode($error));
             


}
}
}
?>