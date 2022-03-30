<?php
require 'db/connect.php';
$maxSalary = "CALL luongcaonhat()";
$resultMaxSalary = mysqli_query($con, $maxSalary);

if (mysqli_num_rows($resultMaxSalary) > 0) {
    $dataMax = mysqli_fetch_assoc($resultMaxSalary);
}

?>

<?php
require 'db/connect.php';
$minSalary = "CALL luongthapnhat()";
$resultMinSalary = mysqli_query($con, $minSalary);

if (mysqli_num_rows($resultMinSalary) > 0) {
    $dataMin = mysqli_fetch_assoc($resultMinSalary);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dat</title>

    <link rel="icon" href="./public/img/icon.svg">
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
                                <h1>Thống kê lương nhân viên</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="?page=statistic&action=order">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Lương nhân viên</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Lương cao nhất</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã nhân viên</th>
                                                    <th>Tên nhân viên</th>
                                                    <th>Lương</th>
                                                    <th>Chức vụ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $dataMax['maNV'] ?></td>
                                                    <td><?= $dataMax['tenNV'] ?></td>
                                                    <td><?= currency_format($dataMax['luong'])  ?></td>
                                                    <td><?= $dataMax['Chucvu'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Lương thấp nhất</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã nhân viên</th>
                                                    <th>Tên nhân viên</th>
                                                    <th>Lương</th>
                                                    <th>Chức vụ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $dataMin['maNV'] ?></td>
                                                    <td><?= $dataMin['tenNV'] ?></td>
                                                    <td><?= currency_format($dataMin['luong'])  ?></td>
                                                    <td><?= $dataMin['Chucvu'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
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