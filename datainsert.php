<?php
 $servername="localhost";
    $username="root";
    $password="";
    $dbname="car_parking";
    $conn= mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        die("connection failed:".mysqli_connect_error());
    
    }
    for($i=1; $i<=25;$i++)
     {
         $plot="p24w$i";
     $sql =" insert into four_wheeler values('','','','','',?,'','','')";
     $insertstatement=mysqli_prepare($conn,$sql);
     mysqli_stmt_bind_param($insertstatement,'s',$plot);
     mysqli_stmt_execute($insertstatement);
     }     
      if(mysqli_($conn)>=1)
      {
          echo "new record inserted";
      }
 else {
      echo "error" .$sql."<br>" .mysqli_error($conn);
      }
     
    mysqli_close($conn);
    