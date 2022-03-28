<?php
$data = db_query("select * from nhanvien");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dat</title>

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
                                <h1>Quản lý nhân viên</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/admin/home">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Quản lý nhân viên</li>
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
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="card-title">Tất cả nhân viên</h3>
                                        <a href="?page=staff&action=create" class="btn btn-primary ml-auto">Thêm nhân viên</a>
                                    </div>
                                    <!-- /.card-header -->
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
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $key => $staff) : ?>
                                                    <tr>
                                                        <td><?= $staff['maNV'] ?></td>
                                                        <td><?= $staff['tenNV'] ?></td>
                                                        <td><?= $staff['gioiTinh'] ?></td>
                                                        <td><?= $staff['Ngaysinh'] ?></td>

                                                        <td><?= $staff['ngayLamviec'] ?></td>
                                                        <td><?= $staff['Diachi'] ?></td>
                                                        <td><?= $staff['Chucvu'] ?></td>

                                                        <td><?= $staff['sdt'] ?></td>
                                                        <td><?= currency_format($staff['luong'])  ?></td>
                                                        <td class="project-actions text-right">
                                                            <a class="btn btn-info btn-sm mb-1" href="?page=staff&action=edit&id=<?= $staff['maNV'] ?>">
                                                                <i class="fas fa-edit">
                                                                </i>
                                                                Sửa
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#deleteStaffConfirm<?= $key ?>">
                                                                <i class="fas fa-trash">
                                                                </i>
                                                                Xóa
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteStaffConfirm<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="deleteStaffConfirmTitle<?= $key ?>" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLongTitle<?= $key ?>">Xác nhận xóa</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            Xóa nhân viên <?= $staff['tenNV'] ?>?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                                            <a href="?page=staff&action=delete&id=<?= $staff['maNV'] ?>" class="btn btn-danger">Xóa</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
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