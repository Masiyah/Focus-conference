

<?php          
    session_start(); 
    include "db_conn.php";
    $date_time = date("Y/m/d");
    $delegate = $_POST['barcode'];

    //if($date_time === "2021/11/11"){
        // $sql = "SELECT * FROM student WHERE Student_Number='$student'";
   // }else{
    //    $sql = "SELECT * FROM student WHERE Student_Number='$barcode'";
   // }
    
    $sql2 = "SELECT * FROM attendance WHERE Bar_Code='$barcode' AND Datee='$date_time'";
    
    // $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);

    while ($row = mysqli_fetch_array($result2)){
        $info = $row['Title']." ". $row['Name']." ". $row['Surname']; 
        $info2 = $row['Institution'];
        $name = $row['Name'];
        $t = $row['Title'];
        $s = $row['Surname'];
        $i = $row['Institution'];

        if (mysqli_num_rows($result2) === 0) {
        $sql = "INSERT INTO attendance (Title, Namee, Surname, Institution, Bar_Code, Datee) 
        VALUES('$t','$name','$s', '$i','$barcode','$date_time')";
        $result2 = mysqli_query($conn, $sql2);
        }
    }

    $_SESSION['info'] = $info;
    $_SESSION['info2'] = $info2;


       $conn-> close();
       header("Location: mypage.php?$info"); exit();
?>