<?php
$login = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../actions/connect.php');
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` where username = '$username'  AND email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $username;
                header("Location: /blog_website/?login=true");
            } else {
                header("Location: /blog_website?login=false");
            }
        }
    } else {
        header("Location: /blog_website/?login=false");
    }
}
