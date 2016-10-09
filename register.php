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
 	<h3 class="hover"><a href="userhome.php"><strong>Telly</strong>Guide</a></h3>
 </div>
 <div class="col_12 column" id="txt">
 <h5><i class="fa fa-desktop" style=" color:red;"></i><i class="fa fa-desktop" style=" color:green;"></i><i class="fa fa-desktop" style=" color:blue;"></i>Your one Stop TV Guide!!!!<i class="fa fa-desktop" style=" color:red;"></i><i class="fa fa-desktop" style=" color:green;"></i><i class="fa fa-desktop" style=" color:blue;"></i></h5>
	 </div>
 </header>
 <div class="col_12 column">
	<!-- Menu Horizontal -->
<ul class="menu" class="hover">
<li class="current"><a href="userhome.php"><i class="fa fa-home pull-left" ></i>Home</a></li>
<li><a href="channelslist.php"><i class="fa fa-desktop pull-left" ></i>channels</a></li>
<li><a href="register.php"><i class="fa fa-user pull-left" ></i>Register</a></li>
<li><a href="userlogin.php"><i class="fa fa-key pull-left" ></i>Log in</a></li>

</ul>
</div>
 <div class="col_12 column">
	<form id="reg_form" method="POST" action="registercomplete.php">
	<fieldset>
	<legend>Create An Account</legend>
	<p>All fields are required</p>
	<?php if(isset($_GET['error'])): ?>
				<div class="error"><?php echo $_GET['error'];?></div>
			<?php endif;?>
		<p>
			<label for="first_name">First Name</label>
			<input id="first_name"  name="first_name" type="text" required="true" />
		</p>
		<p>
			<label for="last_name">Last Name</label>
			<input id="last_name"  name="last_name" type="text" required="true"/>
		</p>
		<p>
			<label for="date_of_birth">Date of birth</label>
			<input id="date_of_birth"  name="date_of_birth" type="date" placeholder="xxxx-xx-xx" required="true" />
		</p>
		
		<p>
			<label for="email">Email</label>
			<input id="email"  name="email" type="email" required="true"/>
		</p>
		<p>
			<label for="username">UserName</label>
			<input id="Username"  name="username" type="text" required="true"/>
		</p>
		<p>
			<label for="password">Password</label>
			<input id="password"  name="password" type="password" placeholder="Must be 8 characters long" required="true" />

		</p>

		<p>
			<label for="password2">Confirm password</label>
			<input id="password2"  name="password2" type="password" required="true"/>
		</p>
		<p>
			<input type="hidden" name="roleid" value="2">
		</p>

<p>
	<input type="submit" value="register" name="register">
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
