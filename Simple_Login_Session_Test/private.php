<?php
session_start();

if( $_SESSION['logged_in'] != "Yes"){
    header("Location:index.php");
}
?>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam officia rem nostrum obcaecati voluptatibus perferendis fugiat laudantium natus, officiis ducimus aperiam provident impedit, animi neque voluptatum consequatur fuga expedita, delectus unde quibusdam ad sit! Magnam alias natus, commodi consequatur nesciunt dolorum quos voluptate amet cupiditate, voluptatum quidem exercitationem perspiciatis, laborum sit perferendis mollitia? Cum voluptates tempora rerum ab ipsam dicta?</p>
<?php
include "links.php";
?>