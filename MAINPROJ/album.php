
<?php

session_start();

$user=$_SESSION['username'];
    $query = "SELECT * FROM album WHERE username='$user'";
             
    $search_result = filterTable($query);

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "music");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            body{
                background: black;
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
        
        <form action="album.php" method="post">
            <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
           
        <div class="u"><td>
                 
                <h4> <a href="det.php" class="p">back</a></h4></div>
            
            
            <table class="p">
                <tr>
                   
                    <th>album_name</th>
                    <th>songs</th>
                    
                </tr>

      <!-- populate table from mysql database -->
                <?php 
				while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['album_name'];?></td>
                    <?php
                           echo "<td><a href='albums.php?value=".$row['album_name']."'>songs</a></td>"; ?>
                  
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
