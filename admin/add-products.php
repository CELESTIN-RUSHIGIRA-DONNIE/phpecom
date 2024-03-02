<?php 

include('../middleware/adminMiddleware.php');
include('include/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0"  for="">Select Category</label>
                                <select class="form-select" name="category_id">
                                    <option selected>select category</option>
                                    <?php
                                        $categories = getAll("categories");
                                        if(mysqli_num_rows($categories) > 0)
                                        {
                                            foreach($categories as $item)
                                            {
                                                ?>
                                                    <option value="<?= $item['id']; ?>"><?=  $item['name']; ?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "Not category availlable";
                                        }
                                    ?>                                   
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0"  for="">Name</label>
                                <input type="text" required name="name" placeholder="Enter your category name" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0"  for="">Slug</label>
                                <input type="text" required name="slug"  placeholder="Enter slug"  class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Small escription</label>
                                <textarea rows="3" required name="small_description" placeholder="Enter the small description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0"  for="">Description</label>
                                <textarea rows="3" required name="description" placeholder="Enter Description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0"  for="">Originale price</label>
                                <input type="text" required name="original_price" placeholder="Enter the original price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0"  for="">Selling price</label>
                                <input type="text" name="selling_price"  placeholder="Enter selling price"  class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Upload Image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="mb-0" required for="">Quantity</label>
                                    <input type="number" required name="qty"  placeholder="Enter selling price"  class="form-control mb-2">
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-0" for="">status</label><br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0" for="">Trending</label><br>
                                    <input type="checkbox" name="popular">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Meta Title</label>
                                <input type="text" required name="meta_title" placeholder="Enter meta title" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Meta Keywords</label>
                                <textarea rows="3" required name="meta_keywords"  placeholder="Enter meta keywordxs"  class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label  class="mb-0" for="">Meta Description</label>
                                <textarea rows="3" required name="meta_description"  placeholder="Enter meta description"  class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>