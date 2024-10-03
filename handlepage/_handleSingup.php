<?php
$userexist = false;
$signup = false;
$passwordnotmatch = false;
$emptyForm = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../actions/connect.php');
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $exitSql = "SELECT * FROM `users` where username = '$username'";
    $result = mysqli_query($conn, $exitSql);
    $exitRowNumber = mysqli_num_rows($result);
    if ($exitRowNumber > 0) {
        header("Location: /blog_website?userexist=true");
    } else {

        if ((strlen($username) == 0) || (strlen($password) == 0) || (strlen($cpassword) == 0)) {
            $emptyForm = true;
            header("Location: /blog_website?emptyForm=true");
            exit();
        }
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`,`email`, `password`, `timestamp`) VALUES ('$username','$email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $signup = true;
                header("Location: /blog_website?signup=true");
                exit();
            }
        } else {
            $passwordnotmatch = true;
            header("Location: /blog_website?passwordnotmatch=true");
            exit();
        }
        header("Location: /blog_website?singupsuccess=false&error=$showError");
    }
}
