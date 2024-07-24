        <?php
        // put your code here
        
        $link =mysqli_connect('localhost','root','','car_parking');
        $name=htmlspecialchars($_GET['a']);
            $answer=htmlspecialchars ($_REQUEST['answer']);
     $query="select reset_answer from login where user_name='$name'" ;
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
if($numrow>0)
{
        while($row= mysqli_fetch_assoc($result))
        {
          if($answer==$row['reset_answer'])
          {
              ?>
<form  method="POST" action="change_password.php?u_name=<?php echo $name;?>">
              <label>ENTER THE NEW PASSWORD:</label>
              <input type="password" name="new_answer"><br>
              <label>RE-ENTER THE NEW PASSWORD:</label>
              <input type="password" name="r_new_answer">
              <input type="submit" value="reset">
              </form>
              
             
         <?php     
          }
          else{
              echo "wrong";
          }
    }                
         }
           
        ?>
       


    
          