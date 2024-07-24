<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
             
*{
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
   
  }

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
  margin-left:auto;
}
/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 30%;
  height: 600px; /* only for demonstration, should be removed */
  background: #ccc;
  padding: 20px;
}
/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
  
}
article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #6666FF;
  height: 600px; /* only for demonstration, should be removed */
  color: white;
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article,article#checkout {
    width: 100%;
    height: auto;
  }
    ul{
                
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
}
</style>
</head>
<body>
<header>
    <img src="settings.png" alt="settings" height="30px";width="30px" onclick="alert('hi')" >
</header>

<section>
  <nav>
      <ul>
            <li> <a href="#home" >home</a></li>
            <li> <a href="checkin.php " target="_top">check in</a></li>
            <li><a href=checkout.php" target="_top"> checkout</a></li>
            <li><a href="#summary">summary</a></li>
            <li><a href="#logout">logout</a></li>
        </ul>   
      
      </nav>
  
    <aside>
      <div id="checkin">
      <form style="font-size: 20px; text-align:left;" action="checkin.php" method="POST">
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
      </div>
    <div  id="checkout">
        <h1>CHECK OUT </h1><br>
        <input type="search"><br>
        <input type="button" value="calculate"><br>
        <input type="submit" value="chekout"><br>
    </div>
    </aside>
</section>

<footer>
  <p>Footer</p>
</footer>

</body>
</html>

