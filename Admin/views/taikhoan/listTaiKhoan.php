
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
            <h1>Quản Lí Tài Khoản</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản Lí Tài Khoản</li>
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
                <a href="<?= BASE_URL_ADMIN . '?act=form-add-tai-khoan' ?>"><button class="btn btn-success">Thêm Tài Khoản</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>

                  <tr>
                    <th>STT</th>
                    <th>Họ Và Tên</th>                   
                    <th>Ngày Sinh</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Giới Tính</th>
                    <th>Địa Chỉ</th>
                    <th>Chức Vụ</th>
                    <th>Thao Tác</th>
                
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listTaiKhoan as $key => $taiKhoan): ?>
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo $taiKhoan['ho_ten']; ?></td>
                      <td><?php echo $taiKhoan['ngay_sinh'] ;?></td>
                      <td><?php echo $taiKhoan['email'] ;?></td>
                      <td><?php echo $taiKhoan['so_dien_thoai'] ;?></td>
                      <td><?php echo $taiKhoan['gioi_tinh'] == 1 ? 'Nam':'Nữ'?></td>
                      <td><?php echo $taiKhoan['dia_chi'] ;?></td>
    
                      <td><?php echo $taiKhoan['ten_chuc_vu'] ;?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-edit-tai-khoan&id_tai_khoan='.$taiKhoan['id'] ?>"><button class="btn btn-warning">Sửa</button></a>
                        <a href="<?= BASE_URL_ADMIN . '?act=delete-tai-khoan&id_tai_khoan='.$taiKhoan['id'] ?>"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
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
