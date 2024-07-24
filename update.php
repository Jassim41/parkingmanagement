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
        $plot_number= htmlspecialchars($_GET['a']);
         $conn= mysqli_connect('localhost','root','','car_parking');
         $query="update two_wheeler set customer_name='',vehicle_number='',mobile_number='',parking_type='',key_type='',second_mobile_number='',check_in_date='',check_in_time='',status=0 where plot_number='$plot_number'";
         mysqli_query($conn,$query);
         echo "delete";
        ?>
    </body>
</html>
