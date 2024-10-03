<?php include('../template/header.php'); ?>
<div class="post w-100 bg-light p-5">
    <?php
    $id =  $_GET['id'];
    if ($id) {
        include('../connect.php');
        $sql = "SELECT * FROM posts WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        while ($data  = mysqli_fetch_assoc($result)) {
    ?>
            <h1><?php echo $data['title']; ?></h1>
            <p><?php echo $data['date']; ?></p>
            <p><?php echo $data['content']; ?></p>

    <?php
        }
    } else {
        echo "No post found";
    }
    ?>
</div>
<?php include('../template/footer.php'); ?>