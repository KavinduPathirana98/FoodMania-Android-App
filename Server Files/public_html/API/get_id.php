<?php
include 'init.php';

if($con)
{
    $email=$_POST['email'];
   

    $sql="SELECT user_id FROM `user` WHERE `email`='$email';";
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $status="ok";
        $result_code=1;      
        $user_id=$row['user_id'];
        echo json_encode(array('status'=>$status,'result'=>$result_code,'user_id'=>$user_id));

    }

    else
    {
        $status="ok";
        $result_code=0;
        echo json_encode(array('status'=>$status,'result'=>$result_code));
    }


}
else
{

    $status="failed";
    echo json_encode(array('status'=>$status),JSON_FORCE_OBJECT);
}

mysqli_close($con);

?>