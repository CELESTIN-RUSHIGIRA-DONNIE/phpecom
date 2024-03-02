<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home /
            </a>

            <a class="text-white" href="cart.php">
                Cart /
            </a>

            <a class="text-white" href="checkout.php">
                Checkout
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <H5>Basic Details</H5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" required placeholder="enter your name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" required placeholder="enter your email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" required placeholder="enter your phone number" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input type="text" name="pincode" required placeholder="enter your code pin" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Adress</label>
                                    <textarea name="adress" required placeholder="enter your Adress" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <h5>Oder Details</h5>
                            <hr>
                            <?php

                            $items = getCartItems();
                            $totalPrice = 0;
                            foreach ($items as $citem) 
                            {
                                ?>
                                <div class="card shadow-sm mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px">
                                        </div>
                                        <div class="col-md-5">
                                            <h6><?= $citem['name'] ?></h6>
                                        </div>

                                        <div class="col-md-3">
                                            <h6><?= $citem['selling_price'] ?></h6>
                                        </div>

                                        <div class="col-md-2">
                                            <h6>x <?= $citem['prod_qty'] ?></h6>
                                        </div>

                                    </div>
                                </div>

                                <?php
                                // echo $citem['name'];
                                $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                            }
                            ?>
                            <hr>
                            <h5>Total Price : <span class="float-end"><?= $totalPrice ?></span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" class="btn btn-primary w-100" name="placeOrderBtn">Confirm and Place | COD</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>