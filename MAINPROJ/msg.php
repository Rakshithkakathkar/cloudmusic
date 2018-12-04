<?php

//connect to database
$db=mysqli_connect("localhost","root","","music");
if(isset($_POST['btn']))
{
      $user_name=mysql_real_escape_string($_POST['user_name']);
        $user_email=mysql_real_escape_string($_POST['user_email']);
    $artist_name=mysql_real_escape_string($_POST['artist_name']);
$msg=mysql_real_escape_string($_POST['msg']);


            $query="insert into message(m_id,user_name,user_email,artist_name,msg) values('','$user_name','$user_email','$artist_name','$msg')";
                mysqli_query($db,$query);
          
   header("location:msg.php"); 
}     

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="header">
        <h1>   <a href="index.php" class="p">CrAzY TuNeS</a></h1>
	</div>


    <form method="post" action="msg.php" >
  <table>
       <tr>
         <td><a class="p">name : </a></td>
           <td><input type="varchar" name="user_name" class="textInput"></td>
     </tr>
     <tr>
         <td><a class="p">email : </a></td>
         <td><input type="varchar" name="user_email" value="" class="textInput"></td>
     </tr>
        
     <tr>
         <td><a class="p">artist_name : </a> </td>
          <td><input type="varchar" name="artist_name" value="" class="textInput"></td>
     </tr>
          <tr>
         <td><a class="p">message : </a> </td>
          <td><input type="text" name="msg"  class="textInput"></td>
     </tr>
      
     <tr>
           <td></td>
           <td><input type="submit" name="btn" class="Register"></td>
     </tr>
     <tr>
           <td></td>
           <td> <a href="user.php" class="p">back</a></td>
     </tr>
 
</table>
</form>
</body>
</html>
