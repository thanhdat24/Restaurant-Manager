<?php
$data = db_query("select * from thucan");
require 'db/connect.php';

if (isset($_POST['btn_add'])) {
    $updateCustomer =  db_query("CALL edit_kh('" . $_GET["id"] . "', '" . $_POST["nv_name"] . "', '" . $_POST["nv_address"] . "', '" . $_POST["nv_phone"] . "' )");
    if ($updateCustomer) {
        redirect("?page=customer&action=index");
    }
}

if (isset($_GET['id'])) {

    $update = "CALL show_kh_by_id('" . $_GET["id"] . "')";
    $selected = mysqli_query($con, $update);

    if (mysqli_num_rows($selected) > 0) {
        $row = mysqli_fetch_assoc($selected);
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
                    <h1>Cập nhật</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=customer&action=index" ?>Quản lý khách hàng</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa khách hàng</li>
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
                            <h3 class="card-title">Cập nhật thông tin khách hàng</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tên khách hàng</label>
                                <input type="text" name="nv_name" class="form-control" id="name" placeholder="Nhập tên khách hàng" value="<?php print_r($row['tenKH']) ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="nv_address" class="form-control" id="address" placeholder="Nhập địa chỉ" value="<?php print_r($row['diaChi']) ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="nv_phone" class="form-control" id="phone" placeholder="Nhập số điện thoại" value="<?php print_r($row['sdt']) ?>">
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