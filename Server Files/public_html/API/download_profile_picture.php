<?php

include 'init.php';

$user_id=$_POST["user_id"];

$sqlQuery =" select * FROM `profile` WHERE  user_id='$user_id'";

$result=mysqli_query($con,$sqlQuery);

while($row= mysqli_fetch_array($result))
{
  $imageDestails["profile_id"]=$row[0];
  $imageLocation=$row[1];
  $imageDestails["designation"]=$row[2];  
  $imageDestails["description"]=$row[3];  
  $imageDestails["status"]=$row[4];  
  $imageDestails["DOB"]=$row[5]; 
  $imageDestails["user_id"]=$row[6]; 
  $imageFile=file_get_contents($imageLocation);
  $imageDestails["encodedImage"]=base64_encode($imageFile);

}
mysqli_close($con);
print(json_encode($imageDestails));

?>