<?php

require 'init.php';

$sender_id=$_POST['sender_id'];
$receiver_id=$_POST['receiver_id'];


if($con)
{
    $sql=" SELECT * FROM `friend_req` WHERE (sender_id='$sender_id' and receiver_id='$receiver_id' and status=1) or (receiver_id='$sender_id' and sender_id='$receiver_id' and status=1);";
    $result=mysqli_query($con,$sql); 

    if(mysqli_num_rows($result)>0)
    {
        $status="ok";
        $reuslt_code=0;
        echo json_encode(array('status'=>$status,'result'=>$reuslt_code));
    
    }
    else
    {
        $sql="INSERT INTO `friend_req`( `sender_id`, `receiver_id`, `status`) VALUES ('$sender_id','$receiver_id',0);";
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
}
else
{

    $status="failed";
    echo json_encode(array('status'=>$status),JSON_FORCE_OBJECT);
}
mysqli_close($con);
?>