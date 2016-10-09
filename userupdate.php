<?php
session_start();
//author:ADNAN TAUFIQUE
	include("db.php");?>
	<?php
$x="";	
	if(isset($_SESSION['name'])&&$_SESSION['role']==1){
		//echo "YES";
		$login_user=$_SESSION['name'];
	}
	else
	{
		   header('Location:index.php');
                exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>TELLYGUIDE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="" />

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" /> 
	<link rel="icon" type="image/gif/png" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.css" media="all" /> 
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" media="all" /> 
	<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/kickstart.js"></script>
</head>
<body>
<div id="container" class="grid">
 <header>
 <div> <a href="logout.php" style="float:right; color:blue;">LOGOUT</a></div>
 <div class="col_6 column" id="jinish">
 	<h3 class="hover"><a href="userhome.php"><strong>Telly</strong>Guide</a></h3>
 </div>
 <div class="col_12 column" id="txt">
 <h5><i class="fa fa-desktop" style=" color:red;"></i><i class="fa fa-desktop" style=" color:green;"></i><i class="fa fa-desktop" style=" color:blue;"></i>Your one Stop TV Guide!!!!<i class="fa fa-desktop" style=" color:red;"></i><i class="fa fa-desktop" style=" color:green;"></i><i class="fa fa-desktop" style=" color:blue;"></i></h5>

	 </div>
 </header>
<div class="col_12 column">
	<!-- Menu Horizontal -->
<ul class="menu" class="hover">
<li ><a href="adminhome.php"><i class="fa fa-home pull-left" ></i>AdminHome</a></li>
<li><a href="viewusers.php"><i class="fa fa-user pull-left" ></i>Users</a></li>
<li><a href="viewchannels.php"><i class="fa fa-desktop pull-left" ></i>channels</a></li>
<li><a href="viewprogrammes.php"><i class="fa fa-key pull-left" ></i>Programmes</a></li>
<li><a href="viewgenre.php"><i class="fa fa-user pull-left" ></i>Genre</a></li>
<li><a href="viewcategory.php"><i class="fa fa-user pull-left" ></i>Category</a></li>
<li><a href="adduser.php"><i class="fa fa-plus pull-left" ></i>Add user</a></li>
<li><a href="addchannels.php"><i class="fa fa-plus pull-left" ></i>Add channel</a></li>
<li><a href="addprogrammes.php"><i class="fa fa-plus pull-left" ></i>Add Programmes</a></li>
<li><a href="deleteusers.php"><i class="fa fa-trash pull-left" ></i>Delete user</a></li>
<li><a href="deletechannels.php"><i class="fa fa-trash pull-left" ></i>Delete Channel</a></li>
<li><a href="deleteprogramme.php"><i class="fa fa-trash pull-left" ></i>Delete Programmes</a></li>
</ul></div>
<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="SELECT * from user where Id=$id";
$r=mysqli_query($conn,$sql);
$f=mysqli_fetch_assoc($r);
    $uid=$f['Id'];
    $firstname1=$f['FirstName'];
	$lastname1=$f['LastName'];
	$email1=$f['Email'];
	$DOB1=$f['DateOfBirth'];
	$username1=$f['UserName'];
	$password1=$f['Password'];
	$roleid1=$f['RoleID'];
}

if(isset($_POST['Update']))
{    $Id=$_POST['id'];
	$firstname=mysqli_real_escape_string($conn,$_POST['first_name']);
	$lastname=mysqli_real_escape_string($conn,$_POST['last_name']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$DOB=mysqli_real_escape_string($conn,$_POST['date_of_birth']);
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$roleid=$_POST['roleid'];
	$sql = "UPDATE `user` SET `FirstName` = '$firstname', `LastName` = '$lastname', `Email` = '$email', `DateOfBirth` = '$DOB', `RoleID` = $roleid WHERE `user`.`Id` = $Id ";
        if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:viewusers.php');
                exit();
            }
}

?>
<form id="add_form" method="POST" action="userupdate.php">
	<fieldset>
	<legend>Edit user</legend>
	<p>All fields are required</p>
	<?php if(isset($_GET['error'])): ?>
				<div class="error"><?php echo $_GET['error'];?></div>
			<?php endif;?>
				<p>
			<input id="id"  name="id" type="hidden" required="true" 
			 value="<?php echo $uid;?>" />
		</p>
		<p>
			<label for="first_name">First Name</label>
			<input id="first_name"  name="first_name" type="text" required="true" 
			 value="<?php echo $firstname1;?>" />
		</p>
		<p>
			<label for="last_name">Last Name</label>
			<input id="last_name"  name="last_name" type="text" required="true"  value="<?php echo $lastname1;?>"/>
		</p>
		<p>
			<label for="date_of_birth">Date of birth</label>
			<input id="date_of_birth"  name="date_of_birth" type="date" placeholder="xxxx-xx-xx" required="true"  value="<?php echo $DOB1;?>"/>
		</p>
		
		<p>
			<label for="email">Email</label>
			<input id="email"  name="email" type="email" required="true"  value="<?php echo $email1;?>"/>
		</p>
		<p>
			<label for="username">UserName</label>
			<input id="Username"  name="username" type="text" required="true"  value="<?php echo $username1;?>" disabled/>
		</p>
		<p>
			<label for="password">Password</label>
			<input id="password"  name="password" type="password" placeholder="Must be 8 characters long" required="true"  value="<?php echo $password1;?>"/>

		</p>

		<p>
			<label for="role">role</label>
			<input type="number" name="roleid"  value="<?php echo $roleid1;?>" required="true" min='1' max="2" value="1" step="1">
		<p>
			
		</p>

<p>
	<input type="submit" value="Update" name="Update" style="background:yellow;">
</p>
</fieldset>
	</form>

</div>
	<div class="clearfix"></div>
<footer class="center" id="footer">
	<p>Copyrights <i class="fa fa-copyright"> </i>TellyGuide. ALL RIGHTS RESERVED<p>
</footer>
</div> <!-- End Grid -->
</body>
</html>
