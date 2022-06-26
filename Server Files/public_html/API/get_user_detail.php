<?php
include 'init.php';

if($con)
{
    $user_id=$_POST['user_id'];
 

    $sql="SELECT * FROM `user` WHERE `user_id`='$user_id'";
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $status="ok";
        $result_code=1;      
        $user_id=$row['user_id'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $user_email=$row['email'];
        $user_password=$row['password'];
        $profile_status=$row['status'];
        $user_category_id=$row['user_catergory_id'];
        echo json_encode(array('status'=>$status,'result'=>$result_code,'user_id'=>$user_id,'f_name'=>$f_name,'l_name'=>$l_name,'email'=>$user_email,'password'=>$user_password,'user_status'=>$profile_status,'user_catergory_id'=>$user_category_id));

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