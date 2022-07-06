<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="table.css">
</head>

<img src="mutlogo.png" style="width:250px; height:200px; display:inline; margin-left:100px;">
<!--img src="FYE.jpg" style="width:300px; height:200px; margin-left:500px;"-->
<!--<div style="display:inline; margin-top:-100px; height:170px; width:200px; font-size:50px">2022 FOCUS CONFERENCE</div>-->
<img src="focuslogo.png" style="width:300px; height:200px; margin-left:500px;">
<body style="margin-left:0px; min-width: 890px; background: #FFFFFF">
<br><h1></h1>

    <!--<form action="" method="post" enctype="multipart/form-data" autocomplete="off" style='width:111%; background: #8d1919;'>-->
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off" style='width:111%; background: #FFE993;'>
     
    <?php if (isset($_GET['error'])) { ?> <p class="error"><?php echo $_GET['error']; ?></p> <?php } ?>
    <?php if (isset($_GET['success'])) { ?> <p class="success"><?php echo $_GET['success']; ?></p> <?php } ?>
        <?php
            if(isset($_POST['submit'])){
                $barcode = $_POST['barcode'];
            }
        ?>
    <!--input type="number" onmouseover="this.focus();"  name="barcode" value="" placeholder="Bar Code" style="width:78%; display:inline;"-->
    
    <input type="number" onmouseover="this.focus();"  name="barcode" value="" placeholder="Bar Code" style="width:78%; display:inline;">
    <button type="" style="width:20%; background: #8d1919">Search</button><br><br><br><br>

    <?php      
        session_start(); 
        include "db_conn.php";
        $date_time = date("2022/08/17");
        $date_time = date("Y/m/d");
        
        if(isset($_POST['barcode'])){  $barcode = $_POST['barcode'];  }
        else{  $barcode = null;  }

        $info = null;
        $info2 = null;
        $info3 = 0;
        $count = 0;
        $row = null;

        if($date_time === "2022/08/17"){   $sql = "SELECT * FROM delegate WHERE Bar_Code='$barcode' AND Datee//='$date_time'";  }
        else{    
       $sql = "SELECT * FROM delegate WHERE Bar_Code='$barcode'";  
       }
        
       $sql2 = "SELECT * FROM attendance WHERE Bar_Code='$barcode'";
        
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);

        $row = mysqli_fetch_array($result);
        if (!$row){
            $info = null; 
        }else{
            $info = $row['Title']." ". $row['Name']." ". $row['Surname']; 
            $info2 = $row['Institution'];
            $name = $row['Name'];
            $t = $row['Title'];
            $s = $row['Surname'];
            $i = $row['Institution'];

            if (mysqli_num_rows($result2) === 0) {
            $sql = "INSERT INTO attendance (Title, Namee, Surname, Institution, Bar_Code) 
            VALUES('$t','$name','$s', '$i','$barcode')";
            $result = mysqli_query($conn, $sql);
            }else{
                $count = 1;
                $info = "DELEGATE NOT REGISTERED-----!!!";
            }
        }

        $_SESSION['info'] = $info;
        $_SESSION['info2'] = $info2;
        $conn-> close();
    ?>

    <?php 
        $info = $_SESSION['info'];
        $info2 = $_SESSION['info2'];

        if($count === 1){
            $info3 = "DELEGATE ALREADY SIGNED IN!!!";
            echo "<tr><td><textarea type='text'  style='width:100%; border:none; background: #FFE993; height:200px; color:#8d1919; font-size:30px; text-align:center;'>$info3</textarea></td></tr>";
        }
        else{
            if($info === null) { 
                $info = "DELEGATE NOT REGISTERED!!!";
            echo "<tr><td><textarea type='text'  style='width:100%; border:none; background: #FFE993; height:200px; color:#8d1919; font-size:30px; text-align:center;'>$info</textarea></td></tr>";
            } else{
                echo "<tr><td><textarea type='text'  style='width:100%; border:none; background: #FFE993; height:200px; color:#8d1919; font-weight:bold; font-size:33px; text-align:center;'>$info\n\nFrom\n\n$info2</textarea></td></tr>";
            }
        }
    ?>
    <button formaction="allusers.php" style="width:20%; margin-left:130px; background: #8d1919">View All Delegates</button><br><br><br><br>
    <button formaction="add-delegate.php" style="width:20%; margin-left:130px; background: #8d1919">Add Delegate</button><br><br>
</form><br>
</body>
</html>