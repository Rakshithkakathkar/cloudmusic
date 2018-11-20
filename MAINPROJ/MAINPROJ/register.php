<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","music");
if(isset($_POST['register_btn']))
{
    $username=mysql_real_escape_string($_POST['username']);
    $email=mysql_real_escape_string($_POST['email']);
      $album_name=mysql_real_escape_string($_POST['album_name']);
    $password=mysql_real_escape_string($_POST['password']);
    $password2=mysql_real_escape_string($_POST['password2']);  
  
     if($password==$password2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO artist(id,username,email,password) VALUES('','$username','$email','$password')";
            mysqli_query($db,$sql);  
            $_SESSION['message']="You are now logged in"; 
        
            $_SESSION['username']=$username;
            $_SESSION['album_name']=$album_name;
           
            header("location:adddet.php");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two password do not match";   
     }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="header">
        <h1>   <a href="index.php" class="p">Crazy Tunes</a></h1>
	</div>
<div class="header" >
    <h1><a class="p">Register</a></h1>
</div>
 <?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
    <form method="post" action="register.php">
  <table>
     <tr>
         <td><a class="p">Username : </a></td>
           <td><input type="varchar" name="username" class="textInput"></td>
     </tr>
      <tr>
         <td><a class="p">Email : </a> </td>
           <td><input type="varchar" name="email" class="textInput"></td>
     </tr>
         
    

      <tr>
          <td><a class="p">Password : </a></td>
           <td><input type="varchar" name="password" class="textInput"></td>
     </tr>
      <tr>
          <td><a class="p">Password again: </a></td>
           <td><input type="varchar" name="password2" class="textInput"></td>
     </tr>
      
      <tr>
           <td></td>
           <td><input type="submit" name="register_btn" class="Register"></td>
     </tr>
 
</table>
</form>
</body>
</html>
