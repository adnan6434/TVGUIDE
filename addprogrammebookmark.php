<?php
include("db.php");
if(isset($_GET['pid'])&&isset($_GET['uid']))
{
$pid=$_GET['pid'];
$uid=$_GET['uid'];
$sql="INSERT INTO `programmebookmark` (`ProgrammeID`,`UserID` ) VALUES ('$pid','$uid')";
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