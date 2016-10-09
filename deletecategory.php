<?php
session_start();
	include("db.php");

if(isset($_POST['delete']))
{
	$id=$_POST['ID'];
    if($id==0||$id=='')
    {
         header('Location:viewcategory.php');
                exit();
    }
	$sql="DELETE FROM `category` WHERE `CategoryID`= $id";
	  if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:viewcategory.php');
                exit();
            }
}

?>
