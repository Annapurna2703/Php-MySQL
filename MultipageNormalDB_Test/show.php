<?php
include "config.php"
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <body>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-9">
                    <h1>Products</h1>
                </div>
                <div class="col-3">
                    <a href = "show.php"><input type="submit" value = " Show " name="" class="btn btn-success"></a>
                    &nbsp; <a href = "insert_form.php"><input type="submit" value = "+ Insert" name="" class="btn btn-success"></a>
                </div>
            </div>

            <?php

                if(isset($_GET['msg'])) {
                    print '<br><div class="alert alert-success">'.$_GET['msg'].'</div><br>';
                }
		    ?>

            <table class="table">
                
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                    $sql= "SELECT * FROM `Products`";
                    $res= $db->query($sql);
                    while($row= $res->fetch_object()) {
                        print"
                            <tr>
                                <td>$row->Id</td>
                                <td>$row->Name</td>
                                <td>$row->Price</td>
                                <td><a href=\"edit_form.php?edit_id=$row->Id\">Edit</a></td>
                                <td><a href=\"delete_query.php?del_id=$row->Id\" onclick=\"return confirm('Do u want to delete?')\">Delete</a></td>
                            </tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>