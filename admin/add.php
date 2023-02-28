<?php require('../includes/header.inc.php');?>
<div class="container-fluid">
    <div class="row">
        <!--side bar  -->

        <?php include('../includes/sidebar.inc.php') ?>

        <?php
        $btn_txt = "Add catagory";
        $c_status = "";
        $catagory = "";
        if (isset($_GET['type']) && $_GET['type'] != "") {
            $type = get_safe_value($con, $_GET['type']);
            $id = get_safe_value($con, $_GET['id']);
            $select = "SELECT * FROM `catagory` WHERE `id`='$id'";
            $go = mysqli_query($con, $select);
            $show = mysqli_fetch_assoc($go);
            $catagory =  $show['name'];
            $c_status = $show['status'];
            $btn_txt = "Edit Catagory";
        } else {
            if (isset($_POST['add'])) {
                $btn_txt = "Add Catagory";
                $name = $_POST['catagory'];
                $status = $_POST['status'];
                $query = "INSERT INTO `catagory`(`name`, `status`) VALUES ('$name','$status')";
                $insert = insert($con, $query);
                $catagory = "";
                if ($insert) {
                    echo '<script>window.location.href="catagories.php"</script>';
                    die();
                }
            }
        }
        ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container mt-5">
                <h3><?php echo $btn_txt ?></h3>
                <form action="" method="post">
                    <div>
                        <label>Catagory name</label>
                        <input type="text" required placeholder="Catagory name" value="<?php echo $catagory ?>" class="form-control " name="catagory" style="width: 50%;">
                    </div>
                    <div class="mt-2">
                        <div class="form-check">
                            <input class="form-check-input" required value="1" type="radio" name="status" <?php echo $c_status == "1" ? "checked" : ""; ?> id="status">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" required value="0" <?php echo $c_status == "0" ? "checked" : ""; ?> type="radio" name="status" id="status">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Deactive
                            </label>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success mt-4" name="add">
                            <?php echo $btn_txt ?>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?php include('../includes/footer.inc.php') ?>