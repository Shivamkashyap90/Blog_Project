<?php include('template/header.php'); ?>

<div class="create-form w-100 mx-auto p-4" style="max-width: 700px;">

    <form action="_handlePost.php" method="post">
        <div class="form-field mb-4">
            <input type="text" class="form-control " name="title" id="" placeholder="Title">

        </div>
        <div class="form-field mb-4">
            <textarea name="summary" class="form-control" name="summary" id="" rows="8" cols="20" placeholder="Enter summary"></textarea>
        </div>
        <div class="form-field mb-4">
            <textarea class="form-control" name="content" id="" rows="8" cols="20" placeholder="Enter post content"></textarea>

        </div>
        <input type="hidden" name="date" value="<?php echo date("Y/M/D") ?>">
        <div class="form-field mb-4">
            <button class="btn btn-primary" type="submit" name="submit" value="submit">Publish</button>
        </div>
    </form>
</div>


<?php include('template/footer.php'); ?>