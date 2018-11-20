<?php

$sid=$_GET['value'];
    $query = "SELECT * FROM songs S,album A WHERE A.Album_name=S.Album_name AND A.id=".$sid;
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
        <title>PHP HTML TABLE DATA SEARCH</title>
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
                 
            <a href="albs.php" class="p"><h4>back</h4></a></td>
    </div>
              
            <table>
                <tr>
               
                    <th>Album_name</th>
                    <th>Song_title</th>
                    
                    <th>play/download</th>
                   
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                   
                    <td><?php echo $row['album_name'];?></td>
                    <td><?php echo $row['song_title'];?></td>
                    
                     <td><a class="p" href='uploaded/<?php echo $row['name'];?>'>play</a></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>


