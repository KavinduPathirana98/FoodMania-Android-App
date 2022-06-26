<?php

require 'init.php';

$user_id=$_POST["user_id"];

$sql=" SELECT `f_name`, `l_name` FROM `user` where user_id='$user_id';";
$result=mysqli_query($con,$sql); 

if($con)
{
     if(mysqli_num_rows($result)>0)
    {   $row=mysqli_fetch_assoc($result);
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $status="ok";
        $reuslt_code=1;
        echo json_encode(array('status'=>$status,'result'=>$reuslt_code,'f_name'=>$f_name,'l_name'=>$l_name));
    
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