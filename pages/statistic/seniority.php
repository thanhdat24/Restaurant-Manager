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
                              <li class="breadcrumb-item"><a href="?">Trang chủ</a></li>
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

                                              <td>0<?= $_SESSION['staff']['sdt'] ?></td>
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
                              <li class="breadcrumb-item"><a href="?">Trang chủ</a></li>
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