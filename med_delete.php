<?php
include "db_conn.php";
$ID = $_GET['id'];
$sql = "DELETE FROM `medicine` WHERE ID =$ID";
$result = mysqli_query($conn, $sql);
if($result) {
    header("Location: med_index.php?msg=Deleted Successfully");
}
else {
    echo "Failed: " . mysqli_error($conn);
}
?>