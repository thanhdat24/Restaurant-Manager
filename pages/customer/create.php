<?php
$data = db_query("select * from thucan");
require 'db/connect.php';

if (isset($_POST['btn_add'])) {
        $insertCustomer =  db_query("CALL them_kh('" . $_POST["kh_name"] . "', '" . $_POST["kh_address"] . "', '" . $_POST["kh_phone"] . "' )");
        
        if ($insertCustomer) {
            redirect("?page=customer&action=index");
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
                        <li class="breadcrumb-item"><a href="?page=customer&action=index" ?>Quản lý khách hàng</a></li>
                        <li class="breadcrumb-item active">Thêm thông tin khách hàng</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form id="createCustomer" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm thông tin khách hàng</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tên khách hàng</label>
                                <input type="text" name="kh_name" class="form-control" id="kh_name" placeholder="Nhập tên khách hàng">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="kh_address" class="form-control" id="kh_address" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="kh_phone" class="form-control" id="kh_phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class=" row">
                                <div class="col-12">
                                    <a class="btn btn-secondary" href="?page=customer&action=index">
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