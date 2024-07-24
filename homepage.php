<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
         $conn= mysqli_connect('localhost','root','','car_parking');
          $query1="select plot_number from two_wheeler where status ='0'" ;
           $query2="select plot_number from two_wheeler where status ='book'" ;
         $query3="select plot_number from four_wheeler where status =''" ;
         $query4="select plot_number from four_wheeler where status ='book'" ;
           ?>
        <meta charset="UTF-8">
        <title></title>
        <style>
            
            .filterdiv1{
                background-color: lightskyblue;
                margin:2px;
                width: 250px;
                margin-left: 10px;
                margin-top: 1%;
                              
            }.filterdiv2{
                background-color: lightskyblue;
                margin:2px;
                width: 250px;
                margin-left: 50%;
                margin-top: -255px;
                              
            }
            .filterdiv3{
                background-color: lightskyblue;
                margin:2px;
                width: 250px;
                margin-left: 10px;
                margin-top: -1%;
                              
            }
            .filterdiv4{
                background-color: lightskyblue;
                margin:2px;
                width: 250px;
                margin-left: 50%;
                margin-top: -255px;
                              
            }
        </style>
    </head>
    <body>
        <div class="filterdiv1">
            <img src="available.png" width="100px" height="100px" alt="alt"><h1> FREE SLOT</h1>
            
            <p style="font-size: 40px";"><?php $result1=mysqli_query($conn,$query1);
            
        $numrow1=mysqli_num_rows($result1);
        echo $numrow1; ?></p>
    </div>
            <div class="filterdiv2">
            <img src="locked.png" width="100" height="100" alt="alt">
            <h1> BOOKED SLOT</h1>
            <h1><?php $result2=mysqli_query($conn,$query2);
        $numrow2=mysqli_num_rows($result2);
        echo $numrow2; ?></h1>
        </div>
        
             <div class="filterdiv3">
            <img src="available.png" width="100px" height="100px" alt="alt"><h1> FREE SLOT</h1>
            
            <p style="font-size: 40px";"><?php $result3=mysqli_query($conn,$query3);
            
        $numrow3=mysqli_num_rows($result3);
        echo $numrow3; ?></p>
    </div>
        <div class="filterdiv4">
            <img src="locked.png" width="100" height="100" alt="alt">
            <h1> BOOKED SLOT</h1>
            <h1><?php $result4=mysqli_query($conn,$query4);
        $numrow4=mysqli_num_rows($result4);
        echo $numrow4; ?></h1>
        </div><?php
       
        
        ?>
    </body>
</html>
