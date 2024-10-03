<?php include("template/header.php"); ?>
<div class="posts-list w-100 p-5">
    <table class="table tabled-bordered " id="myTable">
        <thead>
            <tr>
                <th>Publication data</th>
                <th>Title</th>
                <th>Summary</th>
                <th>content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['login']) && ($_GET['login']) == "true") {
                echo '<div class=" mb-0 mt-0 alert alert-danger alert-dismissible fade show" role="alert ">
                        <strong>Welcome on Dashboard Page!</strong> 

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>

            <?php
            include("./connect.php");
            $sqlselet = "SELECT * from posts";
            $result = mysqli_query($conn, $sqlselet);
            while ($data =  mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $data['date']; ?></td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['summary']; ?></td>
                    <td><?php echo $data['content']; ?></td>
                    <td>
                        <a class="btn btn-info" href="./admin/view.php?id=<?php echo $data['id']; ?>">View</a>
                        <a class="btn btn-warning" href="./admin/edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="./admin/delete.php?id=<?php echo $data['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>
<?php include("template/footer.php"); ?>