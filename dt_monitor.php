<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biotech Pharmacy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="card mt-5">
                <div class="crad-header">
                    <h4> History </h4>
                </div>
                <div class="card-body">
                
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Monitored Date and Time</th>
                                </tr>
                            </thead>  
                            <tbody>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "adbms");

                                $query = "SELECT * FROM date_time ORDER BY 'dt_id'";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                            <tr>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['date_time']; ?></td>
                                            </tr>
                                        <?php  
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="2">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                                ?> 
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>            
</body>
</html>