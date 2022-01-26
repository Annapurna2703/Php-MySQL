<?php
include "config.php";

$sql= " DELETE FROM `Products` WHERE `Id` = '$_GET[del_id]' ";
$db->query($sql);

header("Location: show.php?msg=Deleted successfully");

?>