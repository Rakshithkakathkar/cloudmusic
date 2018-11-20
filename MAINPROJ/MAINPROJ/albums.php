
<?php

session_start();

$album=$_GET['value'];

//SELECT * from songs S,album A,artist B where B.album_name=A.album_name AND B.album_name=S.album_name 
    $query = "SELECT * from songs S,album A,artist B where A.album_name=S.album_name AND A.id=".$album;
             
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
        
        <form action="php_html_table_data_filter.php" method="post">
            <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
            <h4> <a href="album.php" class="p">back</a></h4>
            <h2><a href="addsong.php" class="p">add a song</a></h2>
            
            <table>
                <tr>
                   
                    <th>album_name</th>
                    <th>song_title</th>
                    
                    <th>play/download</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['album_name'];?></td>
                    <td><?php echo $row['song_title'];?></td>
                    
                    <td><a href='uploaded/<?php echo $row['name'];?>'>play</a></td>
                  
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
