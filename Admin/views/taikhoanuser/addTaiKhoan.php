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
          <h1>Thêm Tài Khoản</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Thêm Tài Khoản</li>
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
              <h3 class="card-title">Thêm Tài Khoản</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo BASE_URL_ADMIN . '?act=post-add-tai-khoan' ?>" method="POST" enctype="multipart/form-data">
              <div class=" card-body">
                <div class="form-group">
                  <label>Họ Và Tên</label>
                  <input type="text" class="form-control" name="ho_ten" placeholder="Hãy nhập họ và tên">
                  <?php if (isset($error['ten_san_pham'])) { ?>
                    <p class="text-danger"><?= $error['ho_ten'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Hãy nhập email">
                  <?php if (isset($error['email'])) { ?>
                    <p class="text-danger"><?= $error['email'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Ngày Sinh</label>
                  <input type="date" class="form-control" name="ngay_sinh" placeholder="Hãy nhập ngày sinh">
                  <?php if (isset($error['ngay_sinh'])) { ?>
                    <p class="text-danger"><?= $error['ngay_sinh'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Hình Ảnh</label>
                  <input type="file" class="form-control" name="hinh_anh">
                </div>


                <div class="form-group">
                  <label>Số Điện Thoại</label>
                  <input type="text" class="form-control" name="so_dien_thoai" placeholder="Hãy nhập số điện thoại">
                  <?php if (isset($error['so_dien_thoai'])) { ?>
                    <p class="text-danger"><?= $error['so_dien_thoai'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Địa Chỉ</label>
                  <input type="text" class="form-control" name="dia_chi" placeholder="Hãy nhập địa chỉ">
                  <?php if (isset($error['dia_chi'])) { ?>
                    <p class="text-danger"><?= $error['dia_chi'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group">
                  <label>Mật Khẩu</label>
                  <input type="text" class="form-control" name="mat_khau" placeholder="Hãy nhập mật khẩu">
                  <?php if (isset($error['mat_khau'])) { ?>
                    <p class="text-danger"><?= $error['mat_khau'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Giới Tính</label>
                  <select class="form-control" name="gioi_tinh" id="exampleFormControlSelect1">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>

                  </select>
                </div>



                <div class="form-group">
                  <label>Vai Trò</label>
                  
                    <select class="form-control" name="chuc_vu_id" id="exampleFormControlSelect1">
                      <option value="">Chọn Vai Trò</option>
                    <?php foreach ($listChucVu as $ChucVu) { ?>
                      <option value="<?= $ChucVu['id']?>"><?= $ChucVu['ten_chuc_vu'] ?></option>
                      <?php } ?> 
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