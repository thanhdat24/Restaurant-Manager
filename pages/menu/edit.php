<?php
$data = db_query("select * from thucan");
require 'db/connect.php';

if (isset($_POST['btn_add'])) {
    $updateFood = "CALL edit_thucan('" . $_POST["food_name"] . "', '" . $_POST["food_money"] . "', '" . $_GET["id"] . "' )";
    if (mysqli_query($con, $updateFood)) {
        redirect("?page=menu&action=index");
    }
}

if (isset($_GET['id'])) {

    $update = "CALL show_thucan_id('" . $_GET["id"] . "')";
    $selected = mysqli_query($con, $update);

    if (mysqli_num_rows($selected) > 0) {
        $row = mysqli_fetch_assoc($selected);
    }

    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";
}

?>
            <?php get_header() ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Cập nhật</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="?page=menu&action=index" ?>Quản lý thực đơn</a></li>
                                    <li class="breadcrumb-item active">Chỉnh sửa món ăn</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Cập nhật thông tin món ăn</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="maTA">Tên món ăn</label>
                                            <input type="text" name="food_name" class="form-control" id="food" value="<?php print_r($row['TenTA']) ?>" placeholder="Nhập tên món ăn">
                                        </div>
                                        <div class="form-group">
                                            <label for="donGia">Đơn giá</label>
                                            <input type="text" name="food_money" value="<?php currency_format(print_r($row['Dongia'])) ?>" class="form-control" id="money" placeholder="Đơn giá">
                                        </div>

                                        <div class=" row">
                                            <div class="col-12">
                                                <a class="btn btn-secondary" href="?page=menu&action=index">
                                                    Hủy
                                                </a>
                                                <button name="btn_add" type="submit" class="btn btn-success float-right">Lưu</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                    </form>
                </section>
                <!-- /.content -->
            </div>

            <?php get_footer() ?>