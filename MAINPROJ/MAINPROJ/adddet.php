<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","music");
if(isset($_POST['add_btn']))
{
    $username=mysql_real_escape_string($_POST['username']);
    $age=mysql_real_escape_string($_POST['age']);
      $phone=mysql_real_escape_string($_POST['phone']);
      $address=mysql_real_escape_string($_POST['address']);
    
            $sql="INSERT INTO artist_det(username,age,phone,address) VALUES('$username','$age','$phone','$address')";
            mysqli_query($db,$sql);  
     header("location:det.php"); 
}     

?>
<!DOCTYPE html>
<html>
<head>
  <title>add details</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="header">
        <h1>   <a href="index.php" class="p">Crazy Tunes</a></h1>
	</div>
<div class="header" >
    <h1><a class="p">add details</a></h1>
</div>

    <form method="post" action="adddet.php">
  <table>
     <tr>
         <td><a class="p">username : </a></td>
         <td><input type="varchar" name="username" value="<?= $_SESSION['username'] ?>" class="textInput"></td>
     </tr>
         <tr>
         <td><a class="p">age : </a></td>
           <td><input type="vachar" name="age" class="textInput"></td>
     </tr>
     <tr>
         <td><a class="p">phone : </a> </td>
           <td><input type="int" name="phone" class="textInput"></td>
     </tr>
      <tr>
         <td><a class="p">address : </a> </td>
           <td><input type="varchar" name="address" class="textInput"></td>
     </tr>
      
      
     <tr>
           <td></td>
           <td><input type="submit" name="add_btn" class="Register"></td>
     </tr>
     <tr>
           <td></td>
           <td> <a href="det.php" class="p">back</a></td>
     </tr>
 
</table>
</form>
</body>
</html>
