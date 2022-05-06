<?php
$data = db_query("select * from thucan");
// require 'db/connect.php';
global $TenTA;
if (isset($_POST['btn_add'])) {
    $TenTA = $_POST['food_name'];
    if (!checkMenuExits($TenTA)) {
        $insertFood = db_query("CALL them_thucan('" . $_POST["food_name"] . "', '" . $_POST["food_money"] . "')");
        if ($insertFood) {
            redirect("?page=menu&action=index");
        } else {
            $_SESSION['createFoodStatusMessage'] = "Món ăn đã tồn tại!";
            $_SESSION['createFoodStatusCode'] = "error";
        }
    } else {
        $_SESSION['createFoodStatusMessage'] = "Món ăn đã tồn tại!";
        $_SESSION['createFoodStatusCode'] = "error";
    }
}
?>

<?php get_header() ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=menu&action=index">Quản lý thực đơn</a></li>
                        <li class="breadcrumb-item active">Thêm thực đơn</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <form id="createFood" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm món ăn</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="TenLoaiHang">Tên món ăn</label>
                                <input type="text" name="food_name" class="form-control" id="food" placeholder="Nhập tên món ăn">
                            </div>
                            <div class="form-group">
                                <label for="TenLoaiHang">Đơn giá</label>
                                <input type="text" name="food_money" class="form-control" id="money" placeholder="Đơn giá">
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
</div>

<?php get_footer() ?>