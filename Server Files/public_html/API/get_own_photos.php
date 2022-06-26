<?php

include 'init.php';
$user_id=$_POST["user_id"];
$arr=array();
$sqlQuery ="SELECT * FROM `post` WHERE user_id=$user_id;";
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
 

  $imageFile=file_get_contents($img_location);
  $image=base64_encode($imageFile);
 
  
  $item=array(
      "post_id"=>$post_id,
      "caption"=>$caption,
      "location"=>$location,
      "caption"=>$caption,
      "status"=>$status,
      "user_id"=>$user_id,
      "post_date"=>$post_date,
      "encodedImage"=>$image
    
    );
  array_push($arr,$item);
}
echo json_encode($arr);
mysqli_close($con);

?>