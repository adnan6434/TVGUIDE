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
if(isset($_POST['addchannel']))
{
	$Ch=mysqli_real_escape_string($conn,$_POST['channelname']);
	$des=mysqli_real_escape_string($conn,$_POST['channeldescription']);
	$logo=mysqli_real_escape_string($conn,$_POST['channellogourl']);
	$cat=$_POST['channelcategoryid'];
	$sql = "INSERT INTO `channel` (`ChannelName`, `ChannelDescription`, `ChannelLOGOUrl`, `ChannelCategoryID`)
       VALUES ('$Ch','$des','$logo','$cat')";
        if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:viewchannels.php');
                exit();
            }
}

?>
<form id="add_channel" method="POST" action="addchannels.php">
	<fieldset>
	<legend>Add channel</legend>
	<p>All fields are required</p>
	<?php if(isset($_GET['error'])): ?>
				<div class="error"><?php echo $_GET['error'];?></div>
			<?php endif;?>
		
		<p>
			<label for="channelname">ChannelName</label>
			<input id="channelname"  name="channelname" type="text" required="true"/>
		</p>
		<p>
			<label for="channeldescription">Channel Description</label>
			<input id="channeldescription"  name="channeldescription" type="text" required="true"/>
		</p>
		<p>
			<label for="channellogourl">LOGOUrl</label>
			<input id="channellogourl"  name="channellogourl" type="text"  required="true" />

		</p>

		<p>
			<label for="channelcategoryid">CategoryID</label>
			<?php
			$sql="SELECT count(CategoryID) FROM category";
			$r=mysqli_query($conn,$sql) ;
			$f=mysqli_fetch_assoc($r);
			echo "<input type='number' name='channelcategoryid' required='true' min='1' max='".implode("",$f)."'step='1'></p>";
			?>

<p>
	<input type="submit" value="addchannel" name="addchannel">
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
