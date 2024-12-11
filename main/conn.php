<?php

$host = "localhost";
$server = "root";
$password = "";
$db = "blog_web";

$conn = mysqli_connect($host,$server,$password,$db);
if($conn){
    echo("connected");
}
else{
    echo("die connection");
}

// $site ="C\xampp\htdocs\blogging_web\" ;
// $site_root = "C\xampp\htdocs\blogging_web\admin";

?>