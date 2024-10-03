<?php
if (isset($_POST["submit"])) {
    include('connect.php');
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $summary = mysqli_real_escape_string($conn, $_POST["summary"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $date = mysqli_real_escape_string($conn,  $_POST["date"]);
    $insertSql = "INSERT INTO posts (date,title,summary,content) value ('$date','$title','$summary','$content')";
    $result = mysqli_query($conn, $insertSql);
    if (!$result) {
        echo 'The data is not submited in database';
    } else {
        header("location: index.php");
    }
}
?>
<?php
if (isset($_POST["update"])) {
    include('connect.php');
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $summary = mysqli_real_escape_string($conn, $_POST["summary"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $date = mysqli_real_escape_string($conn,  $_POST["date"]);
    $id =  mysqli_real_escape_string($conn, $_POST["id"]);

    $insertSql = "UPDATE posts set  date='$date',title='$title',summary='$summary',content='$content' WHERE id= $id ";
    $result = mysqli_query($conn, $insertSql);
    if (!$result) {
        echo 'the data is not submited in database';
    } else {
        header("location: index.php");
    }
}

?>