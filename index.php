<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php');

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline mb-3"></div>
                
                <div class="owl-carousel">
                    <?php
                        $trendingproducts = getAllTrending();
                        if (mysqli_num_rows($trendingproducts) > 0) 
                        {
                            foreach ($trendingproducts as $item) 
                            {
                                ?>
                                    <div class="item">
                                        <a href="product-view.php?product=<?= $item['slug'] ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" height="200px" alt="Product image" class="w-100">
                                                    <h6 class="text-center"><?= $item['name']; ?></h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About us</h4>
                <div class="underline mb-3"></div>
                
                <p>
                    Qu’il ne soit venu à l’idée de personne que le cerveau, ordinateur de notre organisme, puisse être responsable de toutes les maladies est tout de même étrange à l’ère de l’informatique
                </p>
                <p>
                    Qu’il ne soit venu à l’idée de personne que le cerveau, ordinateur de notre organisme, puisse être responsable de toutes les maladies est tout de même étrange à l’ère de l’informatique
                    <br>
                    Qu’il ne soit venu à l’idée de personne que le cerveau, ordinateur de notre organisme, puisse être responsable de toutes les maladies est tout de même étrange à l’ère de l’informatique
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">Donnie E-Shop</h4>
                <div class="underline mb-3"></div>
                <a href="" class="text-white"><i class="fa fa-angle-right me-2"></i> Home</a><br>
                <a href="" class="text-white"><i class="fa fa-angle-right me-2"></i> About Us</a><br>
                <a href="cart.php" class="text-white"><i class="fa fa-angle-right me-2"></i> mY Cart</a><br>
                <a href="collections.php" class="text-white"><i class="fa fa-angle-right me-2"></i> Our Collections</a>
            </div>
            <div class="col-md-3">
                <h4 class="text-white">Adress</h4>
                <div class="underline mb-3"></div>
                <p class="text-white">
                    DR Congo Sud-kivu, Uvira Q.Kakombe, Av.Membo No 6
                </p>
                <a href="tel: 0979599841" class="text-white"><i class="fa fa-phone me-2"></i>+243 979 599 841</a><br>
                <a href="mailto: celestinrushigiradonnie@gmail.com" class="text-white"><i class="fa fa-envelope me-2"></i>Celestinrusigira@gmail.com</a>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15952.449411203725!2d29.22044345!3d-1.6755675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2scd!4v1709639277550!5m2!1sfr!2scd" class="w-100"  height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<div class="py-2 bg-info">
    <div class="text-center">
    <p class="mb-0 text-white">All rights reserved. copyright @ <a href="www.isig.ac.cd" target="_blank" class="text-white"> Donnie Wa ronde - </a> <?= date('Y') ?></p>
</div>
</div>

<?php include('includes/footer.php'); ?>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    });
</script>