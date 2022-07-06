<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="table.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/nav.css"> -->
</head>

<img src="mutlogo.png" style="width:250px; height:200px; display:inline; margin-left:100px;">
<!--<img src="FYE2.jpg" style="width:300px; height:200px; margin-left:500px;">-->
<img src="focuslogo.png" style="width:300px; height:200px; margin-left:500px;">

 <body style="margin-left:0px; min-width: 890px; background: #FFFFFF">
 <?php
  $n=0;
  $selected = null;
  ?>

<br><h1 style="color:black;">List of All Attended</h1>

     <form action="" method="post" enctype="multipart/form-data" autocomplete="off" style='width:111%;'>

     <?php          
        session_start(); 
        include "db_conn.php";
        $total = 0;
      
        if($selected==null){
            $sql = "SELECT * FROM attendance";
        } 
        else {
            $sql = "SELECT * FROM attendance WHERE Datee = '$selected'";
        }
        $result = $conn-> query($sql);
        if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){    $total++;  }      
        }
            $conn-> close();
            $total = "Total ". $total;
            $_SESSION['total'] = $total;
    ?>

<label>Search Using Date</label><br><br>
     <div class="wrapper">
          <!-------------------------------------------------------------------------------------------------------->
          <div id="myDIV">
          <select name='sub1' placeholder="Select Item" onChange='this.form.submit();'>
          <option value=""  selected disabled>Select Date</option>
          <?php
               session_start(); 
               include "db_conn.php";
               $sql = "SELECT Distinct Datee FROM attendance";
               $result = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_array($result)){
               echo "<option value='" .$row['Datee'] ."'>" .$row['Datee'] ."</option>";
               }
               echo "</select>";
               ?>
          </div>
    </div>

    <?php
     if(isset($_POST['sub1'])){
          if(!empty($_POST['sub1'])) { $selected = $_POST['sub1'];  }
           $_SESSION['selected'] = $selected;
     }
    ?>
    <!-- -------------------------------------------------------------------------------------------------------------- -->
<?php
$total1 =  $_SESSION['total'];
?>
    <br> <br> <table>
            <tr>
                <th style="background:#420303;">Title</th>
                <th style="background:#420303;">Name</th>
                <th style="background:#420303;">Surname</th>
                <th style="background:#420303;">Institution</th>
                <th style="background:#420303;">Barcode</th>
            </tr>
            <?php          
                include "db_conn.php";
                $total = 0;

                if($selected==null){
                    $sql = "SELECT * FROM attendance";
                } else {
                    $sql = "SELECT * FROM attendance WHERE Datee = '$selected'";
                }
               
                $result = $conn-> query($sql);
                if($result-> num_rows > 0){
                    $total = 0;
                    while($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row['Title'] ."</td><td>" . $row['Namee']."</td><td>" . $row['Surname']."</td><td>" . $row['Institution']."</td><td>" . $row['Bar_Code'] ."</td></tr>";
                        $total++;
                    }

                    echo "</table";
                    $_SESSION['total'] = $total;
                }
                else{    echo "No Items Found! Please Add Items";    }
                   $conn-> close();  
                   $total = "Total number of delegate attended on the $selected : ".$total                
            ?>

        </table><br>

        <p class="success"><?php echo " $total"; ?></p>

        <button type="" formaction="institutionAttendance.php" style="width:20%;">View By Institution</button><br><br><br>
     <button type="" formaction="allusers.php" style="width:20%; background:#420303;">Back</button><br><br><br>
     </form><br><br>
     </body>
</html>


