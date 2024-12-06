
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
            <h1>Sửa Sản Phẩm <?php echo $sanPham['ten_san_pham'] ?></h1>
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
                <h3 class="card-title">Sửa Sản Phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo BASE_URL_ADMIN . '?act=post-edit-san-pham&id_san_pham='?> <?php echo $sanPham['id']?>" method="POST" enctype="multipart/form-data">
                <div class=" card-body">
                  <div class="form-group">
                     <input type="text" name="id_sp" value="<?php echo $sanPham['id'] ?>" hidden>               

                    <label >Tên Sản Phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" value="<?php echo $sanPham['ten_san_pham'] ?>" >
                    <?php if(isset($error['ten_san_pham'])){ ?>
                     <p class="text-danger"><?= $error['ten_san_pham']?></p>
                   <?php } ?>
                  </div>

                  <div class="form-group">
                    <label >Giá Sản Phẩm</label>
                    <input required="" type="text" class="form-control" name="gia_san_pham" value="<?php echo $sanPham['gia_san_pham'] ?>">
                 
                  </div>
                  
                  <div class="form-group">
                    <label >Giá Khuyến Mãi</label>
                    <input type="text" class="form-control" name="gia_khuyen_mai" value="<?php echo $sanPham['gia_khuyen_mai'] ?>" required="">
                  
                  </div>

                  <div class="form-group">
                    <label >Hình Ảnh</label>
                    <input type="file" class="form-control" name="hinh_anh">
                  </div>
                  

                  <div class="form-group">
                    <label >Số Lượng</label>
                    <input type="number" class="form-control" name="so_luong" value="<?php echo $sanPham['so_luong'] ?>">
             
                  </div>

                  <div class="form-group">
                    <label >Ngày Nhập</label>
                    <input type="date" class="form-control" name="ngay_nhap"  value="<?php echo $sanPham['ngay_nhap'] ?>" required="">
             
                  </div>

                  <div class="form-group">
                    <label >Danh Mục</label>
                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">
                      <?php foreach ($listDanhMuc as $danhMuc): ?>
                        <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'Selected':  ''  ?> value="<?php echo $danhMuc['id']?>"><?php echo $danhMuc['ten_danh_muc']?></option>
                        <?php endforeach; ?>
                
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Mô Tả</label>
                    <textarea type="text" class="form-control" name="mo_ta" value="<?php echo $sanPham['mo_ta'] ?>" placeholder="Hãy nhập mô tả"></textarea>

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
