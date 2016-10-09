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
 	<h3 class="hover"><a href="index.php"><strong>Telly</strong>Guide</a></h3>
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
	 <?php
	 
	
if(isset($_GET['channelID'])){
	$cid=$_GET['channelID'];
	$sql = "SELECT * FROM `channel` WHERE channelID=$cid";
	$r=mysqli_query($conn,$sql);
	$field=mysqli_fetch_assoc($r);
	$img=$field['ChannelLOGOUrl'];
	$sql2 = "SELECT CategoryName from category,channel where  channelID=$cid and category.CategoryID=channel.ChannelCategoryID";
	$r2=mysqli_query($conn,$sql2);
	$f=mysqli_fetch_assoc($r2);
	 $q="SELECT * from user where UserName='$login_user'";
	 $qr=mysqli_query($conn,$q);
	 $df=mysqli_fetch_assoc($qr);
	 $uid=$df['Id'];
	  $q1="SELECT * from channelbookmark  where ChannelID=$cid and UserID=$uid";
	 $qr1=mysqli_query($conn,$q1);
	 $df1=mysqli_fetch_assoc($qr1);
	 $bcid=$df1['ChannelID'];
	 $buid=$df1['UserID'];
      
	echo '<a href="channeldetails.php?channelID='.$cid.'">'."<img src=".$img." />". "<h1>".$field['ChannelName']."</h1>"."<br>"."<br>"."</a>";
	echo"<p>Channel Category:   "."<strong>".implode("", $f)."</strong>"."</p>";
	 echo "<h6>Description:   "."</h6>"."<p>".$field['ChannelDescription']."</p>";
 if($bcid==$cid&&$buid==$uid)
	 {
	 		echo "BOOKMARKED<br>";
	 		echo '<a href="removechannelbookmark.php?chid='.$cid.'&uid='.$uid.'"><input type="submit" value="revomvebookmark" name="removebookmark" style="background:#f1b696;font-weight:bold;"></a>';

	 }
	 else
	 {
	 		 echo '<a href="addchannelbookmark.php?chid='.$cid.'&uid='.$uid.'"><input type="submit" value="bookmark" name="bookmark" style="background:#c1f934;font-weight:bold;"></a>';

	 }
	 //'<input type="submit" value="Bookmark" name="Bookmark">'.'
	
}
	 	
	 	?>

	 	




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
	<p>Copyrights <i class="fa fa-copyright"> </i>TellyGuide. ALL RIGHTS RESERVED<p>
</footer>
</div> <!-- End Grid -->
</body>
</html>

