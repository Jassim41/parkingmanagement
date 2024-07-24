    <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Mj parking system </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body>
        <style>
            body 
           {
            background-image: url("image1.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            }
            form
            {
            width: 500px;
            height: 250px;
            border:2px white;
            padding:30px;
            background:rgba(0,0,0,0.5);
            color: black;
            border-radius: 15px;
            margin: auto;
            margin-top: 100px;
            }
           .glow 
           {
           font-size: 80px;
           color: white;
           text-align: center;
           animation: glow 1s ease-in-out infinite alternate;
           }
           @-webkit-keyframes glow {
            from {
            text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #000000, 0 0 40px #000000, 0 0 50px #000000, 0 0 60px #000000, 0 0 70px #000000;
                }
            to {
            text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #000000, 0 0 50px #000000, 0 0 60px #000000, 0 0 70px #000000, 0 0 80px #000000;
                }
            }                                     
        </style>
        <center><h1  class="glow" style="color:  white; font-size: 50px; "> MJ'S PARKING SYSTEM</h1></center>
            <form  method= "post" action = "loginpage.php">
       
        <div style="text-align:center; margin-top:75px; color:white; ">
                  
            <b> <label style="font-size: 20px;">Username:</label><b>
                  <input type="text" name="user_name" style="font-size: 16px;" placeholder="USERNAME"><br><br>
                  <b><label style="font-size: 20px;">Password:</label><b>
                          <input type="password" name="password"   style="font-size: 16px;" placeholder="PASSWORD" ><br><br>
                  <input type ="submit" value="LOGIN" style="font-size: 16px; color:blue;">
                  
<?php
if(htmlspecialchars($_SERVER["REQUEST_METHOD"])== "POST")
    {
        $name=htmlspecialchars ($_REQUEST['user_name']);
        $password=htmlspecialchars ($_REQUEST['password']);
        $i=0;
$link =mysqli_connect('localhost','root','','car_parking');
if(!$link)
{
    die('connect'.mysqli_connect_error());
}
$query="select user_name,password from login" ;
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
        if(empty($name&&$password))
        {
           echo'<center><span style="color:red ; text-align:center; font-size:30px; background-color:  white;">required name or password</span></center>';
        }
        else
        {
      if($numrow>0)
{
        while($row= mysqli_fetch_assoc($result))
        {
            if( $name==$row['user_name']&&$password==$row['password'])
        
             {
    header("location: index.php");
               $i++ ;
    
        }                
         }
        }

        if ($i==0)
    echo '<center><h3 style="color:red; background-color:white;"> LOGIN FAILED!! your user name or password is incorrect </h3></center>';
      }
             
  }
 ?>
    </div>         
                
</form>
              
        <a href ="forgetpassword.php?" style="color: white;"> forgetpassword</a>
           </body>
</html>