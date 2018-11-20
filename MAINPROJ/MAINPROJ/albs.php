<?php
     $query = "SELECT DISTINCT(A.album_name),A.genre,A.year,A.id from songs S,album A,artist B where A.album_name=S.album_name ";
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
          <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
        <div class="u"><td>
            <a href="user.php" class="p"><h4>back</h4></a></td>
    </div>
            
            
            <table>
                <tr>
                    <th>album_name</th>
                    <th>genre</th>
                    <th>year of album</th>
                    <th>songs</th>
                  
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['album_name'];?></td>
                    <td><?php echo $row['genre'];?></td>
                    <td><?php echo $row['year'];?></td>
 <?php 
                              echo "<td><a href='sngs.php?value=".$row['id']."'>songs</a></td>"; ?>                  
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>


