<?php include('../template/header.php'); ?>

<?php
$id = $_GET['id'];
if ($id) {
    include('../connect.php');
    $sql = "SELECT * FROM posts WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
} else {
    echo 'No post found';
}
?>
<div class="create-form w-100 mx-auto p-4" style="max-width: 700px;">

    <form action="../_handlePost.php" method="post">
        <?php
        while ($data = mysqli_fetch_array($result)) {

        ?>
            <div class="form-field mb-4">
                <input type="text" name="title" class="form-control " placeholder="Title" value=" <?php echo $data['title']; ?>">

            </div>
            <div class="form-field mb-4">
                <textarea name="summary" class="form-control" id="" rows="8" cols="20" placeholder="Enter summary"><?php echo $data['summary']; ?></textarea>
            </div>
            <div class=" form-field mb-4">
                <textarea class="form-control" name="content" id="" rows="8" cols="20" placeholder="Enter post content"><?php echo $data['content']; ?></textarea>

            </div>
            <input type="hidden" name="date" value="<?php echo date("Y/M/D"); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-field mb-4 mt-4">
                <button class="btn btn-primary" type="submit" name="update" value="update">Update</button>
            </div>
        <?php
        }
        ?>
    </form>
</div>
<?php include('../template/footer.php'); ?>