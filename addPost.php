<?php require_once './includes/connection.php' ?>
<?php
$categorySql = mysqli_query($conn, "SELECT * FROM categories");
if (mysqli_num_rows($categorySql) > 0) {
    while ($row = mysqli_fetch_assoc($categorySql)) {
        $categories[] = $row;
    }
}
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $detail = $_POST['detail'];
    $image = $_FILES['image']['name'];
    $ext_arr = explode('.' , $image);
    $ext = end($ext_arr);
    $newImageName = time() . rand(1 , 1000) . "." . $ext;
    $tmp_image = $_FILES['image']['tmp_name'];
    if(move_uploaded_file($tmp_image, './images/' . $newImageName )){
        $result = mysqli_query($conn, "INSERT INTO posts(title, category_id, image, detail)VALUES('$title', '$category' , '$newImageName', '$detail')");
    }

}
?>
<!---->
<?php require_once './includes/header.php' ?>
<?php require_once './includes/navbar.php' ?>
<?php require_once './includes/sidebar.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="display-4 text-center">
                Add Post
            </div>
            <div class="col-12 col-lg-8 shadow mx-auto p-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category" id="">
                            <?php
                            if ($categories) {
                                foreach ($categories as $category) {
                                    ?>
                                    <option value="<?php echo $category['id'] ?>" ><?php echo $category['name'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                    </div>
                    <div class="form-group">
                      <label for="">Detail</label>
                      <textarea class="form-control" name="detail" id="" rows="3"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </section>
</div>

<?php require_once './includes/footer.php' ?>