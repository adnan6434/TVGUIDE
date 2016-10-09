<?php
session_start();
include("db.php"); 
 
if(isset($_POST['search']))
{  
	
	if(isset($_POST['key'])&&!isset($_POST['ckey'])&&!isset($_POST['tkey'])&&($_POST['tkey']=='--Select duration--'&&$_POST['ckey']=='--Select Channel--'))
	{
         $key=$_POST['key'];
           header('Location:searchresult1.php?key='.$key.'#result');

	}
	else if(!isset($_POST['key'])&&!isset($_POST['ckey'])&&!isset($_POST['tkey']))
	{
		    $error1="Please fill in atleast 1 Field ";
                header('Location:userhome.php?error='.urlencode($error1).'#search_area');
	}
}

?>