
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
            <h1>Thêm Sản Phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
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
                <h3 class="card-title">Thêm Sản Phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo BASE_URL_ADMIN . '?act=post-add-san-pham' ?>" method="POST" enctype="multipart/form-data">
                <div class=" card-body">
                  <div class="form-group">
                    <label >Tên Sản Phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Hãy nhập tên sản phẩm" required="">
                 
                  </div>

                  <div class="form-group">
                    <label >Giá Sản Phẩm</label>
                    <input type="text" class="form-control" name="gia_san_pham" placeholder="Hãy nhập tên sản phẩm" required="">
              
                  </div>
                  
                  <div class="form-group">
                    <label >Giá Khuyến Mãi</label>
                    <input type="text" class="form-control" name="gia_khuyen_mai" placeholder="Hãy nhập tên sản phẩm" required="">
                  </div>

                  <div class="form-group">
                    <label >Hình Ảnh</label>
                    <input type="file" class="form-control" name="hinh_anh" required="">
                  </div>
                  

                  <div class="form-group">
                    <label >Số Lượng</label>
                    <input type="number" class="form-control" name="so_luong" placeholder="Hãy nhập tên sản phẩm" required="">
                 
                  </div>

                  <div class="form-group">
                    <label >Ngày Nhập</label>
                    <input type="date" class="form-control" name="ngay_nhap" placeholder="Hãy nhập tên sản phẩm" required="" >
                
                  </div>

                  <div class="form-group">
                    <label >Danh Mục</label>
                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1" >
                      <option>Chọn Danh Mục Sản Phẩm</option>
                      <?php foreach ($listDanhMuc as $danhMuc): ?>
                        <option value="<?php echo $danhMuc['id']?>"><?php echo $danhMuc['ten_danh_muc']?></option>
                        <?php endforeach; ?>
                
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Mô Tả</label>
                    <textarea type="text" class="form-control" name="mo_ta" placeholder="Hãy nhập mô tả"></textarea>

                  </div>

                  <div class="form-group">
                    <label >Trạng Thái</label>
                    <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                          <option value="1">Còn Hàng</option>
                          <option value="2">Hết Hàng</option>
                         
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
