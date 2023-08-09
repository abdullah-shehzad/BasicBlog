<?php require_once './includes/connection.php' ?>
<?php
$result = mysqli_query($conn, "SELECT * FROM categories");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
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
                        <li class="breadcrumb-item active">View Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12 col-lg-6 mx-auto p-5">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($categories) {
                            $count = 1;
                            foreach ($categories as $category) {
                                ?>

                                <tr>
                                    <th scope="row"><?php echo $count ?></th>
                                    <td><?php echo $category['name'] ?></td>
                                    <td><a href="deleteCategory.php?id=<?php echo $category['id'] ?>" class="fa fa-trash text-danger" ></a></td>
                                </tr>
                                <?php
                                $count++;
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php require_once './includes/footer.php' ?>