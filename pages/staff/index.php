<?php
$data = db_query("select * from nhanvien");

if (isset($_POST['btn_add'])) {
    $statisticSeniority = db_query("SELECT thoigian_dalam('" . $_POST["maNV"] . "')");
    if ($statisticSeniority) {
        $_SESSION['statisticSeniority'] = mysqli_fetch_array($statisticSeniority);
        redirect("?page=statistic&action=seniority");
    }
    $_SESSION['staff'] =  db_fetch_row("SELECT *FROM nhanvien WHERE maNV='" . $_POST["maNV"] . "'");
}
?>
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
                        <li class="breadcrumb-item"><a href="?">Trang chủ</a></li>
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

                                            <td>0<?= $staff['sdt'] ?></td>
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
    <section class="content">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thống kê thâm niên làm việc của nhân viên</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="maNV">Mã nhân viên</label>
                                <input type="text" name="maNV" class="form-control" id="maNV" placeholder="Nhập mã nhân viên">
                            </div>
                            <div class=" row">
                                <div class="col-12">
                                    <button name="btn_add" type="submit" class="btn btn-success float-right">Thống kê</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
<?php get_footer() ?>