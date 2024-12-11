<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<!-- head - start -->
<?php include('head.php') ?>
<!-- head - end -->

<body>
    <div class="wrapper">

        <!-- nav-start -->
        <?php include("navbar.php"); ?>
        <!-- nav-end -->

        <!-- sider -start -->
        <?php include("sidebar.php"); ?>
        <!-- side bar end -->


        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">

                    <h1>Add Logo</h1>
                    <form action="" method="post" class="form-control mt-3 pt-4 ps-3 pe-3" enctype="multipart/form-data">
                        <!-- logo Name Field -->
                        <input type="text" placeholder="Logo Title" name="name" class="form-control mt-3">

                        <input type="text" placeholder="Alt Title" name="alt" class="form-control mt-3">
                 

                        <!-- Image Upload Field -->
                        <input type="file" name="image" class="form-control mt-3">
                        <div class="">
                            <img src="" alt="img" width="50px" height="50px">
                        </div>

                        <!-- Submit Button -->
                        <button class="btn btn-success mt-3" type="submit" name="submit">Add</button>
                    </form>

                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>
    </div>
    <?php include("footer-links.php"); ?>

</body>

</html>
<?php

include("conn.php");

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pd_url = mysqli_real_escape_string($conn, $_POST['pd_url']);
    $pd_desc = mysqli_real_escape_string($conn, $_POST['pd_desc']);

    // Handle file upload
    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $folder = "product-images/" . $image;


    if (move_uploaded_file($temp_name, $folder)) {

        $sql = "INSERT INTO `products` (`name`, `pd_url`, `image`, `pd_desc`) 
                VALUES ('$name', '$pd_url', '$image', '$pd_desc')";

        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload the image.";
    }
}

?>