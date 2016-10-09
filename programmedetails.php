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
	 <?php
if(isset($_GET['programmeID'])){
	$pid=$_GET['programmeID'];

	$sql = "SELECT * FROM `programme` WHERE ProgrammeID=$pid";
	$r=mysqli_query($conn,$sql);
	$field=mysqli_fetch_assoc($r);
	$pgid=$field['GenreID'];
	$sql2 = "SELECT * from genre where GenreID=$pgid";
	$r2=mysqli_query($conn,$sql2);
	$f=mysqli_fetch_assoc($r2);
	$sql3 = "SELECT * from timeslot,programme where ProgrammeID=$pid and programme.TimeslotID=timeslot.TimeslotID";
	$r3=mysqli_query($conn,$sql3);
	$f2=mysqli_fetch_assoc($r3);
	$sql3 = "SELECT TIME(`ProgrammeTime`)  FROM programme WHERE ProgrammeID=$pid ";
	$r4=mysqli_query($conn,$sql3);
	$time=mysqli_fetch_assoc($r4);
	$sql4 = "SELECT ChannelName FROM programme,channel WHERE ProgrammeID=$pid and programme.ChannelID=channel.ChannelID";
	$r5=mysqli_query($conn,$sql4);
	$chname=mysqli_fetch_assoc($r5);
	$q="SELECT * from user where UserName='$login_user'";
	 $qr=mysqli_query($conn,$q);
	 $df=mysqli_fetch_assoc($qr);
	 $uid=$df['Id'];
	  $q1="SELECT * from programmebookmark  where ProgrammeID=$pid";
	 $qr1=mysqli_query($conn,$q1);
	 $df1=mysqli_fetch_assoc($qr1);
	 $bpid=$df1['ProgrammeID'];
	 $buid=$df1['UserID'];
      

	echo "<h1>".$field['ProgrameName']."</h1>"."<br>";
	if($bpid==$pid&&$buid==$uid)
	 {
	 		echo "BOOKMARKED<br>";
	 		echo '<a href="removeprogrammebookmark.php?pid='.$pid.'&uid='.$uid.'"><input type="submit" value="revomvebookmark" name="removepbookmark" style="background:#f1b696;font-weight:bold;"></a>';

	 }
	 else
	 {
	 		 echo '<a href="addprogrammebookmark.php?pid='.$pid.'&uid='.$uid.'"><input type="submit" value="bookmark" name="apbookmark" style="background:#c1f934;font-weight:bold;"></a>';

	 }
	 $sqlm = "SELECT((SELECT sum(Rating)from review where ProgrammeID=$pid)/(select count(ReviewID) from review where ProgrammeID=$pid)) ";
	 $resource=mysqli_query($conn,$sqlm);
	 $rating=mysqli_fetch_assoc($resource);
	echo "<br>rating:".implode("", $rating);
	echo"<p>Programme Type:   "."<strong>".$f['GenreName']."</strong>"."</p>";
    echo"<p>Programme Duration:   "."<strong>".$f2['SlotDuration']."</strong>"."</p>";
    echo "<h5> ProgrammeTime: ".implode("",$time)."</h5>";
	 echo "<h6>Description:   "."</h6>"."<p>".$field['ProgrammeDescription']."</p>";
	 echo "<h6>Channel Name: ".implode("", $chname)."</h6>";
}
	 	
	 	?>
	 	</div>
	 	
	 		<?php
	 			$qli="SELECT * FROM review where review.ProgrammeID=$pid";
	 			$rp=mysqli_query($conn,$qli);
	 			echo '<fieldset>';
	 	   echo '<legend>Reviews</legend>';
	 			while($dbf=mysqli_fetch_assoc($rp))
	 		{	echo '<div id="review">';

	 	        $qlo="SELECT  UserName from user where user.Id=$uid";
	 	        $rq=mysqli_query($conn,$qlo);
	 	        $namee=mysqli_fetch_assoc($rq);
	 	        echo  "<p>User:<strong> ".implode("", $namee).'</strong></p>';
	 			echo  "<p>Rating:<strong> ".$dbf['Rating'].'/5</strong></p>';
	 			echo  "<p>Title:<strong> ".$dbf['ReviewTitle'].'</strong></p>';
	 			echo  "<p>Rating:<strong> ".$dbf['ReviewDescription'].'</strong></p>';
	 			echo '<div>';
	 		}

	 		?>

	 	</fieldset>
	<div id="review input">
		<form name="review" method="POST" Action="reviewinput.php" >
		<fieldset>
		<legend>Review This Programme</legend>
		<?php
              $mqli="SELECT * FROM review where review.ProgrammeID=$pid and review.UserID=$uid";
	 			$rm=mysqli_query($conn,$mqli);
	 			$dbm=mysqli_fetch_assoc($rm);
		?>
		<p> 
			<input id="uid"  name="uid" type="hidden"  value="<?php echo $uid;?>" <?php if($dbm){echo 'disabled';}?>/>
		</p>
			<p>
			<input id="pid"  name="pid" type="hidden"  value="<?php echo $pid;?>" <?php if($dbm){echo 'disabled';}?>/>
		</p>
		 <?php if($dbm){echo '<h6> already reviewed!!!</p>';}?>
		<p>
			<label for="rating">Rating</label>
			<input id="rating"  name="rating" type="number" min="0" max="5" step=".25" value="0"<?php if($dbm){echo 'disabled';}?> />
		</p>

	<p>
			<label for="reviewtitle">Review Title</label>
			<input id="reviewtitle"  name="reviewtitle" type="text" <?php if($dbm){echo 'disabled';}?>/>
		</p>

	<p>
			<label for="description">Description</label>
			<input id="description"  name="description" type="text" <?php if($dbm){echo 'disabled';}?>/>
		</p>


<p>
	<input type="submit" value="review" name="review" <?php if($dbm){echo 'disabled';}?>>
</p>

		</fieldset>
		</form>


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

