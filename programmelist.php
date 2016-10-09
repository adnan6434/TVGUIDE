<?php
session_start();
//author:ADNAN TAUFIQUE
	include("db.php");?>
	<?php
$x="";	
	if(isset($_SESSION['name'])){
		//echo "YES";
			$login_user=$_SESSION['name'];
		$ses_role=$_SESSION['role'];
		$ql="SELECT *	 FROM user WHERE UserName='$login_user' ";
$resulto=mysqli_query($conn,$ql);
	$row=mysqli_fetch_assoc($resulto);
			$usid=$row['Id'];
	}
	else
	{
		  header('Location:userlogin.php');
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
 
 
<!-- <div class="col_12 column">
	<ul class="slideshow">
<li><img src="img/d.jpg "/></li>
<li><img src="img/e.jpg "/></li>
<li><img src="img/f.jpg "/></li>
	</ul>
	</div>
	 -->
	 <div id="programme_details">
      <!-- List Icons -->
      <?php   
if(isset($_GET['channelID'])){
	$cid=$_GET['channelID'];
	$sql1="SELECT ChannelName,ChannelLOGOUrl from channel where ChannelID=$cid";
	$r1=mysqli_query($conn,$sql1);
	$df=mysqli_fetch_assoc($r1);
	$cname= $df['ChannelName'];
  $img=$df['ChannelLOGOUrl'];
  
      echo"<h3 class='center'>";
      echo'<a href="channeldetails.php?channelID='.$cid.'">'."<img src=".$img." />".$cname."</a></h3>";
 	  echo "<ol class='icons center'>";

$sql = "SELECT * FROM programme where programme.ChannelID=$cid order by ProgrameName asc";
$r=mysqli_query($conn,$sql);
while($field=mysqli_fetch_assoc($r))
{ 
	$pid=$field['ProgrammeID'];
echo  "<li style='font-size:20px;'>".'<a href="programmedetails.php?programmeID='.$pid.'">'.$field['ProgrameName']."</a></li>";
}

}
?>


</ol>
</div>
	

	<div class="clearfix"></div>
<footer class="center" id="footer">
	<p>Copyrights <i class="fa fa-copyright"> </i>TellyGuide. ALL RIGHTS RESERVED<p>
</footer>
</div> <!-- End Grid -->
</body>
</html>


