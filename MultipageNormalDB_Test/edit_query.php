<?php
include "config.php";

$sql= "UPDATE `Products` SET `Name` = '$_POST[Name]', `Price` = '$_POST[Price]' WHERE `Id` = '$_POST[Id]' ";
$db->query($sql);

header("Location:show.php?msg=".$_POST['Name']." updated successfully");


