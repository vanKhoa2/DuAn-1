
  <!-- header  -->
   <?php include "./views/layout/header.php" ?>
  <!-- Navbar -->
  <?php include "./views/layout/navbar.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "./views/layout/sidebar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lí Danh Sách Đơn Hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản Lí Danh Sách Đơn Hàng</li>
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
              <div class="card-header">
          
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>

                  <tr>
                    <th>STT</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên Người Nhận</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Địa Chỉ</th>
                    <th>Ngày Đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Ghi Chú</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ( $listDonHang as $key => $donHang): ?>
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo $donHang['ma_don_hang'] ;?></td>
                      <td><?php echo $donHang['ten_nguoi_nhan'] ;?></td>
                      <td><?php echo $donHang['email_nguoi_nhan'] ;?></td>
                      <td><?php echo $donHang['sdt_nguoi_nhan'] ;?></td>
                      <td><?php echo $donHang['dia_chi_nguoi_nhan'] ;?></td>
                      <td><?php echo $donHang['ngay_dat'] ;?></td>
                      <td><?php echo formatPrice($donHang['tong_tien']) ;?></td>
                      <td><?php echo $donHang['ghi_chu'] ;?></td>

                      <td><?php echo $donHang['ten_trang_thai']?></td>
                      <td>
                        <a href="<?php echo BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang='.$donHang['id'] ?>"><button class="btn btn-primary">Xem</button></a>
                        <a href="<?php echo BASE_URL_ADMIN . '?act=form-edit-don-hang&id_don_hang='.$donHang['id'] ?>"><button class="btn btn-warning">Sửa</button></a>
                        
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                   
                  <tfoot>
                  </tfoot>
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
    <!-- /.content -->
  </div>
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
