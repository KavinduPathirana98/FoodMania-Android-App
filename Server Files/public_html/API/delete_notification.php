<?php

require 'init.php';

$sender_id=$_POST['sender_id'];
$receiver_id=$_POST['receiver_id'];


if($con)
{
 
        $sql="DELETE FROM `notifications` where content='Sent a Friend Request' and sender_id='$sender_id' and user_id='$receiver_id';";
        
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
else
{

    $status="failed";
    echo json_encode(array('status'=>$status),JSON_FORCE_OBJECT);
}
mysqli_close($con);
?>