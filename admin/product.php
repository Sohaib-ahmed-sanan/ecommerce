<?php include('../includes/header.inc.php') ?>


<div class="container-fluid">
  <div class="row">
    <!--side bar  -->

    <?php include('../includes/sidebar.inc.php') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php if (isset($_GET['type']) && $_GET['type'] != "") {
        $type = get_safe_value($con, $_GET['type']);
        if ($type == 'status') {
          $operation = get_safe_value($con, $_GET['operation']);
          $id = get_safe_value($con, $_GET['id']);
          if ($operation == "active") {
            $status = '1';
          } else {
            $status = '0';
          }
          $update = "UPDATE `product` SET `status` = $status WHERE `id` = $id ";
          $run = mysqli_query($con, $update);
        } else if ($type == 'delete') {
          $id = get_safe_value($con, $_GET['id']);
          $del = "DELETE FROM `product` WHERE `id` = '$id'";
          $run = mysqli_query($con, $del);
        }
      } ?>

      <h2 class="mt-3">Product Page</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <?php
            // $select = "SELECT product.*,catagory.name FROM product, catagory WHERE product.catagory_id = catagory.id ORDER BY product.id DESC";
            //$select = "SELECT * FROM `product`";
            $select = "SELECT product.*,catagory.name FROM product,catagory WHERE product.catagory_id=catagory.c_id ORDER BY product.id DESC;";
            $go = mysqli_query($con, $select);

            ?>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Catagory</th>
              <th scope="col">Name</th>
              <th scope="col">Mrp</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Image</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $i = 1;
            while ($show = mysqli_fetch_array($go)) {
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $show['name']; ?></td>
                <td><?php echo $show['product_name']; ?></td>
                <td><?php echo $show['mrp']; ?></td>
                <td><?php echo $show['price']; ?></td>
                <td><?php echo $show['qty']; ?></td>
                <td><img width="10%" src="../uploads/<?php echo $show['image']; ?>"></img></td>
                <td>
                  <?php if ($show['status'] == 1) {
                    echo "<a href='?type=status&operation=deactive&id=" . $show['id'] . "' class='btn btn-primary btn-sm'>Active</a>";
                  } else {
                    echo "<a href='?type=status&operation=active&id=" . $show['id'] . "' class='btn btn-secondary btn-sm'>Deactive</a>";
                  }

                  ?>
                </td>
                <td><?php echo "<a href='?type=delete&id=" . $show['id'] . "' name='delete' class='btn btn-danger btn-sm' onclick='return confirm(\"are you sure\")'>Delete</a>" ?>
                  <?php echo "<a href='add.php?type=edit&id=" . $show['id'] . "' class='btn btn-success btn-sm'>Edit</a>" ?>
                </td>
              </tr>
            <?php $i++;
            }
            ?>
          </tbody>
        </table>
        <a href="add_product.php" class="btn btn-sm btn-primary">Add</a>
      </div>
    </main>
  </div>
</div>

<?php include('../includes/footer.inc.php') ?>