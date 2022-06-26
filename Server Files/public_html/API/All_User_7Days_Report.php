<?php

include 'init.php';
$arr=array();
$sqlQuery ="select
 user.user_id,
 user.f_name,
 user.l_name,
 user.email,
 user.date,
 user.user_catergory_id,
profile.img_location,
profile.designation,
profile.description,
profile.location,
profile.DOB
 FROM
  (user inner join profile on user.user_id=profile.user_id) where user.date>= date(now())-INTERVAL 7 day;";
$result=mysqli_query($con,$sqlQuery);
while($row= mysqli_fetch_array($result))
{
    $user_id=$row[0];
    $f_name=$row[1];
    $l_name=$row[2];
    $email=$row[3];
    $date=$row[4];
    $user_category_id=$row[5];

    $img_location=$row[6];
    $designation=$row[7];
    $description=$row[8];
    $location=$row[9];
    $dob=$row[10];
  

    $imageFile=file_get_contents($img_location);
    $image=base64_encode($imageFile);
  
  
  $item=array(
      "user_id"=>$user_id,
      "f_name"=>$f_name,
      "l_name"=>$l_name,
      "email"=>$email,
      "date"=>$date,
      "user_category_id"=>$user_category_id,
      "designation"=>$designation,
      "description"=>$description,
      "location"=>$location,
      "dob"=>$dob,
       "encoded_image"=>$image
    );
  array_push($arr,$item);
}
echo json_encode($arr);
mysqli_close($con);

?>