<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="table.css">
</head>

<img src="mutlogo.png" style="width:250px; height:200px; display:inline; margin-left:100px;">
<!--<img src="FYE.jpg" style="width:300px; height:200px; margin-left:500px;">-->
<img src="focuslogo.png" style="width:300px; height:200px; margin-left:500px;">

 <body style="margin-left:0px; min-width: 890px; background: #FFFFFF">

<br><h1></h1>

     <form action="" method="post" enctype="multipart/form-data" autocomplete="off" style='width:111%;'>

    <br> <br> <table>
            <tr>
                <th style="background:#420303;">Institution</th>
                <th style="background:#420303;">Total Attended</th>
            </tr>
            <?php      
                session_start();     
                include "db_conn.php";
                $total = 0;
                $sql = "SELECT * FROM institution";
                $result = $conn-> query($sql);
                    $total = 0;
                    while($row = $result-> fetch_assoc())
                    {
                        $total = 0;
                       $current_ins = $row['Namee'];
                       $sql1 = "SELECT * FROM attendance WHERE Institution = '$current_ins'";
                        $result1 = $conn-> query($sql1);
                        if($result1-> num_rows > 0){
                            while($row = $result1-> fetch_assoc()){    $total++;  }      
                        }
                        echo "<tr><td>".$current_ins."</td><td>" . $total ."</td></tr>";
                        $total=0;
                    }
                    echo "</table";
                   $conn-> close();                
            ?>

        </table><br>

     <button type="" formaction="stats.php" style="width:20%;">Back</button><br><br><br>
     </form><br><br>
     </body>
</html>


