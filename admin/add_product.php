<?php require('../includes/header.inc.php'); ?>
<div class="container-fluid">
    <div class="row">
        <!--side bar  -->

        <?php include('../includes/sidebar.inc.php') ?>

        <?php
         $catagory_select = "SELECT * FROM `catagory`";
         $triger = mysqli_query($con, $catagory_select);

        if (isset($_POST['add'])) {
            $product = get_safe_value($con, $_POST['Product']);
            $mrp = get_safe_value($con, $_POST['mrp']);
            $price = get_safe_value($con, $_POST['price']);
            $qty = get_safe_value($con, $_POST['qty']);
            $short_des = get_safe_value($con, $_POST['short_des']);
            $full_des = get_safe_value($con, $_POST['full_des']);
            $meta_title = get_safe_value($con, $_POST['meta_title']);
            $meta_des = get_safe_value($con, $_POST['meta_des']);
            $keyword = get_safe_value($con, $_POST['keyword']);
            $status = get_safe_value($con, $_POST['status']);
            $catagory =  get_safe_value($con, $_POST['catagory']);
            $image1 = $_FILES['image1']['name'];
            $image2 = $_FILES['image2']['name'];
            $path = "../uploads/" . $image1;
            $tmp = $_FILES['image1']['tmp_name'];
            $size = $_FILES['image1']['size'];
            $path = "../uploads/" . $image2;
            $tmp = $_FILES['image2']['tmp_name'];
            $size = $_FILES['image2']['size'];

            if ($size <= 50000) {
                move_uploaded_file($tmp, $path);
                $query = "INSERT INTO `product`(`catagory_id`, `product_name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `ful_des`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES ($catagory,'$product',$mrp,$price,$qty,'$image1','$short_des','$full_des','$meta_title','$meta_des','$keyword',$status)";
                $run = mysqli_query($con, $query);
            } else {
                echo "<script>alert('bht bara ha')</script>";
                header("location:add.php");
            }
        }
       
        ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container mt-5">
                <h3>Add Product</h3>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mt-4">
                        <label>Product name</label>
                        <input type="text" required placeholder="Product name" class="form-control " name="Product" style="width: 50%;">
                    </div>
                    <div class="mt-4">
                        <label>Product MRP</label>
                        <input type="text" required placeholder="Product MRP" class="form-control " name="mrp" style="width: 50%;">
                    </div>
                    <div class="mt-4">
                        <label>Product Price</label>
                        <input type="text" required placeholder="Product Price" class="form-control " name="price" style="width: 50%;">
                    </div>

                    <div class="mt-4">
                        <label>Product Quantity</label>
                        <input type="text" required placeholder="Product Quantity" class="form-control " name="qty" style="width: 50%;">
                    </div>

                    <div class="mt-4">
                        <label>Product Short Description</label>
                        <input type="text" required placeholder="Product Short Description" class="form-control " name="short_des" style="width: 50%;">
                    </div>
                    <div class="mt-4">
                        <label>Product Full Description</label>
                        <input type="text" required placeholder="Product Full Description" class="form-control " name="full_des" style="width: 50%;">
                    </div>
                    <div class="mt-4">
                        <label>Product Meta Title</label>
                        <input type="text" required placeholder="Product Meta Title" class="form-control " name="meta_title" style="width: 50%;">
                    </div>
                    <div class="mt-4">
                        <label>Product Meta Description</label>
                        <input type="text" required placeholder="Product  Meta Description" class="form-control " name="meta_des" style="width: 50%;">
                    </div>
                    <div class="mt-4">
                        <label>Product Keywords</label>
                        <input type="text" required placeholder="Product Keyword" class="form-control " name="keyword" style="width: 50%;">
                    </div>

                    <div class="mt-4"> 
                        <label>Select Catagory</label>
                        <select class="form-control" name="catagory" style="width: 50%;">
                            <?php while ($show = mysqli_fetch_array($triger)) { ?>
                                <option value="<?php echo $show['c_id'] ?>"> <?php echo $show['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mt-4">
                        <p>Select Status</p>
                        <div class="form-check">
                            <input class="form-check-input" required value="1" type="radio" name="status" id="status">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" required value="0" type="radio" name="status" id="status">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Deactive
                            </label>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label>Product Image-1</label>
                        <input type="file" required placeholder="Product name" " class=" form-control " name=" image1" style="width: 50%;">
                    </div>
                    <div class="mt-2">
                        <label>Product Image-2</label>
                        <input type="file" required placeholder="Product name" " class=" form-control " name=" image2" style="width: 50%;">
                    </div>

                    <div>
                        <button class="btn btn-success mt-4" name="add">
                            Add Product
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?php include('../includes/footer.inc.php') ?>