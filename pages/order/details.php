<?php
$data = db_query("select * from thucan");
require 'db/connect.php';

if (isset($_GET['id'])) {

    $details = "CALL chitiet_hoadon('" . $_GET["id"] . "')";
    $selected = mysqli_query($con, $details);

    if (mysqli_num_rows($selected) > 0) {
        $row = mysqli_fetch_row($selected);
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
                                <h1>Thêm mới</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="?page=order&action=index" ?>Quản lý hoá đơn</a></li>
                                    <li class="breadcrumb-item active">Chi tiết hoá d</li>
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
                                        <h3 class="card-title">Chi tiết hoá đơn</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="MSNV">Mã hoá dơn</label>
                                            <input readonly type="text" id="maHD" name="maHD" class="form-control" value="<?php print_r($row[0]) ?>"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tên khách hàng</label>
                                            <input type="text" name="food_name" class="form-control" id="food" value="<?php print_r($row[1]) ?>" disabled placeholder="Nhập tên món ăn">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Địa chỉ</label>
                                            <input type="text" name="food_money" value="<?php print_r($row[2]) ?>" class="form-control" id="money" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Số điện thoại</label>
                                            <input type="text" name="food_money" value="<?php print_r($row[3]) ?>" class="form-control" id="money" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tên món ăn</label>
                                            <input type="text" name="food_money" value="<?php print_r($row[4]) ?>" class="form-control" id="money" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Số lượng</label>
                                            <input type="text" name="food_money" value="<?php print_r($row[5]) ?>" class="form-control" id="money" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Giá bán</label>
                                            <input type="text" name="food_money" value="<?php print_r($row[6]) ?>" class="form-control" id="money" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Ngày đặt hàng</label>
                                            <input type="text" name="food_money" value="<?php print_r($row[7]) ?>" class="form-control" id="money" disabled>
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