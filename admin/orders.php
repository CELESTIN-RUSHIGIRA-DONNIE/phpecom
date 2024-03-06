<?php
include('../middleware/adminMiddleware.php');
include('include/header.php');


?> 

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h5>Orders</h5>
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>DATE</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $orders = geAllOrders();
                                if(mysqli_num_rows($orders) > 0)
                                {
                                    foreach($orders as $items)
                                    {
                                        ?>
                                            <tr>
                                                <td><?= $items['id'] ?></td>
                                                <td><?= $items['name'] ?></td>
                                                <td><?= $items['tracking_no'] ?></td>
                                                <td><?= $items['total_price'] ?></td>
                                                <td><?= $items['created_at'] ?></td>
                                                <td class="text-center">
                                                    <a href="view-order.php?t=<?= $items['tracking_no'] ?>" class="btn btn-primary btn-sm">View details</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <tr>
                                            <td colspan="5">No orders founds</td>
                                        </tr>

                                    <?php

                                }
                            ?>
                        </tbody>
                    </table>
        
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>