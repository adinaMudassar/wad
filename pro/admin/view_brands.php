
<div class="row">
    <div class="col-sm-12">
        <h1>Brands</h1>
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
            $get_brand = "select * from brands";
            $run_brand = mysqli_query($con,$get_brand);
            $count_brand = mysqli_num_rows($run_brand);
            if($count_brand==0){
                echo "<h2> No Brands found in selected criteria </h2>";
            }
            else {
                $i = 0;
                while ($row_brand = mysqli_fetch_array($run_brand)) {
                    $brand_id = $row_brand['brand_id'];
                    $brand_title = $row_brand['brand_title'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $brand_title; ?></td>
                        <td><a href="index.php?edit_brand=<?php echo $brand_id?>" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="index.php?del_brand=<?php echo $brand_id?>" class="btn btn-danger">
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