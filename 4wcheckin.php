<!DOCTYPE html>
<html lang="en">
<head> 
     <?php
     $conn= mysqli_connect('localhost','root','','car_parking');
        $query="select plot_number from four_wheeler where status =''" ;
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
            margin-left: 700px; 
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
    <main>
        <button style="width: 50%" onclick="document.location='checkin.php'">two wheeler</button><button style="width:50%" > four wheeler</button>
    <form style="font-size: 20px; text-align:left;" action="4wcheckin.php" method="POST">
    
        <label>CUSTOMER NAME:</label>
        <input type="text" placeholder="customer name" name="cus_name"><br><br>
                <label>VEHICLE NUMBER:</label>
        <input type="text" placeholder="vehicle number" name="v_number"><br><br>
        <label>MOBILE NUMBER:</label>
        <input type="tel" placeholder="customer mobile number" name="mob_number" maxlength="10"><br><br>
        <label>MAIL ID:</label>
        <input type="mail" name="mail" placeholder="xyz@gmail.com"><br><br>
        <label>PARKING TYPE:</label>
        
        <label>Regular</label><input type="radio" name="p_type" value="regular" checked> &nbsp;
        <label>Monthly</label><input type="radio" name="p_type" value="monthly"><br><br>
        <label>KEY TYPE:</label>
        One key<input type="radio" name="k_type" value="1" onclick="text()" id="nocheck" checked> &nbsp;
        Two key<input type="radio" name="k_type" value="2" onclick="text()" id="yescheck"><br><br>
            <div id="ifyes" style="visibility: hidden">
            <label>SECOND MOBILE NUMBER:</label>
            <input type="mail" placeholder="xyz@gmail.com" name="second_mob_number"  ><br><br>
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
       <label>date:</label>
        <input type="date" name="date"><br><br>
        <label> time:</label>
        <input type="time" name="time" ><br><br>
        <input type="submit" name="status" value="book" style="margin-left:550px; font-size:20px">
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
            echo "Required customer name";
        }
        else if(empty ($v_number))
        { 
            echo "Required vehicle number";
        }
         else if(empty ($mob_number))
        { 
            echo "Required mobile number";
        } 
        else if(empty ($p_type))
        { 
            echo "Required parking type";
        } else if(empty ($k_type))
        { 
            echo "Required key type";
        } else if(($k_type==2)&& empty ($second_mob_number))
        { 
            echo "Required second mobile number";
        } else if(empty ($date))
        { 
            echo "Required date";
        } else if(empty ($time))
        { 
            echo "required time";
        } else      { 
                  
        echo $cus_name,$v_number,$mob_number,$p_type,$k_type,$second_mob_number,$plot_number,$date,$time,$status;
     $sql ="update four_wheeler set customer_name= ?,vehicle_number=?,mobile_number=?,parking_type=?,key_type=?,second_mobile_number=?,check_in_date=?,check_in_time=?,status=? where plot_number=?";
     $insertstatement=mysqli_prepare($conn,$sql);
     mysqli_stmt_bind_param($insertstatement,'ssisiissss',$cus_name,$v_number,$mob_number,$p_type,$k_type,$second_mob_number,$date,$time,$status,$plot_number);
     mysqli_stmt_execute($insertstatement);
     if(mysqli_affected_rows($conn)>=1)
      {
          echo "new record inserted";
      }
 else {
      echo "error" .$sql."<br>" .mysqli_error($conn);
      }
        }

    }
    mysqli_close($conn);
    ?>
    </main>
</body>
</html>
