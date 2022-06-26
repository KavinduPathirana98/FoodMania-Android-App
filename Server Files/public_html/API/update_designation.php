<?php
include 'init.php';

if($con)
{
    $user_id=$_POST['user_id'];
    $designation=$_POST['description'];

    $sql="update `profile` set designation='$designation' WHERE `user_id`='$user_id'";
    
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