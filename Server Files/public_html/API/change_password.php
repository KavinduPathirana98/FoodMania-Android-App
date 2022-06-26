<?php
include 'init.php';

if($con)
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="update `user` set password='$password' WHERE `email`='$email'";
    
   if(mysqli_query($con,$sql))
        {
            $status="ok";
            $reuslt_code=1;
            echo json_encode(array('status'=>$status,'result'=>$reuslt_code));
        }
        else
        {
            $status="failed";
            echo json_encode(array('status'=>$status),JSON_FORCE_OBJECT);
        }
}

mysqli_close($con);

?>