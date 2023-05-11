<?php
include 'db_conn.php';
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
    
    <title>Biotech Pharmacy</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #5F9EA0;">
         Biotech Pharmacy
    </nav>

    <div class="container my-5">
        <form method="post">
            <input type="text" placeholder="Search patient's name" name="search">
            <button class="btn btn-dark btn-sm" name="submit">Search</button>
            <a href="ph_menu.php" class="btn btn-dark btn-sm">Back</a>
        </form>
        <div class="container my-5">
            <table class="table table-hover text-center">
                <?php
                if(isset($_POST['submit'])) {
                    $search=$_POST['search'];

                    $sql="SELECT * FROM `date_time` WHERE name LIKE '$search'";
                    $result=mysqli_query($conn, $sql);
                    if($result) {
                        if(mysqli_num_rows($result)>0) {
                            echo '
                            <thead>
                            <tr>
                            <th>Name</th>
                            <th>Monitored Date and Time</th>
                            </thead>
                            ';
                            while ($row=mysqli_fetch_assoc($result)) {;
                            echo '<tbody>
                            <tr>
                            <td> '.$row['name'].' </td>
                            <td> '.$row['date_time'].' </td>
                            </tr>
                            </tbody>
                            ';
                            }
                        } else {
                            echo '<h6>Record Not Found</h6>';
                        }
                    }
                }
                
                ?>
            </table>
        </div>
    </div>
</body>
</html>