<?php
session_start();
	include("db.php");

if(isset($_POST['delete']))
{
	$id=$_POST['ID'];
    if($id==0 || $id=='')
    {
        header('Location:viewgenre.php');
                exit();
    }
	$sql="DELETE FROM `genre` WHERE `GenreID`= $id";
	  if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:viewgenre.php');
                exit();
            }
}

?>
