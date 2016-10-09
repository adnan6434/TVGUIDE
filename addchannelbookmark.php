<?php
include("db.php");
if(isset($_GET['chid'])&&isset($_GET['uid']))
{
$chid=$_GET['chid'];
$uid=$_GET['uid'];
$sql="INSERT INTO `channelbookmark` (`UserID`, `ChannelID`) VALUES ('$uid', '$chid')";
 if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {   $link='Location:channeldetails.php?channelID='.$chid;
                header($link);
                exit();
            }
}
?>