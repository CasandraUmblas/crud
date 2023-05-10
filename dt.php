<?php
session_start();
$conn = mysqli_connect("localhost","root","","adbms");

if(isset($_POST['save_datetime']))
{
    $name = $_POST['name'];
    $date_time = $_POST['date_time'];

    $query = "INSERT INTO Date_Time (name, date_time) VALUES ('$name','$date_time')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Date Time Inserted Successfully";
        header("Location: dt_index.php");
    }
    else
    {
        $_SESSION['status'] = "Date Time Not Inserted";
        header("Location: dt_index.php");
    }
}
?>