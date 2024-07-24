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
        <style>
            ul{
                list-style: none;
                height: fit-content;
                width:100px;
                position: fixed;
                top:0;
                left:0;
                background:gray;
                box-shadow: 2px 0px 5px black;
                
            }
            ul li{
                margin: 5px;
                padding:5px;
                margin-top: 75px;
            }
            ul li a{
                color:black;
                text-decoration: none;
                font-size: 20px;
                padding:5px;
                              
            }
             ul li a:hover
             {
                 background: lavenderblush;
                 color:blue;
                 
             }
             section{
                 height:100vh;
                 width:10vw;
                 display:flex;
                 align-items: center;
                 justify-content: center;
                         
             }
             form{
                 top:0;
                 postion:fixed;
                 left:35%;
                 
             }
             .content
             {
                 align-items: center;
                 align-content: center;
             }
        </style>
    </head>
    <body>
        <ul>
            <li> <a href="#home">home</a></li>
            <li> <a href="#checkin">check in</a></li>
            <li><a> <iframe width="300" height="100%"
                        src="checkout.php"> </iframe>checkout</a></li>
            <li><a href="#summary">summary</a></li>
            <li><a href="#logout">logout</a></li>
        </ul>   
        <div class="content">
            <section id="checkin">
                 <form style="font-size: 20px; text-align:center;align-content: center;" action="checkin.php" method="POST">
        <button style="width: 50%" onclick="document.location='checkin.php' checked">two wheeler</button><button style="width:50%" onclick="document.location='loginpage.php'"> four wheeler</button>
        <label>customer name:</label>
        <input type="text" placeholder="customer name" name="cus_name"><br><br>
                <label>vehicle number:</label>
        <input type="text" placeholder="vehicle number" name="v_number"><br><br>
        <label>mobile number:</label>
        <input type="tel" placeholder="customer mobile number" name="mob_number"><br><br>
        <label>parking type:</label>
        <label>regular</label><input type="radio" name="p_type" value="regular" checked> &nbsp;
        <label>monthly</label><input type="radio" name="p_type" value="monthly"><br><br>
        <label>key type:</label>
        one key<input type="radio" name="k_type" value="1" onclick="text()" id="nocheck" checked> &nbsp;
        two key<input type="radio" name="k_type" value="2" onclick="text()" id="yescheck"><br><br>
            <div id="ifyes" style="visibility: hidden">
            <label>second mobile number:</label>
            <input type="tel" placeholder="second mobile number" name="second_mob_number" ><br><br>
            </div>
        <label>plot number:</label>
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
            echo "required customer name";
        }
        else if(empty ($v_number))
        { 
            echo "required vehicle number";
        }
         else if(empty ($mob_number))
        { 
            echo "required mobile number";
        } 
        else if(empty ($p_type))
        { 
            echo "required parking type";
        } else if(empty ($k_type))
        { 
            echo "required key type";
        } else if(empty ($second_mob_number))
        { 
            echo "required second mobile number";
        } else if(empty ($date))
        { 
            echo "required date";
        } else if(empty ($time))
        { 
            echo "required time";
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
      echo "error" .$sql."<br>" .mysqli_error($conn);
      }
        }

    }
    mysqli_close($conn);
    ?>
   
            </section>
          
        </div>
    </body>
</html>
