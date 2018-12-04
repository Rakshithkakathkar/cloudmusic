<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","music");
if(isset($_POST['add_btn']))
{
   
    $username=mysql_real_escape_string($_POST['username']);
    $album_name=mysql_real_escape_string($_POST['album_name']);
     $genre=mysql_real_escape_string($_POST['genre']);
    $year=mysql_real_escape_string($_POST['year']);
    
    
            $sql="INSERT INTO album VALUES('$username','$album_name','$genre','$year')";
            mysqli_query($db,$sql);  
     header("location:det.php"); 
    //  $_SESSION['album_name']=$album_name;
}     

?>
<!DOCTYPE html>
<html>
<head>
  <title>Your Album</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="header">
        <h1>   <a href="index.php" class="p">Tunes</a></h1>
	</div>
<div class="header" >
    <h1><a class="p">Your Album</a></h1>
</div>

    <form method="post" action="addalbs.php">
  <table>
      <tr>
         <td><a class="p">artist_name : </a></td>
         <td><input type="varchar" name="username" class="textInput" value="<?= $_SESSION['username'] ?>"></td>
     </tr>
     <tr>
         <td><a class="p">album_name : </a></td>
         <td><input type="varchar" name="album_name" class="textInput" value="" required></td>
     </tr>
         <tr>
         <td><a class="p">genre : </a></td>
           <td><input type="varchar" name="genre" class="textInput" required></td>
     </tr>
 <tr>
         <td><a class="p">year : </a></td>
           <td><input type="int" name="year" class="textInput" required></td>
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
