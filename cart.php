<?php
include('functions/userfunctions.php');
include('includes/header.php');

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home /
            </a>

            <a class="text-white" href="cart.php">
                Cart
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">

                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h6>Products</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Remove</h6>
                        </div>
                    </div>

                    <?php

                    $items = getCartItems();
                    foreach ($items as $citem) {
                    ?>
                        <div class="card shadow-sm mb-3">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px">
                                </div>
                                <div class="col-md-3">
                                    <h6><?= $citem['name'] ?></h6>
                                </div>

                                <div class="col-md-3">
                                    <h5>RS: <?= $citem['selling_price'] ?></h5>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group mb-3" style="width:130px">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" class="form-control bg-white text-center input-qty" value="<?= $citem['prod_qty'] ?>" disabled>
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>

                    <?php
                        // echo $citem['name'];
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>