<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

//Database Connection

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","My_Test");

$db = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
                    <a href = "index.php?action=show"><input type="submit" value = " Show " name="" class="btn btn-success"></a>
                    &nbsp; <a href = "index.php?action=insert_form"><input type="submit" value = "+ Insert" name="" class="btn btn-success"></a>
                </div>
            </div>
            
            
            
            
            <!-- Start Insert Query Part -->
            <?php
                
            if( isset($_GET['action']) && $_GET['action'] == "insert_query") {

                $sql = "INSERT INTO `Products` (`Name`, `Price`) VALUES ('$_POST[Name]', '$_POST[Price]') ";
                $db->query($sql);

                print '<br><div class="alert alert-success"><b>'.$_POST['Name'].'</b> Added Successfully.</div><br>';
            }
            
            ?>
           
            <!-- End Insert Query Part -->


            
            
            
            <!-- Start Edit Query Part -->
            <?php
                
            if( isset($_GET['action']) && $_GET['action'] == "edit_query") {

                $sql = "UPDATE `Products` SET `Name` = '$_POST[Name]', `Price` = '$_POST[Price]'
                                        WHERE `ID` = '$_POST[Id]' ";
                $db->query($sql);

                print '<br><div class="alert alert-success"><b>'.$_POST['Name'].'</b> Edited Successfully.</div><br>';
            }
            
            ?>
            <!-- End Edit Query Part -->
            
            
            
            <!-- Start Delete Query Part -->
            <?php
                
            if( isset($_GET['action']) && $_GET['action'] == "delete") {

                //$sql = "DELETE FROM `Products` WHERE `Id` = '$_GET[del_id]'  ";
                $sql = "UPDATE `Products` SET `Status` = 'Deleted' WHERE `Id` = '$_GET[del_id]' ";
                $db->query($sql);

                print '<br><div class="alert alert-warning">Deleted Successfully.</div><br>';
            }
            
            ?>
            <!-- End Delete Query Part -->
            



            
            <!-- Start Display Part -->
            <?php
            if(!isset($_GET['action']) || $_GET['action'] == "show" || $_GET['action'] == "delete" || $_GET['action'] == "insert_query" || $_GET['action'] == "edit_query") {
            ?>
            <h3>View Product List</h3>
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

                $sql = "SELECT * FROM `Products` WHERE `Status` != 'Deleted' ";
                $res = $db->query($sql);
                while($row = $res->fetch_object()) {
                    print "
                    <tr>
                        <td>$row->Id</td>
                        <td>$row->Name</td>
                        <td>$row->Price</td>
                        <td><a href = \"index.php?action=edit_form&edit_id=$row->Id\">Edit</a></td>
                        <td><a href = \"index.php?action=delete&del_id=$row->Id\" onclick = \"return confirm('Delete?')\">Delete</a></td>
                    </tr>";
                }   
            ?>

            </table>
            <?php
            }
            ?>
            
            <!-- End Display Part -->


            
            <!-- Start Insert Form Part -->
            <?php
            if(isset($_GET['action']) && $_GET['action'] == "insert_form") {
            ?>
            <div class="row">
                <div class="col-6">
                <br>
                <h3>Insert a New Product</h3>
                <form method="post" action="index.php?action=insert_query" enctype="multipart/form-data">
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
            <?php
            }
            ?>
            
            <!-- End Insert Form Part -->



            
            <!-- Start Edit Form Part -->
            <?php
            if(isset($_GET['action']) && $_GET['action'] == "edit_form") {

            $sql = "SELECT * FROM `Products` WHERE `ID` = '$_GET[edit_id]'";
            $res = $db->query($sql);
            $row = $res->fetch_object(); 
            ?>
            <div class="row">
                <div class="col-6">
                <br>
                <h3>Edit Product</h3>
                <form method="post" action="index.php?action=edit_query" enctype="multipart/form-data">
                <table class="table">
                    <input type="hidden" name="Id" value = "<?php print $row->Id;?>">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="Name" class="form-control" required
                            value = "<?php print $row->Name;?>"
                            ></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="Price" class="form-control"
                            value = "<?=$row->Price?>"
                            ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-success" value="Edit Product"></td>
                    </tr>

                </table>
                </form>
                </div>
            </div>
            <?php
            }
            ?>
            
            <!-- End Edit Form Part -->

        </div>
    
</body>
</html>