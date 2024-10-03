<?php
$id = $_GET["id"];
if ($id) {
    include('../connect.php');
    $sqlDelete =  "DELETE FROM `posts` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sqlDelete);
    if ($result) {
        header("location: ../index.php");
    } else {
        die("Something is not write , data is not deleted !");
    }
} else {
    echo "Post not found";
}
