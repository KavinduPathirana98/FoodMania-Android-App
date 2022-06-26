<?php

include 'init.php';

$user_id_recived=$_POST["user_id"];
$arr=array();
$sqlQuery =" select
 post.post_id,
 post.caption,
 post.location,
 post.img_location,
 post.post_date,
 user.f_name,
 user.l_name
 from
 user
 INNER join
 post 
 on 
 user.user_id= post.user_id where user.user_id=$user_id_recived;";

$result=mysqli_query($con,$sqlQuery);
while($row= mysqli_fetch_array($result))
{
    $post_id=$row[0];
    $caption=$row[1];
    $location=$row[2];
    $img_location=$row[3];
    $post_date=$row[4];

  
    $f_name=$row[5];
    $l_name=$row[6];
 
  

    $imageFile=file_get_contents($img_location);
    $image=base64_encode($imageFile);
  
  
  $item=array(
      "post_id"=>$post_id,
      "caption"=>$caption,
      "location"=>$location,
      "post_date"=>$post_date,
      "f_name"=>$f_name,
      "l_name"=>$l_name,
      "encoded_image"=>$image
    );
  array_push($arr,$item);
}
echo json_encode($arr);
mysqli_close($con);

?>