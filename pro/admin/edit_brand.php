<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['edit_brand'])){
    $get_id = $_GET['edit_brand'];
    $get_brand = "select * from brands where brand_id='$get_id'";
    $run_brand = mysqli_query($con, $get_brand);
    $row_brand = mysqli_fetch_array($run_brand);
    $brand_id = $row_brand['brand_id'];
    $brand_title = $row_brand['brand_title'];
}
if(isset($_POST['update_brand'])){
    //getting text data from the fields
    $brand_title = $_POST['brand_title'];

    $update_brand = "update brands set brand_title = '$brand_title'
                                        where brand_id='$brand_id'";

    $update_brand = mysqli_query($con, $update_brand);
    if($update_brand){
        header("location: index.php?view_brands");
    }
}
?>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Edit & Update Brand </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_title">Category Title</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="brand_title" name="brand_title" placeholder="Title"
                           value="<?php echo $brand_title;?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="update_brand" name="update_brand"
                           value="Update Brand Now">
                </div>
            </div>
        </form>
    </div>
</div>
