<?php
session_start();

echo  ' <header class="p-2 bg-dark text-center d-flex justify-content-between">
<div>
    <h1><a href=" index.php" class="text-white text-decoration-none">Simple Blog</a></h1>
</div>';
if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) {

    echo ' <div class="menus p-2">
         <form action="index.php" method="post">
             <div class="menu d-flex">
             <p class="fw-bold text-primary my-2 mx-2">Hi,' . $_SESSION['username'] . '</p>
                  <a href = "partials/logout.php" class="btn btn-outline-success ml-2 mx-2" >Logout</a>
                 <a href="actions?login=true" class="text-decoration-none btn btn-success ml-2">Dashboard</a>
             </div>
         </form>
     </div>';
} else {
    echo '<div class="d-flex">
    <div class="menus p-2 ">
        <form action="partials/login.php" method="post">
            <div class="menu">
                <button class="btn btn-success px-4 py-2">Login</button>
            </div>
        </form>
    </div>
    <div class="menus p-2">
        <form action="partials/signup.php" method="post">
            <div class="menu">
                <button class="btn btn-success px-4 py-2">SingUp</button>
            </div>
        </form>
    </div>';
}
echo '
</div>
</header>';



?>


<!-- **************************************************************** -->
<?php
if (isset($_GET['userexist']) && ($_GET['userexist']) == "true") {
    echo '<div class=" mb-0 mt-0 alert alert-danger alert-dismissible fade show" role="alert ">
                <strong>Sorry!</strong> The username is already taken. Please choose another one.

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
?>
<?php
if (isset($_GET['signup']) && ($_GET['signup']) == "true") {
    echo '<div class=" mb-0 mt-0 alert alert-danger alert-dismissible fade show" role="alert ">
                <strong>Sucessfull!</strong> you  have been signed up. Thanku! now  you can login.

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
?>
<?php
if (isset($_GET['passwordnotmatch']) && ($_GET['passwordnotmatch']) == "true") {
    echo '<div class=" mb-0 mt-0 alert alert-danger alert-dismissible fade show" role="alert ">
                <strong>Sorry!</strong>  The password and confirm password do not match. Please try again!

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
?>
<?php
if (isset($_GET['emptyForm']) && ($_GET['emptyForm']) == "true") {
    echo '<div class=" mb-0 mt-0 alert alert-danger alert-dismissible fade show" role="alert ">
                <strong>Sorry!</strong> You  must fill in all fields. Please try again!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
?>

<!-- check for login -->
<?php
if (isset($_GET['login']) && ($_GET['login']) == "true") {
    echo '<div class=" mb-0 mt-0 alert alert-danger alert-dismissible fade show" role="alert ">
                <strong>sucessfully Logged in !</strong> Now you can go on Dashboard page!

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
}
?>
<?php
if (isset($_GET['login']) && ($_GET['login']) == "false") {
    echo '<div class=" mb-0 mt-0 alert alert-danger alert-dismissible fade show" role="alert ">
                <strong>Sorry!</strong> you  have not been logged in. Please  try again with  the correct username , password as well as your Email Address! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
?>
<?php
if (isset($_GET['logout']) && ($_GET['logout']) == "true") {
    echo '<div class=" mb-0 mt-0 alert alert-danger alert-dismissible fade show" role="alert ">
                <strong>Sucessfully!</strong> you have  been logged out. Thanku!

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
?>

<!-- ************************************************************************** -->

<div class="post-list">
    <div class="container p-5">
        <?php
        include('actions/connect.php');
        $sqlSelect = "SELECT  * FROM posts ";
        $result = mysqli_query($conn, $sqlSelect);
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <div class="row mb-4 p-5 bg-secondary text-white rounded ">
                <div class="col-sm-2">
                    <P class="text-decoration-underline"><strong>Publish Date:</strong></P>
                    <?php echo $data["date"]; ?>
                </div>
                <div class="col-sm-3">
                    <P class="text-decoration-underline"><strong>Title:</strong></P>
                    <h4><?php echo $data["title"]; ?></h4>
                </div>
                <div class="col-sm-4">
                    <P class="text-decoration-underline"><strong>Content:</strong></P>
                    <p><?php echo $data["content"]; ?></p>
                </div>
                <div class="col-sm-3">
                    <P class="text-decoration-underline"><strong>Summary:</strong></P>
                    <p><?php echo $data["summary"]; ?></p>
                </div>
            </div>

        <?php
        }

        ?>
    </div>
</div>