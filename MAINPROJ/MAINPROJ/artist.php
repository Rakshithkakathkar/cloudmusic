<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","music");
if(isset($_POST['login_btn']))
{
    
    $username=mysql_real_escape_string($_POST['username']);
    $password=mysql_real_escape_string($_POST['password']);
    $password=md5($password); //Remember we hashed password before storing last time
    $sql="SELECT * FROM artist WHERE username='$username' AND password='$password'";
    $result=mysqli_query($db,$sql);
   while($row = mysqli_fetch_array($result))
   {
                  $id = $row['id'];
                    
   }
    
    if(mysqli_num_rows($result)==1)
    {
       // $_SESSION['message']="You are now Loggged In";
        $_SESSION['username']=$username;
        $_SESSION['id']=$id;
        $_SESSION['album_name']=$album_name;
        
        header("location:det.php");
    }
   else
   {
                $_SESSION['message']="Username and Password combiation incorrect";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title> login and logout </title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
        <div class="header">
            <h1> <a href="index.php" class="p">Crazy Tunes</a></h1>
	</div>
<div class="header">
 
    <br>
    <h1 class="p">Login</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
    <form method="post" action="artist.php">
  <table>
     <tr>
         <td><a class="p">Username :</a> </td>
           <td><input type="varchar" name="username" class="textInput"></td>
     </tr>
      <tr>
          <td><a class="p">Password :</a> </td>
           <td><input type="varchar" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="login_btn" class="Log In"></td>
     </tr>
     <tr><td></td><td
             <h3 ><a href="register.php" class="p">Register</a></h3></td></tr>
</table>
</form>
</body>

</html>