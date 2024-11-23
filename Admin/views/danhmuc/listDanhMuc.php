
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
            <h1>Quản Lí Danh Mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản Lí Danh Mục Sản Phẩm</li>
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
                <a href="<?= BASE_URL_ADMIN . '?act=form-add-danh-muc' ?>"><button class="btn btn-success">Thêm Danh Mục</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>

                  <tr>
                    <th>STT</th>
                    <th>Tên Danh Mục</th>
                    <th>Mô tả</th>
                    <th>Thao Tác</th>
                
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo $danhMuc['ten_danh_muc']; ?></td>
                      <td><?php echo $danhMuc['mo_ta'] ;?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-edit-danh-muc&id_danh_muc='.$danhMuc['id'] ?>"><button class="btn btn-warning"><i class="fas fa-cog"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN . '?act=delete-danh-muc&id_danh_muc='.$danhMuc['id'] ?>"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
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
