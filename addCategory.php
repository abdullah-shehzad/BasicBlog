<?php
require_once("./includes/connection.php");
if (isset($_POST['submit'])) {
  $name = $_POST['addcategory'];

  $sql = "INSERT INTO categories (name) VALUES ('$name')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("location:viewCategory.php");

  }
}

?>
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
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="display-4 text-center">
                Add Category
            </div>
            <div class="col-12 col-lg-8 shadow mx-auto p-5">
                <form action="" method="post">
                    <div class="form-group">
                        <form action="" method="post">
                            <label for="">Add Category</label>
                            <input type="text" class="form-control" name="addcategory">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </section>
</div>

<?php require_once './includes/footer.php' ?>