<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
// for deleting user
if(isset($_GET['user_id']))
{
$adminid=$_GET['user_id'];
$msg=mysqli_query($con,"delete from user where user_id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}

   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registered Users in Last 30 Days | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
         <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Registered Users in Last 30 Days </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Registered Users in Last 30 Days </li>
                        </ol>
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                          Registered Users in Last 30 Days  Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                             <th>Sno.</th>
                                  <th>First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>Sno.</th>
                                  <th>First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                              <?php $ret=mysqli_query($con,"select
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
(user inner join profile on user.user_id=profile.user_id) 
WHERE
 user.date BETWEEN
  (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE();");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['f_name'];?></td>
                                  <td><?php echo $row['l_name'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['date'];?></td>
                                  <td>
                                     
                                     <a href="user-profile.php?uid=<?php echo $row['user_id'];?>"> 
                          <i class="fas fa-edit"></i></a>
                                     <a href="manage-users.php?id=<?php echo $row['user_id'];?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
  <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>