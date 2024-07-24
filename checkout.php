<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php
     $conn= mysqli_connect('localhost','root','','car_parking');
              ?>  
        <title></title>
    </head>
    <body>
        <style>
            table,th,td{
                border: 1px solid;
            }
        </style>
        <h1>CHECK OUT </h1><br>
        <form action="checkout.php" method="POST" >
           
        <input type="text" name="search"><br>
        <input type="button" value="calculate"><br>
        <input type="submit" value="checkout"><br>
        </form>
        
        <?php       
       
 if(htmlspecialchars($_SERVER["REQUEST_METHOD"])== "POST")
    {
        $search=htmlspecialchars ($_REQUEST['search']);
        echo $search;
       $query="select * from two_wheeler where  customer_name='$search' or key_type=$search  or vehicle_number=$search or mobile_number=$search";
       $insertstatement=mysqli_query($conn,$query);      
      echo"<table>"  ;
      
     echo "<th>customer_name</th>";
     echo "<th>vehicle_number</th>";
       echo "<th>mobile_number</th>"; 
       echo "<th>parking_type</th>";  
       echo "<th>key_type</th>";  
       echo "<th>second_mobile_number</th>";
         echo "<th>plot_number</th>";
           echo "<th>check_in_date</th>";
        echo "<tr>";     
     while($row= mysqli_fetch_array($insertstatement)){
         
         echo "<td>".$row['customer_name']."</td>";
            echo "<td>".$row['vehicle_number']."</td>";
            echo "<td>".$row['mobile_number']."</td>";
            echo "<td>".$row['parking_type']."</td>";
            echo "<td>".$row['key_type']."</td>";
            echo "<td>".$row['second_mobile_number']."</td>";
            echo "<td>".$row['plot_number']."</td>";
            echo "<td>".$row['check_in_date']."</td><br>" ;
            ?>
    <td><a href="update.php?a=<?php echo $row['plot_number'];?>"> remove</a></td>
        <td><a href="ed.php?a=<?php echo $row['customer_name'];?>&b=<?php echo $row['vehicle_number'];?>&c=<?php echo $row['mobile_number'];?>&d=<?php echo $row['parking_type'];?>&e=<?php echo $row['key_type'];?>&f=<?php echo $row['second_mobile_number'];?>&g=<?php echo $row['plot_number'];?>&h=<?php echo $row['check_in_date'];?>"> edit</a></td>
        <td><button onclick="window.print()">print</button></td>
            </tr>                     
    <?php
    } 
    }
    ?>
    </table>
    </body>
</html>
