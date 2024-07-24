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
        <form action="ed2.php?p_no=<?php $p_no=htmlspecialchars($_GET['g']); echo $p_no;?>" method="POST"><label>CUSTOMER NAME:</label>
        <input type="text" name="cus_name" value=" <?php $name= htmlspecialchars($_REQUEST['a']); echo $name;?>"><br><br>
        <label>MOBILE NUMBER:</label>
        <input type="tel"  name="mob_number" maxlength="10" value="<?php $mob_number= htmlspecialchars($_GET['c']);echo $mob_number;?>"><br><br>
        <label>SECOND MOBILE NUMBER:</label>
        <input type="tel" name="second_mob_number" maxlength="10" value="<?php $second_mob_number= htmlspecialchars($_GET['f']); echo $second_mob_number;?>"><br><br>
        <input type="submit" name="status" value="UPDATE" style="margin-left:550px; font-size:20px">
        </form>
        </body>
</html>
 