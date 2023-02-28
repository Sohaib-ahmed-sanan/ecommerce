<?php include('../includes/header.inc.php');?>
<div class="container-fluid">
    <div class="row">
        <!--side bar  -->

        <?php include('../includes/sidebar.inc.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php
            if (isset($_GET['type']) && $_GET['type'] != "") {
                $type = get_safe_value($con, $_GET['type']);
                $id = get_safe_value($con, $_GET['id']);
                $del = "DELETE FROM `contact` WHERE `id` = '$id'";
                $run = mysqli_query($con, $del);
            }
            ?>
            <h2>Contact Page</h2>
            <div class="table-responsive">
                <p>Here is the list of queries from user's</p>
                <table class="table table-striped table-sm">
                    <thead>
                        <?php
                        $select = "SELECT * FROM `contact`";
                        $go = mysqli_query($con, $select);
                        ?>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $msg = "";
                        $i = 1;
                        $count = mysqli_num_rows($go);
                        if ($count > 0) {
                            while ($show = mysqli_fetch_assoc($go)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $show['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $show['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $show['mobile']; ?>
                                    </td>
                                    <td>
                                        <?php echo $show['comment']; ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href='?type=delete&id=" . $show['id'] . "' name='delete' class='btn btn-danger btn-sm' onclick='return confirm(\"Are You Sure You Want To Delete\")'>Delete</a>" ?>
                                    </td>
                                </tr>
                                <?php $i++;
                            }
                        } else {
                            $msg = "No User Queries Found";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="text-center mt-5">
                    <h5 class="text-secondary">
                     <?php echo $msg ?>
                    </h5>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include('../includes/footer.inc.php') ?>