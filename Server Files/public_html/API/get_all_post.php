<?php

include 'init.php';
$arr=array();
$sqlQuery ="SELECT post.post_id, post.caption,post.location,post.img_location,post.status,post.user_id,post.post_date,user.f_name,user.l_name,user.email,profile.designation,profile.description,profile.img_location FROM ((post inner join user ON post.user_id=user.user_id ) inner join profile on profile.user_id =user.user_id )ORDER by post.post_date DESC;";
$result=mysqli_query($con,$sqlQuery);
while($row= mysqli_fetch_array($result))
{
  $post_id=$row[0];
  $caption=$row[1];
  $location=$row[2];
  $img_location=$row[3];
  $status=$row[4];
  $user_id=$row[5];
  $post_date=$row[6];
  $f_name=$row[7];
  $l_name=$row[8];
  $email=$row[9];
  $designation=$row[10];
  $description=$row[11];
  $img_location2=$row[12];

  $imageFile=file_get_contents($img_location);
  $image=base64_encode($imageFile);
  $imageFileprofile=file_get_contents($img_location2);
  $imageprofile=base64_encode($imageFileprofile);
  
  $item=array(
      "post_id"=>$post_id,
      "caption"=>$caption,
      "location"=>$location,
      "caption"=>$caption,
      "status"=>$status,
      "user_id"=>$user_id,
      "post_date"=>$post_date,
      "f_name"=>$f_name,
      "l_name"=>$l_name,
      "email"=>$email,
      "encodedImage"=>$image,
      "designation"=>$designation,
      "description"=>$description,
      "encodedprofile"=>$imageprofile
    );
  array_push($arr,$item);
}
echo json_encode($arr);
mysqli_close($con);

?>