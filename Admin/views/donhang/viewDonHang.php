
  <!-- header  -->
  <?php include "./views/layout/header.php" ?>
  <!-- Navbar -->
  <?php include "./views/layout/navbar.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "./views/layout/sidebar.php" ?>

        <!-- /.row -->
  

<div class="wrapper">
  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi Tiết Đơn Hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Chi Tiết Sản Phẩm</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Ảnh</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Đơn giá</th>
                      <th >Số Lượng </th>
                      <th >Thành Tiền </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($chi_tiet_don_hang as $item){ ?>
                    <tr>
                      <td><img width="60" src="<?php echo  BASE_URL. $item['hinh_anh'] ?>" alt=""></td>
                      <td><?php echo $item['ten_san_pham'] ?></td>
                      <td> <span class="badge bg-danger"><?php echo $item['don_gia'] ?></span></td>
                      <td><?php echo $item['so_luong'] ?></td>
                      <td><?php echo $item['thanh_tien'] ?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông Tin Khách Hàng</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tên Sản Phẩm</th>
                      <th>Đơn Giá</th>
                      <th>Số Lượng</th>
                      <th style="width: 40px">Thành Tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">90%</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

       
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


        <!-- /.row -->

        <!-- /.row -->
      <!-- /.container-fluid -->
  <!-- /.content-wrapper -->
 <!-- footer -->
 <?php include "./views/layout/footer.php"; ?>
<!-- end footer  -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
