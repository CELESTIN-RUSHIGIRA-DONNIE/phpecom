<?php 

include('../middleware/adminMiddleware.php');
include('include/header.php');
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h5> Categories</h5>
                </div>
                <div class="card-body" id="categories_table">
                 <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $category = getAll("categories");
                            if(mysqli_num_rows($category)> 0)
                            {
                                foreach($category as $item)
                                {
                                ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                        </td>
                                        <td><?= $item['status']=='0'? "Visible":"Hidden"; ?></td>
                                        <td>
                                            <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm delete_category_btn" value="<?= $item['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }               
                            else{
                                echo "records found";
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