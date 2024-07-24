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
        $conn= mysqli_connect('localhost','root','','news');
        $query="select * from books";
       $insertstatement=mysqli_query($conn,$query);
         while($row= mysqli_fetch_array($insertstatement)){
             echo $row['bname'];      
             echo $row['path'];?>
        <a href="<?php echo $row['path'];?>">book name</a>
        <?php     
        }
        ?>
    </body>
</html>
