<?php
$data = db_query("select * from thucan");

if (isset($_POST['btn_add'])) {

    $statisticFood = db_query("CALL thongkebanhang('" . $_POST["maTA"] . "')");
    if ($statisticFood) {
        $_SESSION['statisticFood'] = mysqli_fetch_assoc($statisticFood);
        redirect("?page=statistic&action=menu");
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
                    <h1>Quản lý thực đơn</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý thực đơn</li>
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
                            <h3 class="card-title">Tất cả thực đơn</h3>
                            <a href="?page=menu&action=create" class="btn btn-primary ml-auto">Thêm món</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="main-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên thức ăn</th>
                                        <th>Giá</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $food) : ?>
                                        <tr>
                                            <td><?= $food['maTA'] ?></td>
                                            <td><?= $food['TenTA'] ?></td>
                                            <td><?= currency_format($food['Dongia'])  ?></td>

                                            <td class="project-actions text-right ">
                                                <a class="btn btn-info btn-sm mb-1" href="?page=menu&action=edit&id=<?= $food['maTA'] ?>">
                                                    <i class="fas fa-edit">
                                                    </i>
                                                    Sửa
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#deleteFoodConfirm<?= $key ?>">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Xóa
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteFoodConfirm<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="deleteFoodConfirmTitle<?= $key ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle<?= $key ?>">Xác nhận xóa</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left">
                                                                Xóa thực đơn <?= $food['TenTA'] ?>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                                <a href="?page=menu&action=delete&id=<?= $food['maTA'] ?>" class="btn btn-danger">Xóa</a>
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
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thống kê số lượng món ăn đã bán</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="maTA">Mã món ăn</label>
                                <input type="text" name="maTA" class="form-control" id="maTA" placeholder="Nhập mã món ăn">
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