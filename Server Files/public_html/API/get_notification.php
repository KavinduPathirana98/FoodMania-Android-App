<?php

include 'init.php';
$arr=array();
$user_id=$_POST['user_id'];
$sqlQuery ="SELECT notifications.content,user.f_name,user.l_name,profile.img_location from ((notifications INNER JOIN user ON notifications.sender_id=user.user_id) INNER JOIN profile ON user.user_id=profile.user_id) where notifications.user_id ='$user_id' order by notifications.date ;";
$result=mysqli_query($con,$sqlQuery);
while($row= mysqli_fetch_array($result))
{
  $content=$row[0];
  $f_name=$row[1];
  $l_name=$row[2];
  $img_location=$row[3];
  $imageFile=file_get_contents($img_location);
  $image=base64_encode($imageFile);
 
  
  $item=array(
      "content"=>$content,
      "f_name"=>$f_name,
      "l_name"=> $l_name,
      "encodedprofile"=>$image
    );
  array_push($arr,$item);
}
echo json_encode($arr);
mysqli_close($con);

?>