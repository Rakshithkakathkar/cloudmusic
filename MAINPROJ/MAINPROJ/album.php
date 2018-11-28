<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            body{
                background-image: url(46123c.jpg);
            }
            table,tr,th,td
            {
                width: 80%;
                margin: auto;
             border: 1px solid yellow;
               border-collapse: collapse;
            text-align:center;
            font-size:30px;
            table-layout:fixed;
            background: black;
             opacity: 0.8;
           color: yellow;
           margin-top:100px;
            }
        </style>
    </head>
    <body>
<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "music");
if(!$connect){
    die("Can not connect:".mysqli_error());
}


    $query = "SELECT DISTINCT(A.album_name),A.aid,B.id from album A,artist B where  B.username=A.username AND B.id=".$_SESSION['id'];

    
             
    $search_result = mysqli_query($connect, $query);
?>




    
        
        <form action="album.php" method="post">
            <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
           
        <div class="u"><td>
                 
                <h4> <a href="det.php" class="p">back</a></h4></div>
            
            
            <table>
                <tr>
                   
                    <th>album_name</th>
                    <th>songs</th>
                    
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['album_name'];?></td>
                    <?php
                           echo "<td><a href='albums.php?value=".$row['id']."'>songs</a></td>"; ?>
                   
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
?>
</html>
