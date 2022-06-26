<?php
include 'init.php';
$arr=array();
$user_id=$_POST['user_id'];

$sqlQuery="select profile.img_location,profile.designation,user.f_name,user.l_name,user.user_id from ((profile INNER join user on profile.user_id=user.user_id) INNER join friend_req on profile.user_id=friend_req.sender_id) where friend_req.receiver_id='$user_id'";

$result=mysqli_query($con,$sqlQuery);
while($row=mysqli_fetch_array($result))
{
    
    $img_location=$row[0];
    $designation=$row[1];
    $f_name=$row[2];
    $l_name=$row[3];
   $user_id=$row[4];
   $imageFile=file_get_contents($img_location); 
   $image=base64_encode($imageFile);
    
    $item=array("f_name"=>$f_name,"l_name"=>$l_name,"designation"=>$designation,"encodedImage"=>$image,"user_id"=>$user_id);
    
    array_push($arr,$item);
    
}

echo json_encode($arr);
mysqli_close($con);




?>