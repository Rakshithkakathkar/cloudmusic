<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","music");
if(isset($_POST['add_btn']))
{
      $song_title=mysql_real_escape_string($_POST['song_title']);
    $album_name=mysql_real_escape_string($_POST['album_name']);
 if(isset($_FILES['file'])){
$file=$_FILES['file'];
//file properties
$file_name=$file['name'];
$file_tmp=$file['tmp_name'];
$file_size=$file['size'];
$file_error=$file['error'];
  //$query="insert into songs(song_title,album_name,name) values('$song_title','$album_name','$file_name')";
      //          mysqli_query($db,$query);

//work out the file extension
$file_ext=explode('.',$file_name);
$file_ext= strtolower(end($file_ext));

$allowed= array('mp3');

if(in_array($file_ext,$allowed)){
    if($file_error ===0){
        if($file_size <= 2097152 ){
        
            $file_name_new=uniqid('',true).'.'.$file_ext;
            $file_destination= 'uploaded/'.$file_name_new;
            $query="insert into songs(song_title,album_name,name) values('$song_title','$album_name','$file_name_new')";
                mysqli_query($db,$query);
           
            if(move_uploaded_file($file_tmp, $file_destination)){
             
           
            }
            
            }
      }
   }
}
   header("location:det.php"); 
}     

?>
<!DOCTYPE html>
<html>
<head>
  <title>add song</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="header">
        <h1>   <a href="index.php" class="p">Crazy Tunes</a></h1>
	</div>
<div class="header" >
    <h1><a class="p">add a song</a></h1>
</div>

    <form method="post" action="addsong.php" enctype="multipart/form-data">
  <table>
       <tr>
         <td><a class="p">song_title : </a></td>
           <td><input type="varchar" name="song_title" class="textInput"></td>
     </tr>
     <tr>
         <td><a class="p">album_name : </a></td>
         <td><input type="varchar" name="album_name" value="" class="textInput"></td>
     </tr>
        
     <tr>
         <td><a class="p">upload : </a> </td>
           <td><input type="file" name="file"></td>
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
