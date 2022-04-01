     <?php get_header() ?>
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <?php if (isset($_SESSION['statisticFood'])) {
                $TongTien = currency_format(($_SESSION['statisticFood']['Dongia'] * $_SESSION['statisticFood']['tongsl']));
            ?>
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Thống kê món ăn <b><?= $_SESSION['statisticFood']['TenTA'] ?></b></h1>
                         </div>
                         <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-right">
                                 <li class="breadcrumb-item"><a href="?">Trang chủ</a></li>
                                 <li class="breadcrumb-item active">Thống kê món ăn</li>
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
                                                 <th>Số lượng đã bán</th>
                                                 <th>Đơn giá</th>
                                                 <th>Tổng tiền</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td><?= $_SESSION['statisticFood']['maTA'] ?></td>
                                                 <td><?= $_SESSION['statisticFood']['TenTA'] ?></td>
                                                 <td><?= $_SESSION['statisticFood']['tongsl'] ?></td>
                                                 <td><?= currency_format($_SESSION['statisticFood']['Dongia']) ?></td>
                                                 <td><?= $TongTien ?></td>
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
                     <a href="?page=menu&action=index" class="btn btn-success float-right">Quay lại trang thực đơn <i class="fas fa-chevron-right ml-1"></i></a>
                 </div>
             </div>
         <?php } else { ?>
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Thống kê món ăn </h1>
                         </div>
                         <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-right">
                                 <li class="breadcrumb-item"><a href="?">Trang chủ</a></li>
                                 <li class="breadcrumb-item active">Thống kê món ăn</li>
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
                                 <h3 class="card-title">Không tồn tại mã thức ăn cần thống kê</h3>
                             </div>
                             <div class="card-footer">
                                 <div class=" row">
                                     <div class="col-12">
                                         <a href="?page=menu&action=index" class="btn btn-success float-right">Quay lại trang thực đơn <i class="fas fa-chevron-right ml-1"></i></a>
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