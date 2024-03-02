<?php

include('functions/userfunctions.php');
include('includes/header.php');

if(isset($_GET['category']))
{

$category_slug = $_GET['category'];
$category_data = getSlugActive("categories",$category_slug);
$category = mysqli_fetch_array($category_data);
$category_id = $category['id'];
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home / 
            </a>
            <a class="text-white" href="collections.php">
                Collections / 
            </a>
            <?= $category['name']; ?> </h6>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $category['name']; ?> </h1>
                <hr>
                <div class="row">

                    <?php
                        $products = getProByCategory("$category_id");

                        if(mysqli_num_rows($products) > 0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="product-view.php?product=<?= $item['slug'] ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="Product image" class="w-100">
                                                    <h4 class="text-center"><?= $item['name']; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php

                            }
                        }
                        else{
                            echo "No data available";
                        }
                    ?>
               </div>
            </div> 
    </div>
</div>


<?php
}
else
{
    echo "Something is wrong";
}
include('includes/footer.php'); 
?>
