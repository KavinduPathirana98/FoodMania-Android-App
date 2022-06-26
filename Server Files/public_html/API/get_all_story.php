<?php

include 'init.php';
$arr=array();
$sqlQuery ="SELECT user.f_name,user.l_name,profile.img_location,story.caption,story.img_location from ((user inner join profile on user.user_id= profile.user_id) INNER join story on profile.user_id=story.user_id) order by story.story_date DESC;";
$result=mysqli_query($con,$sqlQuery);
while($row= mysqli_fetch_array($result))
{

  $f_name=$row[0];
  $l_name=$row[1];
  $img_profile=$row[2];
  $caption=$row[3];
  $img_status=$row[4];

  $imageFile=file_get_contents($img_status);
  $image=base64_encode($imageFile);
  $imageFileprofile=file_get_contents($img_profile);
  $imageprofile=base64_encode($imageFileprofile);
  
  $item=array(
      "f_name"=>$f_name,
      "l_name"=>$l_name,
      "caption"=>$caption,
      "encodedImage"=>$image,
      "encoded_profile"=>$imageprofile
    );
  array_push($arr,$item);
}
echo json_encode($arr);
mysqli_close($con);

?>