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
 </header>
 <div class="col_12 column" id="txt">
 <h5><i class="fa fa-desktop" style=" color:red;"></i><i class="fa fa-desktop" style=" color:green;"></i><i class="fa fa-desktop" style=" color:blue;"></i>Your one Stop TV Guide!!!!<i class="fa fa-desktop" style=" color:red;"></i><i class="fa fa-desktop" style=" color:green;"></i><i class="fa fa-desktop" style=" color:blue;"></i></h5>

	 </div>
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
<div class="col_12 column">
<?php
$sql = "SELECT * FROM `channel`";
$r=mysqli_query($conn,$sql);
echo '<table cellspacing="0" cellpadding="1px" class="striped">';
echo '<thead><tr>';
echo "<th></th>";
echo "<th>ChannelID</th>";
echo "<th>ChannelName</th>";
echo "<th>ChannelCategoryID</th>";
echo "<th>ChannelCategory</th>";
echo "<th>Channel Description</th>";
echo "<th>ChannelLOGOUrl</th>";

echo'</tr></thead>
<tbody>';
while($f=mysqli_fetch_assoc($r))
{ $cat=$f['ChannelCategoryID'];
$sql2 = "SELECT * from category WHERE CategoryID=$cat";
$r2=mysqli_query($conn,$sql2);
$f2=mysqli_fetch_assoc($r2) ;
$img=$f['ChannelLOGOUrl'];
$id=$f['ChannelID'];
echo "<tr >";
echo "<td><img src='$img'>";
echo "<td>".$f['ChannelID']."</td>";
echo "<td>".$f['ChannelName']."</td>";
echo "<td>".$f['ChannelCategoryID']."</td>";
echo "<td>".$f2['CategoryName']."</td>";
echo "<td>".$f['ChannelDescription']."</td>";
echo "<td>".$f['ChannelLOGOUrl']."</td>";
echo "<td>"."<a href='channelupdate.php?cid=".$id."'>"."EDIT"."</a></td>";
echo "</tr>";


}
echo "</tbody></table>";
?>


</div>
	<div class="clearfix"></div>
<footer class="center" id="footer">
	<p>Copyrights <i class="fa fa-copyright"> </i>TellyGuide. ALL RIGHTS RESERVED<p>
</footer>
</div> <!-- End Grid -->
</body>
</html>
