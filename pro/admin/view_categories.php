
<div class="row">
    <div class="col-sm-12">
        <h1>Categories</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <!--<th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>-->
            </tr>
            </thead>
            <tbody>
            <?php
            $get_cat = "select * from categories";
            $run_cat = mysqli_query($con,$get_cat);
            $count_cat = mysqli_num_rows($run_cat);
            if($count_cat==0){
                echo "<h2> No Categories found in selected criteria </h2>";
            }
            else {
                $i = 0;
                while ($row_cat = mysqli_fetch_array($run_cat)) {
                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $cat_title; ?></td>
                        <td><a href="index.php?edit_cat=<?php echo $cat_id?>" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="index.php?del_cat=<?php echo $cat_id?>" class="btn btn-danger">
                                <i class="fa fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>