<?php
    $data = db_query("select * from thucan");
    require 'db/connect.php';

    if(isset($_GET['id'])){

        $details = "CALL chitiet_hoadon('".$_GET["id"]."')";
        $selected = mysqli_query($con, $details);

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
                                <h1>Chi Tiết Hóa Đơn</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="">Quản lý hóa đơn</a></li>
                                    <li class="breadcrumb-item active">Chi tiết hóa đơn</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">
                                <form method="POST" name="add_form" >
                                    <div class="form-group">
                                        <label for="">Tên khách hàng</label>
                                        <input type="text" name="food_name" class="form-control" id="food" value="<?php print_r($row[1])?>" disabled  placeholder="Nhập tên món ăn">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Địa chỉ</label>
                                        <input type="text" name="food_money"  value="<?php print_r($row[2])?>" class="form-control" id="money" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số điện thoại</label>
                                        <input type="text" name="food_money"  value="<?php print_r($row[3])?>" class="form-control" id="money" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên món ăn</label>
                                        <input type="text" name="food_money"  value="<?php print_r($row[4])?>" class="form-control" id="money" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="text" name="food_money"  value="<?php print_r($row[5])?>" class="form-control" id="money" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Giá bán</label>
                                        <input type="text" name="food_money"  value="<?php print_r($row[6])?>" class="form-control" id="money" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ngày đặt hàng</label>
                                        <input type="text" name="food_money"  value="<?php print_r($row[7])?>" class="form-control" id="money" disabled>
                                    </div>
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






