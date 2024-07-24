        <?php
        $link =mysqli_connect('localhost','root','','car_parking');
        if(htmlspecialchars($_SERVER["REQUEST_METHOD"])== "POST")
            {
            $i=0;
            $name=htmlspecialchars ($_REQUEST['name']);
            
            $query="select user_name , reset_question, reset_answer from login" ;
            $result=mysqli_query($link,$query);
            $numrow=mysqli_num_rows($result);
         if($numrow>0)
{
        while($row= mysqli_fetch_array($result))
        {
            if( $name==$row['user_name'])
            {
                echo "Hello ".$row['user_name']."your reset question!!!<br>";
                echo $row['reset_question'];
                $i++;
            } 
        }
        if($i==0)
            {
                echo "<script> alert('wrong username'); </script>";
            }}
?>
<form method="POST" action="logic.php? a=<?php echo $name;?>">
     <input type="text" name ="answer">
            <input type="submit" value="verify">
</form>
<?php
}  ?>
           
    </body>
</html>
