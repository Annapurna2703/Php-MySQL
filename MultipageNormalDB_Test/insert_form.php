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
            <div class="row">
			    <div class="col-6">
                    <br>
                    <h3>Insert a New Product</h3>
                    <form method="post" action="insert_query.php" enctype="multipart/form-data">
                        <table class="table">
                        
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="Name" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="text" name="Price" class="form-control"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="btn btn-success" value="Insert Product"></td>
                            </tr>

                        </table>
			        </form>
			    </div>
		    </div>
    </div>
</body>
</html>