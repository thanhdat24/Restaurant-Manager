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
$dataMin = db_fetch_array("CALL luongthapnhat()");

?>
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
                                    <li class="breadcrumb-item"><a href="?">Trang chủ</a></li>
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