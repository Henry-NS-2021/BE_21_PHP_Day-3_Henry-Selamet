<?php
    require_once("actions/db_connect.php");

    $sql = "SELECT * FROM cars";
    $result = mysqli_query($connect ,$sql);
    $tbody=''; //this variable will hold the body for the table
    if(mysqli_num_rows($result)  > 0) {    
       while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){        
           $tbody .= "<tr>
    
                <td><img class='img-thumbnail' src='pictures/" .$row['image']. "'></td>
               <td>" .$row['brand']. "</td>
               <td>" .$row['price']. "</td>
               <td><a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
               <a href='delete.php?id="  .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
    
                </tr>";
       };
    } else {
       $tbody =   "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
    }
    
    mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <?php require_once("components/boot.php");?>
    <!-- CSS code -->
    <style type="text/css">
            .manageCar {          
               margin: auto;
           }
            .img-thumbnail {
               width: 70px  !important;
               height: 70px !important;
           }
            td {          
               text-align: left;
                vertical-align: middle;

            }
           tr {
                text-align: center;
           }
       </style>
    <title>PHP Day-4: CRUD</title>
</head>
<body>


<!-- Table -->
<div class="manageCar w-75 mt-3">   
            <div class='mb-3'>

                <a href= "create.php" >
                    <button class='btn btn-outline-dark'type= "button" >Add Car</button>
                </a>
           </div>
           <p class='h2'>Cars</p>

            <table class='table table-striped table-success' >
               <thead class= 'table-dark'>
                   <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>price</th>
                        <th>Action</th>
                    </tr>
               </thead >
               <tbody>
                   <?= $tbody; ?>
                <!-- the data will appear here but, at the moment,
                   we haven't used any queries yet :-) -->
                </tbody>
           </table >
       </div>
</body>
</html>





