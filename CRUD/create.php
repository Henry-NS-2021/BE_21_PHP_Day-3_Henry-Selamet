<?php 
    require_once("actions/db_connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <?php require_once  'components/boot.php'?>
    <!-- CSS -->
    <style>
           fieldset {
                margin: auto;
               margin-top: 100px ;
               width: 60% ;
           }      
    </style>
    <title>PHP Day-4: CRUD  |  Add Car</title>
</head>
<body>


    <!-- CODE -->
    <fieldset>
           <legend  class='h2'>Add Car</legend >
           <form class="border border-3 border-success rounded-3" action ="actions/a_create.php" method= "post"  enctype="multipart/form-data">
                <table class='table'>
                   <tr>
                       <th >Brand</th>
                        <td><input class ='form-control' type="text"  name="brand"  placeholder ="Car Brand" /></td>
                   </tr >   
                    <tr>
                        <th>Price</th>
                        <td><input  class='form-control'  type="number"  name= "price"  placeholder="Price"  step="any" /></td>
                    </tr>
                    <tr>
                        <th>Picture </th>
                       <td ><input  class='form-control'  type= "file" name ="image"/></td >
                    </tr >
                    <tr >
                        <td><button   class = 'btn btn-success'   type = "submit"> Insert Car </button ></td >
                        <td><a href = "index.php"><button   class = 'btn btn-warning'  type = "button"> Home </button></a></td >
                    </tr >
                </table >
            </form >
        </fieldset >
</body>
</html>