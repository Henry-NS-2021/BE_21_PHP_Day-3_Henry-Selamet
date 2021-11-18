<?php 
    session_start();
    require_once 'components/db_connect.php';

    // if session is not set this will redirect to login page
    if( !isset($_SESSION['adm']) && !isset($_SESSION['user']) ) {
        header("Location: index.php");
        exit;
    }
    if(isset($_SESSION["user"])){
        header("Location: home.php");
        exit;
    }
    //initial bootstrap class for the confirmation message
    $class = 'd-none';
    //the GET method will show the info from the user to be deleted
    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE id = {$id}" ;
        $result = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $f_name = $data['first_name'];
        $l_name = $data['last_name'];
        $email = $data['email'];
        $date_of_birth = $data['date_of_birth'];
        $picture = $data['picture'];
    } }

    //the POST method will actually delete the user permanently
    if ($_POST) {
        $id = $_POST['id'];
        $picture = $_POST['picture'];
        ($picture =="avatar.png")?: unlink("pictures/$picture");

        $sql = "DELETE FROM user WHERE id = {$id}";
    if ($connect->query($sql) === TRUE) {
        $class = "alert alert-success";
        $message = "Successfully Deleted!";
        header("refresh:3;url=dashboard.php");
    } else {
        $class = "alert alert-danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    }

    mysqli_close($connect);
?>


<!-- 
-----------------------
    HTML 
----------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Adm-DashBoard</title>
   <!-- bootstrap -->
   <?php require_once 'components/bootstrap.php'?>
   <style type="text/css">       
       .img-thumbnail{
           width: 70px !important;
           height: 70px !important;
       }
       td
       {
           text-align: left;
           vertical-align: middle;
       }
       tr
       {
           text-align: center;
       }
       .userImage{
    width: 100px;
    height: auto;
    }
   </style>
</head>
<body>
<div class="container">
   <div class="row">
       <div class="col-2">
       <img class="userImage" src="pictures/admavatar.png" alt="Adm avatar">
       <p class="">Administrator</p>
       <a href="logout.php?logout">Sign Out</a>
       </div>
       <div class="col-8 mt-2">
       <p class='h2'>Users</p>
       <table class='table table-striped'>
           <thead class='table-success'>
               <tr>
                   <th>Picture</th>
                   <th>Name</th>
                   <th>Date of birth</th>
                   <th>Email</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
           <?=$tbody?>
           </tbody>
       </table>
       </div>
   </div>
</div>
</body>
</html>