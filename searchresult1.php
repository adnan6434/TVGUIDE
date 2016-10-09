<?php

	include("db.php"); 
 
?>
<?php
$x="";	
	session_start();
	if(isset($_SESSION['name'])){
		//echo "YES";
		$login_user=$_SESSION['name'];
		$ses_role=$_SESSION['role'];
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
  <h6 class="hello " >Hello, <em><?php echo $login_user;?>!</em></h6>
 
    <a href="logout.php" style="font-size:18px;float:right;color:#a42017;">Logout?</a>
    <?php  if($ses_role==1)
    {
    	echo '<a href="adminhome.php" style="font-size:18px;float:center;color:#a42017;">adminhome</a>';
    }
    ?>
    
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
<li><a href="channelslist.php"><i class="fa fa-desktop pull-left" ></i>channels</a></li>
<li><a href="register.php"><i class="fa fa-user pull-left" ></i>Register</a></li>
<li><a href="userlogin.php"><i class="fa fa-key pull-left" ></i>Log in</a></li>

</ul>
</div>
 <div id="search_area" class="col_12 column">
 <?php if(isset($_GET['error1'])): ?>
				<div class="error"><?php echo $_GET['error1'];?></div>
			<?php endif;?>
	<form class="horizontal" method="post" action="search.php">
		<input id="keywords" type="text" placeholder="Enter keywords......." name="key"/>
		<select id="channel_select" name="ckey">
		<?php print"<option>"."--Select Channel--"."</option>";
	$query="SELECT * FROM channel ORDER BY ChannelName asc";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result))
			{    $cid=$row['ChannelID'];
				print "<option value='$cid' >".$row["ChannelName"]."</option>";
			}
?>
</select>
<select id="duration_select" name='tkey'>
	<?php print"<option>"."--Select duration--"."</option>";
	$query="SELECT * FROM timeslot";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result))
			{     $tsi=$row['TimeslotID'];
				print "<option value='$tsi'>".$row["SlotDuration"]."</option>";
			}
?>

</select>
<button type="submit" name="search">Submit</button>
	</form>
</div>
<!-- <div class="col_12 column">
	<ul class="slideshow">
<li><img src="img/d.jpg "/></li>
<li><img src="img/e.jpg "/></li>
<li><img src="img/f.jpg "/></li>
	</ul>
	</div>
	 -->
<div class="co_12 column">
	<table cellspacing="0" cellpadding="1px" class="striped">
<thead><tr>
	<th>Program Name</th>
	<th>Channel Name</th>
	<th>Time</th>
	<th>Duration</th>
</tr></thead>
<tbody>
	
	<?php
if(isset($_GET['key']))
{
	$key='%'.$_GET['key'].'%';
	 $sql = "SELECT * FROM `programme` WHERE `ProgrameName` LIKE '$key'";
	 $r=mysqli_query($conn,$sql);
	 while($df=mysqli_fetch_assoc($r))
	 {
	 	$pname=$df['ProgrameName'];
	 	$pid=$df['ProgrammeID'];
	 	$cid=$df['ChannelID'];
	 	$t=$df['ProgrammeTime'];
	 	$tsi=$df['TimeSlotID'];
	 	$sql2="SELECT * channel where ChannelID=$cid";
	 	$r2=mysqli_query($conn,$sql2);
	 	$df2=mysqli_fetch_assoc($r2);
	 	$cname=$df2['ChannelName'];
	 	$sql3="SELECT * timeslot where TimeslotID=$tsi";
	 	$r3=mysqli_query($conn,$sql3);
	 	$df3=mysqli_fetch_assoc($r3);
	 	$duna=$df3['SlotDuration'];
	 	$sql4 = "SELECT TIME(ProgrammeTime)FROM `programme` WHERE `ProgrammeID`=$pid";
	 		$r4=mysqli_query($conn,$sql4);
	 	$time=mysqli_fetch_assoc($r4);
	 	echo '<tr>';
	 	echo '<td>'.'<a href="programmedetails.php?programmeID='.$pid.'">'.$pname."</a></td>";
	 	echo '<td>'.'<a href="channeldetails.php?channelID='.$cid.'">'.$cname."</a></td>"; 
	 	echo '<td>'.implode("",$time)."</td>";
	 	echo '<td>'.$duna.'</td>';

	 }

}

	?>
</tr>
</tbody>
</table>
	</div>

	<div class="clearfix"></div>
<footer class="center" id="footer">
<ul style="display:inline-block;">
				<li style="display:inline-block; margin:5px;"><strong>Follow Us On:</strong></li>
				<li style="display:inline-block ;margin:5px;"><i class="fa fa-twitter fa-2x"></i><a href="">Twitter</a></li>
				<li style="display:inline-block;margin:5px;"><a href=""><i class="fa fa-facebook fa-2x"></i>Facebook</a></li>
				<li style="display:inline-block;margin:5px;"><a href=""><i class="fa fa-linkedin fa-2x"></i>LinkedIn</a></li>
			</ul>
	<p>Copyrights <i class="fa fa-copyright"> </i>TellyGuide. ALL RIGHTS RESERVED<p>
</footer>
</div> <!-- End Grid -->
</body>
</html>
