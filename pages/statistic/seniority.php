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
                <?php if (isset($_SESSION['statisticSeniority']) && isset($_SESSION['staff'])) { ?>
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-8">
                                    <h1>Thâm niên làm việc của nhân viên <u><?= $_SESSION['staff']['tenNV'] ?></u> là: <b><?= $_SESSION['statisticSeniority']['0'] ?> ngày</b></h1>
                                </div>
                                <div class="col-sm-4">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="?page=statistic&action=order">Trang chủ</a></li>
                                        <li class="breadcrumb-item active">Thâm niên làm việc</li>
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
                                            <h3 class="card-title">Thông tin nhân viên</h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="main-table" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Mã nhân viên</th>
                                                        <th>Tên nhân viên</th>
                                                        <th>Gới tính</th>
                                                        <th>Ngày sinh</th>
                                                        <th>Ngày làm việc</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Chức vụ</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Lương</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $_SESSION['staff']['maNV'] ?></td>
                                                        <td><?= $_SESSION['staff']['tenNV'] ?></td>
                                                        <td><?= $_SESSION['staff']['gioiTinh'] ?></td>
                                                        <td><?= $_SESSION['staff']['Ngaysinh'] ?></td>

                                                        <td><?= $_SESSION['staff']['ngayLamviec'] ?></td>
                                                        <td><?= $_SESSION['staff']['Diachi'] ?></td>
                                                        <td><?= $_SESSION['staff']['Chucvu'] ?></td>

                                                        <td><?= $_SESSION['staff']['sdt'] ?></td>
                                                        <td><?= currency_format($_SESSION['staff']['luong'])  ?></td>
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
                    <div class="row mr-2">
                        <div class="col-12 ">
                            <a href="?page=staff&action=index" class="btn btn-success float-right">Quay lại trang nhân viên <i class="fas fa-chevron-right ml-1"></i></a>
                        </div>
                    </div>
                <?php } else { ?>
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Thâm niên làm việc </h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="?page=statistic&action=order">Trang chủ</a></li>
                                        <li class="breadcrumb-item active">Thâm niên làm việc</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <?php  ?>
                                        <h3 class="card-title">Không tồn tại mã nhân niên cần thống kê</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class=" row">
                                            <div class="col-12">
                                                <a href="?page=staff&action=index" class="btn btn-success float-right">Quay lại trang nhân viên <i class="fas fa-chevron-right ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php } ?>
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