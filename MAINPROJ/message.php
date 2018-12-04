
<?php

session_start();

//$album=$_GET['value'];
$user=$_SESSION['username'];
    $query = "SELECT * from artist B,message M,msg_time T where B.username=M.artist_name AND B.username='$user'";
             
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
            <h4> <a href="det.php" class="u">back</a></h4>
           
            
            <table class="p">
                <tr>
                   <th>Date</th>
                    <th>From</th>
                    <th>Email</th>
                    
                    <th>Message</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['msg_date'];?></td>
                    <td><?php echo $row['user_name'];?></td>
                    <td><?php echo $row['user_email'];?></td>
                     <td><?php echo $row['msg'];?></td>
                    
                    
                  
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
