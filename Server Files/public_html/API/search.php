<?php

include 'init.php';
$name=$_POST["name"];

$arr=array();
$sqlQuery ="select user.user_id,user.f_name,user.l_name,user.email,profile.profile_id,profile.img_location,profile.designation,profile.description from user  inner join profile on user.user_id= profile.user_id where user.f_name LIKE '$name%' or user.l_name like '$name%';";

$result=mysqli_query($con,$sqlQuery);
while($row= mysqli_fetch_array($result))
{
  $user_id=$row[0];
  $f_name=$row[1];
  $l_name=$row[2];
  $email=$row[3];
  $profile_id=$row[4];
  $img_location=$row[5];
  $designation=$row[6];
  $description=$row[7];
 

  $imageFile=file_get_contents($img_location);
  $image=base64_encode($imageFile);
  
  
  $item=array(
      "user_id"=>$user_id,"f_name"=>$f_name,"l_name"=>$l_name,"email"=>$email,"profile_id"=>$profile_id,"designation"=>$designation,"description"=>$description,"encoded_image"=>$image);
  array_push($arr,$item);
}
echo json_encode($arr);
mysqli_close($con);

?>