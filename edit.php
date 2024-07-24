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
     
        
        <label>CUSTOMER NAME:</label>
        <?php $name= htmlspecialchars($_REQUEST['a']);echo $name;?><br>
                <label>VEHICLE NUMBER:</label>
        <?php $v_number= htmlspecialchars($_GET['b']);echo $v_number;?><br>
        <label>MOBILE NUMBER:</label>
        <?php $mob_number= htmlspecialchars($_GET['c']);echo $mob_number;?><br>
            <label>PARKING TYPE:</label>
        <?php $p_type= htmlspecialchars($_GET['d']);echo $p_type;?><br>
        <label>KEY TYPE:</label>
       <?php $k_type= htmlspecialchars($_GET['e']);echo $k_type;?><br>
           <?php if($k_type==2) {
               echo"<label>SECOND MOBILE NUMBER:</label>";
           $second_mob_number= htmlspecialchars($_GET['f']);echo $second_mob_number."<br>";}?>              
        
        <label>PLOT NUMBER:</label>
       <?php $plot_number= htmlspecialchars($_GET['g']);echo $plot_number;?><br>
       <label>DATE:</label>
        <?php $date= htmlspecialchars($_GET['h']);echo $date;?><br>
        
        
    </body>
</html>
