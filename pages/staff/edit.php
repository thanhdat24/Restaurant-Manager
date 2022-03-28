<?php
$data = db_query("select * from thucan");
require 'db/connect.php';

if (isset($_POST['btn_add'])) {

    $insertStaff = "CALL edit_nv('".$_GET["id"]."', '" . $_POST["nv_name"] . "', '" . $_POST["nv_gender"] . "', '" . $_POST["nv_birth"] . "', '" . $_POST["nv_work"] . "', '" . $_POST["nv_address"] . "', '" . $_POST["nv_role"] . "', '" . $_POST["nv_phone"] . "', '" . $_POST["nv_pay"] . "' )";
    if (mysqli_query($con, $insertStaff)) {
        redirect("?page=staff&action=index");
    }
}

if(isset($_GET['id'])){

    $update = "CALL show_nhanvien_by_id('".$_GET["id"]."')";
    $selected = mysqli_query($con, $update);

    if(mysqli_num_rows($selected) > 0){
        $row = mysqli_fetch_row($selected);
    }

    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Menu</title>

    <!-- <link rel="icon" href="./public/img/icon.png"> -->
    <link rel="stylesheet" href="./public/css/my-style.css">
    <link rel="stylesheet" href="./public/css/adminpage.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="./public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <header>
        <div class="wrapper">
            <?php get_sidebar() ?>
            <?php get_header() ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Sửa nhân viên</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="">Quản lý nhân viên</a></li>
                                    <li class="breadcrumb-item active">Sửa nhân viên</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">
                                <form method="POST" name="add_form">
                                    <div class="form-group">
                                        <label for="name">Tên nhân viên</label>
                                        <input type="text" name="nv_name" class="form-control" id="name" placeholder="Nhập tên nhân viên" value="<?php print_r($row[1]) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Giới tính</label>
                                        <input type="text" name="nv_gender" class="form-control" id="gender" placeholder="Nhập giới tính" value="<?php print_r($row[2]) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="birth">Ngày sinh</label>
                                        <input type="date" name="nv_birth" class="form-control" id="birth" placeholder="Nhập ngày sinh YYYY-MM-DD" value="<?php print_r($row[3]) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="work">Ngày làm việc</label>
                                        <input type="date" name="nv_work" class="form-control" id="work" placeholder="Nhập ngày làm việc YYYY-MM-DD" value="<?php print_r($row[4]) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Địa chỉ</label>
                                        <input type="text" name="nv_address" class="form-control" id="address" placeholder="Nhập ngày địa chỉ" value="<?php print_r($row[5]) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Chức vụ</label>
                                        <input type="text" name="nv_role" class="form-control" id="role" placeholder="Nhập Chức vụ" value="<?php print_r($row[6]) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" name="nv_phone" class="form-control" id="phone" placeholder="Nhập số điện thoại" value="<?php print_r($row[7]) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="pay">Lương</label>
                                        <input type="text" name="nv_pay" class="form-control" id="pay" placeholder="Nhập số lương" value="<?php print_r($row[8]) ?>">
                                    </div>
                                    <button type="submit" name="btn_add" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
            </div>

            <?php get_footer() ?>

        </div>
    </header>

    <!-- My script -->
    <script src="./public/js/validate.js"></script>
    <!-- jQuery -->
    <script src="./public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="./public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="./public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="./public/plugins/jszip/jszip.min.js"></script>
    <script src="./public/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="./public/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="./public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="./public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="./public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./public/js/adminlte.min.js"></script>

    <script>
        $(function() {
            $("#main-table").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#main-table_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#order-table").DataTable({
                "order": [
                    [0, "desc"]
                ],
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#order-table_wrapper .col-md-6:eq(0)');
        });
    </script>
