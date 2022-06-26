<?php

include 'init.php';

$encodedImage=$_POST['encodedImage'];
$caption=$_POST['title'];
$user_id=$_POST['user_id'];
$imageLocation="story/$caption.jpg";

$sqlQuery="insert into story(caption, img_location, story_date, user_id) VALUES ('$caption','$imageLocation',CURRENT_TIMESTAMP(),'$user_id')";

if(mysqli_query($con,$sqlQuery))
{
    file_put_contents($imageLocation,base64_decode($encodedImage));
    $result["status_code"]=1;
    $result["remaks"]="ok";
}
else
{
    $result["status_code"]=0;
    $result["remaks"]="failed"; 
}
mysqli_close($con);
print(json_encode($result));


?>