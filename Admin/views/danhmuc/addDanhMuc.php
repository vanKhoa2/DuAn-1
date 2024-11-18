
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
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Danh Mục</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo BASE_URL_ADMIN . '?act=post-add-danh-muc' ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Tên Danh Mục</label>
                    <input type="text" class="form-control" name="ten_danh_muc" >
                    <?php if(isset($error['ten_danh_muc'])){ ?>
                     <p class="text-danger"><?= $error['ten_danh_muc']?></p>
                   <?php } ?>
                  </div>

                  <div class="form-group">
                    <label >Mô Tả</label>
                    <textarea type="text" class="form-control" name="mo_ta"></textarea>
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
