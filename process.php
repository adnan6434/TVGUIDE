<?php include'db.php';
?>
<?php

if(isset($_POST['button']))
{
    $user=mysqli_real_escape_string($conn,$_POST['user']);
    $pid=$_POST['pname'];
    $message=mysqli_real_escape_string($conn,$_POST['message']);
    date_default_timezone_set('Asia/Dhaka');
    $time=date('h:i:s A',time());
    //retrieving role of the user for chat permission
    $sql="SELECT * FROM user WHERE user.UserName='$user'";
    $res=mysqli_query($conn,$sql);
    $rowd=mysqli_fetch_assoc($res);
    $role=$rowd['RoleID'];

    if(isset($user) && $user!=''&&isset($message)&&$message!=''&&isset($pid)&&$pid!=''||$pid=='select program')
    {
        if($role==1 &&$pid=='select program'&&$message!='')
        {
            $pid=0;
            $a="SELECT * FROM user WHERE user.UserName='$user'";
            $b=mysqli_query($conn,$a);
            $c=mysqli_fetch_assoc($b);
            $g=$c['Id'];
            if($g == 0)
            {
                $error="Please register to chat ";
                header('Location:index.php?error='.urlencode($error).'#container1');
                exit();
            }

            $sql="INSERT INTO shoutbox (UserID,ProgrammeID,message,Time)
                 values('$g','$pid','$message','$time')";

            if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:index.php#container1');
                exit();
            }
        }
        else if(($role=2 &&$pid=='select program')||$role=1 &&$pid=='select program'&&$message=='')
        {
            $error="Please fill in all the fields";
            header('Location:index.php?error='.urlencode($error).'#container1');
            exit();
        }
        else
        {
            $a="SELECT * FROM user WHERE user.UserName='$user'";
            $b=mysqli_query($conn,$a);
            $c=mysqli_fetch_assoc($b);
            $g=$c['Id'];
            if($g == 0)
            {
                $error="Please  register to chat ";
                header('Location:index.php?error='.urlencode($error).'#container1');
                exit();
            }

            $sql="INSERT INTO shoutbox (UserID,ProgrammeID,message,Time)
                 values('$g','$pid','$message','$time')";

            if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:index.php#container1');
                exit();
            }


        }
    }

    else
    {
        $error="Please fill in all the fields";
        header('Location:index.php?error='.urlencode($error).'#container1');
        exit();
    }

}
?>
