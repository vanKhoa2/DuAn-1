<?php
require_once "layout/header.php";
require_once "layout/menu.php";
?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- google map start -->
    <div class="map-area section-padding">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8638558814346!2d105.74459841492961!3d21.038132792834098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0!3m2!1sen!2s!4v1620117061296!5m2!1sen!2s"
            width="100%"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
    <!-- google map end -->

    <!-- contact area start -->
    <div class="contact-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-info">
                        <h4 class="contact-title">Liên hệ với chúng tôi</h4>
                        <p>
                            Liên hệ với chúng tôi để được tư vấn miễn phí về sản phẩm giày thể thao Adidas, các chương trình ưu đãi, chính sách bảo hành,
                            hướng dẫn chọn size giày phù hợp,... và các vấn đề liên quan. Chúng tôi cam kết phản hồi trong thời gian sớm nhất để mang đến trải nghiệm mua sắm tốt nhất cho bạn.
                        </p>
                        <ul>
                            <li><i class="fa fa-map-marker"></i> Địa chỉ: Tòa F, 13 Trịnh Văn Bô, Cao đẳng FPT  Polytechnic - Hà Nội</li>
                            <li><i class="fa fa-envelope"></i> Email: nhom2adidas@gmail.com </li>
                            <li><i class="fa fa-phone"></i> Số điện thoại: (+84) 123 456 789</li>
                        </ul>
                        <div class="working-time">
                            <h6>Giờ làm việc</h6>
                            <p><span>Thứ 2 – Thứ 7</span> 7:00 – 12:00 & 14:00 - 18:30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
</main>

<?php require_once "layout/footer.php"; ?>