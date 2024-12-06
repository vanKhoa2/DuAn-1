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
              <li class="breadcrumb-item active">Chi Tiết Đơn Hàng</li>
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
                      <th>Size</th>
                      <th>Đơn giá</th>
                   
                      <th>Số Lượng </th>
                      <th>Thành Tiền </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($chi_tiet_don_hang as $item) { ?>
                      <tr>
                        <td><img width="60" src="<?php echo  BASE_URL . $item['hinh_anh'] ?>" alt=""></td>
                        <td><?php echo $item['ten_san_pham'] ?></td>
                        <td><?php echo $item['size'] ?></td>
                        <td> <span class="badge bg-danger"><?php echo formatPrice($item['don_gia'] )?></span></td>
                        <td><?php echo $item['so_luong'] ?></td>
                        <td><?php echo formatPrice($item['thanh_tien']) ?></td>
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
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông Tin Đơn Hàng</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Mã Đơn Hàng</td>
                      <th><?php echo $donHang['ma_don_hang']; ?></th>
                    </tr>
                    <tr>
                      <td>Người Nhận</td>
                      <th><?php echo $donHang['ten_nguoi_nhan']; ?></th>
                    </tr>
                    <tr>
                      <td>Địa Chỉ</td>
                      <th><?php echo $donHang['dia_chi_nguoi_nhan']; ?></th> <!-- Replace with actual field -->
                    </tr>
                    <tr>
                      <td>Số Điện Thoại</td>
                      <th><?php echo $donHang['sdt_nguoi_nhan']; ?></th> <!-- Replace with actual field -->
                    </tr>
                    <tr>
                      <td>Ngày Đặt Hàng</td>
                      <th><?php echo $donHang['ngay_dat']; ?></th> <!-- Replace with actual field -->
                    </tr>
                    <tr>
                      <td>Phương Thức Thanh Toán</td>
                      <th><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']]  ?></th>
                    </tr>
                    <tr>
                      <td>Trạng Thái Đơn Hàng</td>
                      <th><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></th>
                    </tr>
                    <tr>
                      <td>Ghi Chú</td>
                      <th><?= $donHang['ghi_chu'] ?></th>
                    </tr>
                    <tr>
                      <td>Trạng Thái Đơn Hàng</td>
                      <th><?= $donHang['tong_tien'] ?></th>
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
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
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