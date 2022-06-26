<?php
include 'init.php';

$email=$_POST['email'];
$imageLocation="profile_pictures/$email.jpg";
$encodedImage=$_POST['encoded_image'];
$designation=$_POST['designation'];
$description=$_POST['description'];
$status=$_POST['status'];
$dob=$_POST['dob'];
$user_id=$_POST['user_id'];

$sqlQuery="INSERT INTO `profile`(`img_location`, `designation`, `description`, `status`, `DOB`, `user_id`) VALUES ('$imageLocation','$designation','$description','$status','$dob','$user_id')";

if(mysqli_query($con,$sqlQuery))

{
    file_put_contents($imageLocation,base64_decode($encodedImage));

    $result["status_code"]="1";

    $result["remaks"]=" Profile Image Updated Successfully ";

}

else

{
    $result["status_code"]="0";

    $result["remaks"]="Profile Image Uploading Failed"; 
}

mysqli_close($con);

print(json_encode($result));
?>