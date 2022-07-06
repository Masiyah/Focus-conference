<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="table.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/nav.css"> -->
</head>

<img src="mutlogo.png" style="width:250px; height:200px; display:inline; margin-left:100px;">
<!--<img src="FYE.jpg" style="width:300px; height:200px; margin-left:500px;">-->
<img src="focuslogo.png" style="width:300px; height:200px; margin-left:500px;">

 <body style="margin-left:0px; min-width: 890px; background: #FFFFFF">

<br><h1 style="color:black;">List of All Delegates</h1>

     <form action="" method="post" enctype="multipart/form-data" autocomplete="off" style='width:111%; background:#FFE993'>
     <table>
            <tr>
                <th style="background:#420303;">Title</th>
                <th style="background:#420303;">Name</th>
                <th style="background:#420303;">Surname</th>
                <th style="background:#420303;">Institution</th>
                <th style="background:#420303;">Barcode</th>
            </tr>
            <?php          
                session_start(); 
                include "db_conn.php";
                //$id = $_SESSION['Company_id'];

                $sql = "SELECT * FROM delegate";
                $result = $conn-> query($sql);
                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row['Title'] ."</td><td>" . $row['Name']."</td><td>" . $row['Surname']."</td><td>" . $row['Institution']."</td><td>" . $row['Bar_Code'] ."</td></tr>";
                    }
                    echo "</table";
                }
                else{    echo "No Items Found! Please Add Items";    }   $conn-> close();
            ?>

        </table><br>


     <button type="" formaction="stats.php" style="width:20%;">View Statistics</button><br><br><br>
     <button type="" formaction="mypage.php" style="width:20%; background:#420303;">Back</button><br><br><br><br>
     </form><br><br>
     </body>
</html>