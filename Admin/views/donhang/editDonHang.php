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
          <h1>Cập Nhật Trạng Thái Đơn Hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Cập nhật trạng thái đơn hàng</li>
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
              <h3 class="card-title">Cập nhật trạng thái đơn hàng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo BASE_URL_ADMIN . '?act=post-edit-don-hang&id_don_hang=' ?> <?php echo $donHang['id'] ?>" method="POST" enctype="multipart/form-data">
              <div class=" card-body">
                <div class="form-group">
                  <label>Mã Đơn Hàng</label>
                  <input type="text" class="form-control" name="ma_don_hang" value="<?php echo $donHang['ma_don_hang'] ?>">
                  <?php if (isset($error['ma_don_hang'])) { ?>
                    <p class="text-danger"><?= $error['ma_don_hang'] ?></p>
                  <?php } ?>
                </div>



                <div class="form-group">
                  <label>Trạng Thái</label>
                  <select class="form-control" name="trang_thai_don_hang" id="exampleFormControlSelect1">
                    <?php foreach ($listTrangThai as $trangThai): ?>
                      <option <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'Selected' : '' ?>
                        value="<?= $trangThai['id'] ?>">
                        <?= $trangThai['ten_trang_thai'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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

</body>

</html>