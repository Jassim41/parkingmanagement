<!DOCTYPE html>
<html lang="en">
<head> 
     <?php
     $conn= mysqli_connect('localhost','root','','car_parking');
        $query="select plot_number from two_wheeler where status ='0'" ;
        $result=mysqli_query($conn,$query);
      ?>  
      
<title>Checkin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    form
            {
            width: 600px;
            height: 450px;
            border:2px white;
            padding:30px;
            background:rgba(255,255,167,255);
            color: black;
            border-radius: 15px;
            
            margin-top: 20px;
            
            }
</style>
<script>
       function text()
       {
           if(document.getElementById("yescheck").checked)
           {
              document.getElementById("ifyes").style.visibility='visible'; 
           }
           else 
               document.getElementById("ifyes").style.visibility="hidden";
           return;
       }
       </script>
</head>
<body>
    <button style="width: 50%" onclick="document.location='checkin.php' checked">two wheeler</button><button style="width:50%" onclick="document.location='4wcheckin.php'"> four wheeler</button>
    <form style="font-size: 20px; text-align:left;"  method="POST">
        
        <label>CUSTOMER NAME:</label>
        <input type="text" placeholder="customer name" name="cus_name"><br><br>
                <label>VEHICLE NUMBER:</label>
        <input type="text" placeholder="vehicle number" name="v_number"><br><br>
        <label>MOBILE NUMBER:</label>
        <input type="tel" placeholder="customer mobile number" name="mob_number" maxlength="10"><br><br>
        <label>MAIL ID:</label>
        <input type="mail" name="mail" placeholder="xyz@gmail.com"><br><br>
        <label>PARKING TYPE:</label>
        <label>Regular</label><input type="radio" name="p_type" value="regular" checked> &nbsp; &nbsp;
        <label>Monthly</label><input type="radio" name="p_type" value="monthly"><br><br>
        <label>KEY TYPE:</label>
        One key<input type="radio" name="k_type" value="1" onclick="text()" id="nocheck" checked> &nbsp;
        Two key<input type="radio" name="k_type" value="2" onclick="text()" id="yescheck"><br><br>
            <div id="ifyes" style="visibility: hidden">
            <label>SECOND MOBILE NUMBER:</label>
            <input type="mail" placeholder="second mail id" name="second_mob_number"maxlength="10"><br><br>
            </div>
        <label>PLOT NUMBER:</label>
        <select name="plot_number">
        <?php
     
            
        while($row= mysqli_fetch_array($result))
        {
        ?>
            <option><?php echo $row['plot_number'];?> </option>
            <?php
        }  
        
        ?>
            <p id="demo"></p>
        </select><br><br>
       <label>DATE:</label>
       <input type="date" name="date" data-date-format="DD MMMM YYYY"><br><br>
        <label> TIME:</label>
        <input type="time" name="time" ><br><br>
        <input type="submit" name="status" value="BOOK" style="margin-left:550px; font-size:20px">
        </form>
   <?php if(htmlspecialchars($_SERVER["REQUEST_METHOD"])== "POST")
    {
        $cus_name=htmlspecialchars ($_REQUEST['cus_name']);
        $v_number=htmlspecialchars($_REQUEST['v_number']);
        $mob_number= htmlspecialchars($_REQUEST['mob_number']);
        $p_type=htmlspecialchars ($_REQUEST['p_type']);
        $k_type=htmlspecialchars($_REQUEST['k_type']);
        $second_mob_number=htmlspecialchars($_REQUEST['second_mob_number']);
        $plot_number=htmlspecialchars($_REQUEST['plot_number']);
        $date=htmlspecialchars($_REQUEST['date']);
        $time=htmlspecialchars($_REQUEST['time']);
        $status= htmlspecialchars($_REQUEST['status']);
        if(empty($cus_name))
        { 
            echo '<center><span style="color:red ; text-align:center; font-size:30px; background-color:  white;">required customer name</span></center>';
        }
        else if(empty ($v_number))
        { 
            echo '<center><span style="color:red ; text-align:center; font-size:30px; background-color:  white;">required vehicle number</span></center>';
        }
         else if(empty ($mob_number))
        { 
            echo '<center><span style="color:red ; text-align:center; font-size:30px; background-color:  white;">required mobile number</span></center>';
        
        } 
        else if(empty ($p_type))
        { 
                    echo '<center><span style="color:red ; text-align:center; font-size:30px; background-color:  white;">required parking type</span></center>';
        
        } else if(empty ($k_type))
        {
                    echo '<center><span style="color:red ; text-align:center; font-size:30px; background-color:  white;">required parking type</span></center>';
        
        } else if(($k_type==2)&&empty ($second_mob_number))
        { 
             echo '<center><span style="color:red ; text-align:center; font-size:30px; background-color:  white;">required second mobile number</span></center>';
        }
        else if(empty ($date))
        { 
             echo '<center><span style="color:red ; text-align:center; font-size:30px; background-color:  white;">required date</span></center>';
        } else if(empty ($time))
        { 
             echo '<center><span style="color:red ; text-align:center; font-size:30px; background-color:  white;">required time</span></center>';
        } else      { 
                  
        echo $cus_name,$v_number,$mob_number,$p_type,$k_type,$second_mob_number,$plot_number,$date,$time,$status;
     $sql ="update two_wheeler set customer_name= ?,vehicle_number=?,mobile_number=?,parking_type=?,key_type=?,second_mobile_number=?,check_in_date=?,check_in_time=?,status=? where plot_number=?";
     $insertstatement=mysqli_prepare($conn,$sql);
     mysqli_stmt_bind_param($insertstatement,'ssisiissss',$cus_name,$v_number,$mob_number,$p_type,$k_type,$second_mob_number,$date,$time,$status,$plot_number);
     mysqli_stmt_execute($insertstatement);
     if(mysqli_affected_rows($conn)>=1)
      {
          echo "new record inserted";
      }
 else {
      
      }
        }

    }
    mysqli_close($conn);
    ?>
     
</body>
</html>
