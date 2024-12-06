
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
            <h1>Quản Lí Danh Sách Sản Phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản Lí Danh Sách Sản Phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
     <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="<?php echo BASE_URL. $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
              </div>
              <!-- <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
              </div> -->
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $sanPham['ten_san_pham'] ?></h3>
            <hr>
              <h4 style="color: red;" ></h4>
           

              <h4 class="mt-3">Mô Tả:<?php echo $sanPham['mo_ta'] ?></h4>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0"> Giá:
                <?php echo formatPrice($sanPham['gia_khuyen_mai']) ?> đ
                </h2>
                <h4 class="mt-0">
                  <small><?php echo formatPrice($sanPham['gia_san_pham']).'đ' ?></small>
                </h4>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Bình Luận </a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <?php foreach($listBinhLuan as $binhLuan) { ?>
                  <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                   
                  <?=$binhLuan['ho_ten'] ?>: <?=$binhLuan['noi_dung'] ?>
          
             </div>
              <?php }?>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
