<?php
require 'db/connect.php';
$bestSellingFood = "CALL thucanbanchay()";
$result = mysqli_query($con, $bestSellingFood);

$data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
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
                                <h1>Thống kê món ăn bán chạy</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="?">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Món ăn bán chạy</li>
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
                                    <div class="card-body">
                                        <table id="main-table" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã thức ăn</th>
                                                    <th>Tên thức ăn</th>
                                                    <th>Tổng số lượng đã bán</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $key => $food) { ?>
                                                    <tr>
                                                        <td><?= $food['maTA'] ?></td>
                                                        <td><?= $food['TenTA'] ?></td>
                                                        <td><?= $food['tongsl'] ?></td>
                                                    </tr>
                                                <?php } ?>
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
