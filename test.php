	<?php 
	include("db.php");
	$query="SELECT * FROM timeslot";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				print "<p>".$row["SlotDuration"]."</p><br>";
			}
?>