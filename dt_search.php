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
            <a href="p_add.php" class="btn btn-dark mb-3">Add Patient</a>
            <a href="p_menu.php" class="btn btn-dark mb-3">Exit</a>
            
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Patient's ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date and Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_conn.php";
                    if(isset($_POST['submit'])) 
                        $search=$_POST['search'];

                        $sql = "SELECT * FROM `date_time` WHERE Medicine=$search";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php echo $row['Medicine'] ?></td>
                                <td><?php echo $row['Date_Time'] ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
                </table>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>