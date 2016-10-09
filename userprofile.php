<?php
session_start();
//author:ADNAN TAUFIQUE
	include("db.php");?>
	<?php
$x="";	
	if(isset($_SESSION['name'])){
		//echo "YES";
		$login_user=$_SESSION['name'];
			$login_user=$_SESSION['name'];
		$ses_role=$_SESSION['role'];
		$ql="SELECT *	 FROM user WHERE UserName='$login_user' ";
$resulto=mysqli_query($conn,$ql);
	$row=mysqli_fetch_assoc($resulto);
			$usid=$row['Id'];
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
<li ><a href="userhome.php"><i class="fa fa-home pull-left" ></i>Home</a></li>
<li><a href="userprofile.php?usid='<?php echo $usid;?>'"><i class="fa fa-user pull-left" ></i>Profile</a></li>
<li><a href="channelslist.php"><i class="fa fa-desktop pull-left" ></i>channels</a></li>
<li><a href="bookmarkedchannels.php"><i class="fa fa-desktop pull-left" ></i>Bookmarked channels</a></li>
<li><a href="bookmarkedprogrammes.php"><i class="fa fa-desktop pull-left" ></i>Bookmarked programmes</a></li>
<li><a href="register.php"><i class="fa fa-user pull-left" ></i>Register</a></li>
<li><a href="userlogin.php"><i class="fa fa-key pull-left" ></i>Log in</a></li>

</ul>
</div>
<div class="col_12 column">
<?php
if(isset($_GET['usid']))
{   $id=$_GET['usid'];
	$sql = "SELECT * FROM `user` where Id=$id";
$r=mysqli_query($conn,$sql);
echo '<table cellspacing="0" cellpadding="1px" class="striped">';
echo '<thead><tr>';
echo "<th>UserName</th>";
echo "<th>FirstName</th>";
echo "<th>LastName</th>";
echo "<th>Date OF Birth</th>";
echo "<th>Email</th>";
echo "<th>Role</th>";
echo "<th>            </th>";
echo "<th>Rights</th>";
echo "<th>            </th>";
echo'</tr></thead><tbody>';
while($f=mysqli_fetch_assoc($r))
{ $role=$f['RoleID'];
$sql2 = "SELECT * from role WHERE RoleID=$role";
$r2=mysqli_query($conn,$sql2);
$f2=mysqli_fetch_assoc($r2) ;
$sql9 = "SELECT DISTINCT(Rights) from role,rights,roledefination,user WHERE role.RoleID=$role and role.RoleID=roledefination.RoleID and roledefination.RightID=rights.RightID ";
$r9=mysqli_query($conn,$sql9);

$id=$f['Id'];
echo "<tr >";
echo "<td>".$f['UserName']."</td>";
echo "<td>".$f['FirstName']."</td>";
echo "<td>".$f['LastName']."</td>";
echo "<td>".$f['DateOfBirth']."</td>";
echo "<td>".$f['Email']."</td>";
echo "<td>".$f2['Rolename']."</td>" ;
while($f9=mysqli_fetch_assoc($r9))
{
	echo "<td>".implode("", $f9)."</td>" ;
}
echo "</tr>";


}

echo "</tbody></table>";
echo "<a href='userpupdate.php?id=".$id."'>"."<button style='background:#6dabfa ;color:#ffffff;'>EDIT</button>"."</a>";
}

?>


</div>
	<div class="clearfix"></div>
<footer class="center" id="footer">
	<p>Copyrights <i class="fa fa-copyright"> </i>TellyGuide. ALL RIGHTS RESERVED<p>
</footer>
</div> <!-- End Grid -->
</body>
</html>
