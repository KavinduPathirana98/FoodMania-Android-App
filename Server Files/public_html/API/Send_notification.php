<?php

require 'init.php';

$sender_id=$_POST['sender_id'];
$receiver_id=$_POST['receiver_id'];
$content=$_POST['content'];

if($con)
{
    $sql="SELECT * FROM `notifications` WHERE (sender_id='$sender_id' and user_id='$receiver_id');";
    $result=mysqli_query($con,$sql); 

    if(mysqli_num_rows($result)>0)
    {
        $status="ok";
        $reuslt_code=0;
        echo json_encode(array('status'=>$status,'result'=>$reuslt_code));
    
    }
    else
    {
        $sql="INSERT INTO `notifications`(`content`, `status`, `user_id`, `sender_id`,`date`) VALUES ('$content',1,'$receiver_id','$sender_id',current_date());";
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