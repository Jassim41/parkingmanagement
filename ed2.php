<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
       if(htmlspecialchars($_SERVER["REQUEST_METHOD"])== "POST"){
       echo $name=htmlspecialchars($_REQUEST['cus_name']);
       echo $mob_number=htmlspecialchars($_REQUEST['mob_number']);
        $plot_number= htmlspecialchars($_GET['p_no']);
       echo $second_mob_number=htmlspecialchars($_REQUEST['second_mob_number']);
       $conn= mysqli_connect('localhost','root','','car_parking');
       
         $query="update two_wheeler set customer_name= '$name' ,mobile_number='$mob_number',second_mobile_number='$second_mob_number',flag=1 where plot_number='$plot_number'";
         mysqli_query($conn,$query);
       }?>
    </body>
</html>
