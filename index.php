<?php
session_start();
	include("db.php");?>
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
 <div class="col_6 column" id="jinish">
 	<h3 class="hover"><a href="index.php"><strong>Telly</strong>Guide</a></h3>
 </div>
 <div class="col_12 column" id="txt">
 <h5><i class="fa fa-desktop" style=" color:red;"></i><i class="fa fa-desktop" style=" color:green;"></i><i class="fa fa-desktop" style=" color:blue;"></i>Your one Stop TV Guide!!!!<i class="fa fa-desktop" style=" color:red;"></i><i class="fa fa-desktop" style=" color:green;"></i><i class="fa fa-desktop" style=" color:blue;"></i></h5>
	 </div>
 </header>
 <div class="col_12 column">
	<!-- Menu Horizontal -->
<ul class="menu" class="hover">
<li class="current"><a href="index.php"><i class="fa fa-home pull-left" ></i>Home</a></li>
<li><a href="channelslist.php"><i class="fa fa-desktop pull-left" ></i>channels</a></li>
<li><a href="register.php"><i class="fa fa-user pull-left" ></i>Register</a></li>
<li><a href="userlogin.php"><i class="fa fa-key pull-left" ></i>Log in</a></li>

</ul>
</div>
 <div id="search_area" class="col_12 column">
	<form class="horizontal" method="post" action="#">
		<input id="keywords" type="text" placeholder="Enter keywords......."/>
		<select id="channel_select">
		<?php print"<option>"."--Select Channel--"."</option>";
	$query="SELECT * FROM channel ORDER BY ChannelName asc";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				print "<option>".$row["ChannelName"]."</option>";
			}
?>
</select>
<select id="duration_select">
	<?php print"<option>"."--Select duration--"."</option>";
	$query="SELECT * FROM timeslot";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				print "<option>".$row["SlotDuration"]."</option>";
			}
?>

</select>
<button type="submit">Submit</button>
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
	<th>Channel list</th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th>Program List</th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
</tr></thead>
<tbody>
	
	<?php
	$sql = "SELECT * FROM `channel`";
	$r1=mysqli_query($conn,$sql);
	while($data=mysqli_fetch_assoc($r1))
	{
		echo "<tr >";
	echo '<th class ="headi">';
	$cID=$data['ChannelID'];
	$img=$data['ChannelLOGOUrl'];
	echo '<a href="channeldetails.php?channelID='.$cID.'">'."<img src=".$img." />"."</a>";
		echo'</th>';
		
		$sql2="SELECT  * from programme where programme.ChannelID=$cID";
		$r2=mysqli_query($conn,$sql2);
		While($pdata=mysqli_fetch_assoc($r2))
		{
			$pid=$pdata['ProgrammeID'] ;
    $sql3 = "SELECT TIME(`ProgrammeTime`)  FROM programme WHERE ProgrammeID=$pid ";
	$r3=mysqli_query($conn,$sql3);
	$time=mysqli_fetch_assoc($r3);
	echo '<div class="col_10 column" class="tablef">';
	echo "<td>";
    echo '<a href="programmedetails.php?programmeID='.$pid.'">'.'<p>'.$pdata['ProgrameName']."<p></a></div>";
	echo"<p>".implode("", $time)."</p>";
		}

	}
	

	?>
</tr>
</tbody>
</table>
	</div>
	<div id="container1">
			
			
			<header>
				<h1> TellyGuide shoutbox
				</h1>
	
			</header> 
			<div id="shouts">
			<ul>
				<?php
				$sql2="SELECT * FROM shoutbox ORDER BY ShoutID desc";
                  $shouts=mysqli_query($conn,$sql2);
				 while($result=mysqli_fetch_assoc($shouts)) :  ?>
					<li class="shout">
						<span><?php echo $result['Time'];?>-</span><strong> <?php $d=$result['UserID'];
						$a="SELECT * FROM user WHERE user.ID=$d";
						$b=mysqli_query($conn,$a);
						$c=mysqli_fetch_assoc($b); 
						echo $c['UserName']  ;?></strong>:  <?php  $d=$result['ProgrammeID'];$a="SELECT * FROM programme WHERE programme.ProgrammeID=$d";$b=mysqli_query($conn,$a);$c=mysqli_fetch_assoc($b); echo '<a href="programmedetails.php?programmeID='.$d.'">'.$c['ProgrameName']."</a>" ; ?>  <?php echo $result['Message'];?> 
					</li>
				<?php endwhile; ?>
				</ul>
			</div>
			<div id ="input">
			<?php if(isset($_GET['error'])): ?>
				<div class="error"><?php echo $_GET['error'];?></div>
			<?php endif;?>
			<div id ="input">
				<form method="POST"  action="process.php">
					<input type="text" name="user" placeholder="username" id="username">
			 		<select  name="pname"  id="programme_select" required="true">
			 		<option>select program</option>
			 		
			 		<?php
	$query="SELECT * FROM programme";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result))		
			{
				$pid=$row['ProgrammeID'];
				echo "<option value="."$pid".">".$row['ProgrameName']."</option>";/* value='<?php echo $row['ProgrameName']';?>*/
			}
?>
			 		</select>
 					<input type="text" name="message" placeholder="message" id="message" />
					<br/>
					<input class ="large orange" id="shoutSubmit" type="submit"  name="button"  value="say it out"/> 
				
					</form>
				
				</div>
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
