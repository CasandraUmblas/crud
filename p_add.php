<?php
include "db_conn.php";

if(isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Sex = $_POST['Sex'];
    $Ailment = $_POST['Ailment'];
    
    $sql = "INSERT INTO `patients`(`ID`, `Name`, `Age`, `Sex`, `Ailment`) VALUES (NULL,'$Name','$Age','$Sex','$Ailment')";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: p_index.php?msg=Added successfully");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Pharmacy Management System</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #5F9EA0;">
            Pharmacy Management System
    </nav>

    <div class="container">
        <div class="text-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>
            <h3>Add Patient</h3>
            <p class="text-muted">Complete the form below</p>
        </div>
    
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width: 300px;">
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Patient's Name:</label>
                        <input type="text" class="form-control" name="Name"
                        placeholder="Enter your name">
                    </div>
                </div>

            <div class="mb-3">
                <label class="form-label">Age:</label>
                <input type="text" class="form-control" name="Age"
                placeholder="Enter your age">
            </div>

            <div class="mb-3">
                <label class="form-label">Ailment:</label>
                <input type="text" class="form-control" name="Ailment"
                placeholder="Enter your ailment">
            </div>

            <div class="form-group mb-3">
                <label>Sex:</label> &nbsp;
                <input type="radio" class="form-check-input" name="Sex"
                id="Male" value="Male">
                <label for="Male" class="form-input-label">Male</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="Sex"
                id="Female" value="Female">
                <label for="Female" class="form-input-label">Female</label>
            </div> 

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="p_menu.php" class="bi-chevron-compact-left btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>