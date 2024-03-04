<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');

if (isset($_GET['t'])) {

    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);
    if (mysqli_num_rows($orderData) < 0) {
?>
        <h4>Something went wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <H4>Something went wrong</H4>
<?php
    die();
}

$Data = mysqli_fetch_array($orderData);

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home /
            </a>

            <a class="text-white" href="my-orders.php">
                My Orders /
            </a>

            <a class="text-white" href="view-order.php">
                View Orders
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-4">View Order</span>
                            <a href="my-orders.php" class="btn btn-warning float-end btn-sm"><i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $Data['name'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $Data['email'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $Data['phone'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tracking No</label>
                                            <div class="border p-1">
                                                <?= $Data['tracking_no'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Pin Code</label>
                                            <div class="border p-1">
                                                <?= $Data['pincode'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Adress</label>
                                            <div class="border p-1">
                                                <?= $Data['adress'] ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $userId = $_SESSION['auth_user']['user_id'];
                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.*
                                                    FROM orders o, order_items oi, products p WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id 
                                                    AND o.tracking_no='$tracking_no'";

                                            $order_query_run = mysqli_query($con, $order_query);
                                            if (mysqli_num_rows($order_query_run) > 0)
                                            {
                                                foreach ($order_query_run as $items) 
                                                {
                                                ?>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <img src="uploads/<?=$items['image'] ?>" width="50px" height="50px" alt="<?=$items['name'] ?>">
                                                            <?=$items['name'] ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?=$items['price'] ?>
                                                        </td>
                                                        <td class="align-middle"> 
                                                            <?=$items['orderqty'] ?>
                                                        </td>
                                                    </tr>

                                                <?php
                                                }
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                    <hr>
                                    <h5>Total Price : <span class="float-end fw-bold"><?= $Data['total_price'] ?></span></h5>
                                    <hr>

                                    <label class="fw-bold">Payment Mode</label>
                                    <div class="border p-1 mb-3">
                                        <?= $Data['payment_mode'] ?>
                                    </div>
                                    <label class="fw-bold">Status</label>
                                    <div class="border p-1 mb-3">
                                        <?php 
                                        if($Data['status'] == 0)
                                        {
                                            echo"Under Process";
                                        }
                                        else if($Data['status'] == 1)
                                        {
                                            echo"Completed";
                                        }
                                        else if($Data['status'] == 2)
                                        {
                                            echo"Cancelled";
                                        }
                                        ?>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>