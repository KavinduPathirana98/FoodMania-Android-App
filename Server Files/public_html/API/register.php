<?php

require 'init.php';

$f_name=$_POST["f_name"];
$l_name=$_POST["l_name"];
$email=$_POST["email"];
$password=$_POST["password"];
$profile_status=$_POST["status"];
$user_category_id=$_POST["user_category_id"];

if($con)
{
    $sql=" select * from  user where email='$email'";
    $result=mysqli_query($con,$sql); 

    if(mysqli_num_rows($result)>0)
    {
        $status="ok";
        $reuslt_code=0;
        echo json_encode(array('status'=>$status,'result'=>$reuslt_code));
    
    }
    else
    {
        $sql="insert into user ( `f_name`, `l_name`, `email`, `password`, `status`, `user_catergory_id`,`date`) values ('$f_name','$l_name','$email','$password','$profile_status','$user_category_id',CURRENT_DATE())";
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