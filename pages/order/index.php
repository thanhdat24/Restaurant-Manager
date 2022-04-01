<?php
$data = db_query("SELECT h.maHD, k.tenKH, nv.tenNV, h.ngayDH 
    FROM nhanvien nv INNER JOIN hoadon h ON nv.maNV=h.maNV INNER JOIN khachhang k ON k.maKH = h.maKH");
    
?>
            <?php get_header() ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Quản lý hoá đơn</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="?">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Quản lý hoá đơn</li>
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
                                        <h3 class="card-title">Tất cả hoá đơn</h3>
                                        <a href="?page=statistic&action=order" class="btn btn-primary ml-auto">Thống kê món ăn bán chạy</a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="order-table" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã hoá đơn</th>
                                                    <th>Tên khách hàng</th>
                                                    <th>Tên nhân viên</th>
                                                    <th>Ngày lập hoá đơn</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $key => $order) : ?>
                                                    <tr>
                                                        <td><?= $order['maHD'] ?></td>
                                                        <td><?= $order['tenKH'] ?></td>
                                                        <td><?= $order['tenNV'] ?></td>
                                                        <td><?= $order['ngayDH'] ?></td>
                                                        <td class="project-actions text-right">
                                                            <a class="btn btn-info btn-sm mb-1" href="?page=order&action=details&id=<?= $order['maHD'] ?>">
                                                                <i class="fas fa-info-circle">
                                                                </i>
                                                                Chi tiết
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#deleteOrderConfirm<?= $key ?>">
                                                                <i class="fas fa-trash">
                                                                </i>
                                                                Xóa
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteOrderConfirm<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="deleteOrderConfirmTitle<?= $key ?>" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLongTitle<?= $key ?>">Xác nhận xóa</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            Xóa đơn đặt hàng <?= $order['maHD'] ?>?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                                            <a href="?page=order&action=delete&id=<?= $order['maHD'] ?>" class="btn btn-danger">Xóa</a>
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
        </div>
        <?php get_footer() ?>