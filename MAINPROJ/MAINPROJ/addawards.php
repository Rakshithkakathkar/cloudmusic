<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","music");
if(isset($_POST['add_btn']))
{
    $username=mysql_real_escape_string($_POST['username']);
    $award_name=mysql_real_escape_string($_POST['award_name']);
    
    
            $sql="INSERT INTO awards(username,award_name) VALUES('$username','$award_name')";
            mysqli_query($db,$sql);  
     header("location:det.php"); 
}     

?>
<!DOCTYPE html>
<html>
<head>
  <title>add awards</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="header">
        <h1>   <a href="index.php" class="p">Crazy Tunes</a></h1>
	</div>
<div class="header" >
    <h1><a class="p">add awards</a></h1>
</div>

    <form method="post" action="addawards.php">
  <table>
     <tr>
         <td><a class="p">username : </a></td>
         <td><input type="varchar" name="username" value="<?= $_SESSION['username'] ?>" class="textInput"></td>
     </tr>
         <tr>
         <td><a class="p">awards : </a></td>
           <td><input type="varchar" name="award_name" class="textInput"></td>
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
