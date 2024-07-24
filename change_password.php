<?php
$link =mysqli_connect('localhost','root','','car_parking');
$r_new_answer= htmlspecialchars($_REQUEST['r_new_answer']);
$new_answer= htmlspecialchars($_REQUEST['new_answer']);
$user_name=htmlspecialchars($_GET['u_name']);
                  
if($new_answer==$r_new_answer)
{
$query="update login set password='$new_answer' where user_name='$user_name'";
$change=mysqli_query($link, $query);
if(mysqli_affected_rows($link)>=1)
{
    echo "<script> alert ('your password is changed');</script>";
}
 else {
echo" not upadted";    
}
}
else
{
    echo "mismatch password";
}
?>