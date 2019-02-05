
<div class="row">
    <div class="col-sm-12">
        <h1>Customers</h1>
        <table class="table table-striped">
            <thead>
            <tr>

                <th scope="col">#</th>
                <th scope="col">cust_ip</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">Country</th>
                <th scope="col">City</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $get_customer = "select * from customers";
            $run_customer = mysqli_query($con,$get_customer);
            $count_customer = mysqli_num_rows($run_customer);
            if($count_customer==0){
                echo "<h2> No Customers found in selected criteria </h2>";
            }
            else {
                $i = 0;
                while ($row_customer = mysqli_fetch_array($run_customer)) {
                    $customer_id = $row_customer['cust_id'];
                    $customer_ip = $row_customer['cust_ip'];
                    $customer_name = $row_customer['cust_name'];
                    $customer_email = $row_customer['cust_email'];
                    $customer_pass = $row_customer['cust_pass'];
                    $customer_country = $row_customer['cust_country'];
                    $customer_city = $row_customer['cust_city'];
                    $customer_contact = $row_customer['cust_contact'];
                    $customer_address = $row_customer['cust_address'];
                    $customer_image = $row_customer['cust_image'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $customer_ip; ?></td>

                        <td><?php echo $customer_name; ?></td>

                        <td><?php echo $customer_email; ?></td>

                        <td><?php echo $customer_pass; ?></td>

                        <td><?php echo $customer_country; ?></td>

                        <td><?php echo $customer_city; ?></td>

                        <td><?php echo $customer_contact; ?></td>

                        <td><?php echo $customer_address; ?></td>

                        <td><img class="img-thumbnail" src='product_images/<?php echo $customer_image;?>' width='80' height='80'></td>
                            <a href="index.php?del_customer=<?php echo $customer_id?>" class="btn btn-danger">
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