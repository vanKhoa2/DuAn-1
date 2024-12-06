<?php require_once './views/layout/header.php'  ?>
<?php require_once './views/layout/menu.php'  ?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">login-Register</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding">
        <div class="container" style="max-width: 500px;">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-12">
                        <div class="login-reg-form-wrap">
                            <h5 class="text-center">Hãy Nhập Thông Tin Của Bạn</h5>
                       
                            <form action="<?= BASE_URL . '?act=check-quen-pass' ?>" method="post">
                                <div class="single-input-item">
                                    <input type="email"name="email" placeholder="Hãy  Nhập Email Của Bạn" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="text" name="sdt" placeholder="Nhập Số Điện Thoại Của Bạn" required />
                                </div>
                                <div class="single-input-item">
                                    <button type="submit" class="btn btn-sqr">Quên Mật Khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->              
                </div>
            </div>
        </div>
    </div>
    <!-- login register wrapper end -->
</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<?php require_once './views/layout/footer.php'  ?>
<?php
if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị để tránh lặp lại
}
?>