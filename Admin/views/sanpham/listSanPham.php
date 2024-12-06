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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-add-san-pham' ?>"><button
                                    class="btn btn-success">Thêm Sản Phẩm</button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Giá Sản Phẩm</th>
                                        <th>Giá Khuyến Mãi</th>
                                        <th>Ảnh Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Danh Mục Sản Phẩm</th>
                                        <th>Trạng Thái</th>
                                        <th>Mô tả</th>
                                        <th>Thao Tác</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><?php echo $sanPham['ten_san_pham'] ;?></td>
                                        <td><?php echo formatPrice($sanPham['gia_san_pham'] );?></td>
                                        <td><?php echo formatPrice($sanPham['gia_khuyen_mai']) ;?></td>
                                        <td><img src="<?php echo BASE_URL. $sanPham['hinh_anh']; ?>" alt=""
                                                width="100px"></td>
                                        <td><?php echo $sanPham['so_luong'] ;?></td>
                                        <td><?php echo $sanPham['ten_danh_muc'] ;?></td>
                                        <td><?php echo $sanPham['trang_thai'] == 1 ? 'Còn Hàng':'Hết Hàng' ;?></td>
                                        <td><?php echo $sanPham['mo_ta'] ;?></td>
                                        <td>
                                            <a
                                                href="<?= BASE_URL_ADMIN . '?act=views-san-pham&id_san_pham='.$sanPham['id'] ?>"><button
                                                    class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                                            <a
                                                href="<?= BASE_URL_ADMIN . '?act=form-edit-san-pham&id_san_pham='.$sanPham['id'] ?>"><button
                                                    class="btn btn-warning"><i class="fas fa-cog"></i></button></a>
                                            <a
                                                href="<?= BASE_URL_ADMIN . '?act=delete-san-pham&id_san_pham='.$sanPham['id'] ?>"><button
                                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
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