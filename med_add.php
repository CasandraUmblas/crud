<?php
include "db_conn.php";

if(isset($_POST['submit'])) {
    $Medicine = $_POST['Medicine'];
    $Direction = $_POST['Direction'];
    $Indication = $_POST['Indication'];
    $Side_effects = $_POST['Side_effects'];
    
    $sql = "INSERT INTO `medicine`(`ID`, `Medicine`, `Direction`, `Indication`, `Side_effects`) VALUES (NULL, '$Medicine','$Direction','$Indication','$Side_effects')";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: ex_index.php?msg=Added successfully");
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
            <h3>Add Medicine</h3>
            <p class="text-muted">Complete the information below</p>
        </div>
    
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width: 300px;">
                <div class="row">
                    <div class="col mb-3">
                        <input type="text" class="form-control" name="Medicine"
                        placeholder="Medicine">
                    </div>
                </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="Direction"
                placeholder="Direction">
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="Indication"
                placeholder="Indication">
            </div> 

            <div class="mb-3">
                <input type="text" class="form-control" name="Side_effects"
                placeholder="Side Effects">
            </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="ph_index.php" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>