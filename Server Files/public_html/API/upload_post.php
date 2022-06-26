<?php

include 'init.php';

$encodedImage=$_POST['encodedImage'];
$caption=$_POST['title'];
$Location=$_POST['location'];
$post_status=$_POST['status'];
$user_id=$_POST['user_id'];
$imageLocation="posts/$caption.jpg";

$sqlQuery="insert into `post`( `caption`, `location`, `img_location`, `status`, `user_id`, `post_date`) VALUES ('$caption','$Location','$imageLocation','$post_status','$user_id',CURRENT_DATE())";

if(mysqli_query($con,$sqlQuery))
{
    file_put_contents($imageLocation,base64_decode($encodedImage));
    $result["status_code"]=1;
    $result["remaks"]="Image Uploaded Successfully";
}
else
{
    $result["status_code"]=0;
    $result["remaks"]="Image Uploading Failed"; 
}
mysqli_close($con);
print(json_encode($result));


?>