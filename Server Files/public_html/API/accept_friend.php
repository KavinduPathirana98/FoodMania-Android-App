<?php

require 'init.php';

$sender_id=$_POST['sender_id'];
$receiver_id=$_POST['receiver_id'];


if($con)
{
    $sql="UPDATE `friend_req` SET `status`=1 WHERE `sender_id`='$sender_id' and `receiver_id`='$receiver_id' ";
    $result=mysqli_query($con,$sql); 

    if(mysqli_num_rows($result)>0)
    {
        $status="ok";
        $reuslt_code=1;
        echo json_encode(array('status'=>$status,'result'=>$reuslt_code));
    
    }
    else
    {
        $status="ok";
        $reuslt_code=0;
        echo json_encode(array('status'=>$status,'result'=>$reuslt_code));
    }
}
else
{

    $status="failed";
    echo json_encode(array('status'=>$status),JSON_FORCE_OBJECT);
}
mysqli_close($con);
?>