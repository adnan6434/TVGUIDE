<?php
include("db.php");
if(isset($_POST['review']))
{
	$uid=$_POST['uid'];
	$pid=$_POST['pid'];
	$rating=$_POST['rating'];
	$title=$_POST['reviewtitle'];
	$des=$_POST['description'];

	$sql="INSERT INTO `review` ( `UserID`, `ProgrammeID`, `Rating`, `ReviewTitle`, `ReviewDescription`) VALUES ( '$uid', '$pid', '$rating', '$title', '$des')";
	if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {   $link='Location:programmedetails.php?programmeID='.$pid;
                header($link);
                exit();
            }
}


?>