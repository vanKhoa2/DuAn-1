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
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- about us area start -->
    <section class="about-us section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="about-thumb"><br><br>

                        <img src="assets/img/logo/Logo-gt-Adidas.jpg" alt="about thumb">
                    </div>
                </div>
                <div class="col-lg-7">
                    <h2 class="about-title">Giới thiệu</h2>
                    <div class="about-content">
                        
                        <h5 class="about-sub-title">
                        NHỮNG CÂU CHUYỆN, PHONG CÁCH VÀ ĐỒ THỂ THAO TẠI ADIDAS 
                        </h5>
                        <p>Thể thao giữ cho chúng ta khỏe mạnh, tỉnh táo và kết nối mọi người lại với nhau. Thông qua thể thao, chúng ta có sức mạnh để thay đổi cuộc sống. Dù là qua những câu chuyện truyền cảm hứng từ các vận động viên hay giúp bạn bắt đầu và duy trì việc vận động, đồ thể thao với công nghệ tiên tiến của adidas giúp bạn nâng cao hiệu suất, vượt qua giới hạn của chính mình.                            
                        </p>
                        <p>
                        Adidas là mái nhà cho những người chạy bộ, cầu thủ bóng rổ, cậu bé yêu bóng đá, người đam mê thể hình, hay những người yêu thích leo núi vào cuối tuần để thoát khỏi sự ồn ào của thành phố. Chúng tôi cũng đồng hành cùng giáo viên yoga lan tỏa những động tác tuyệt vời. 3 sọc adidas còn xuất hiện trong thế giới âm nhạc, trên sân khấu và tại các lễ hội. Trang phục thể thao của chúng tôi giúp bạn giữ sự tập trung trước tiếng còi khai cuộc, trong suốt cuộc đua, và cả khi bạn vượt qua vạch đích. Chúng tôi ở đây để hỗ trợ các nhà sáng tạo, cải thiện trò chơi, cuộc sống của họ và thay đổi thế giới.
                        </p>
                        <p>
                        Adidas không chỉ là đồ thể thao hay trang phục tập luyện. Chúng tôi hợp tác với những người giỏi nhất trong ngành để cùng tạo ra các sản phẩm hoàn hảo. Qua đó, chúng tôi mang đến cho người hâm mộ những trang phục thể thao và phong cách phù hợp với nhu cầu vận động, đồng thời luôn nghĩ đến sự bền vững. Chúng tôi ở đây để hỗ trợ các nhà sáng tạo, cải thiện cuộc sống, tạo ra sự thay đổi và luôn suy nghĩ về tác động của mình đối với thế giới.
                        </p>                          
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us area end -->

    <!-- choosing area start -->
    <div class="choosing-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title">Tại sao nên chọn chúng tôi?</h2>
                        <p>Lý do bạn chọn chúng tôi là gì?</p>
                    </div>
                </div>
            </div>
            <div class="row mbn-30">
                <div class="col-lg-4 col-md-4">
                    <div class="single-choose-item text-center mb-30">
                        <i class="fa fa-globe"></i>
                        <h4>Giá ship ưu đãi</h4>
                        <p>Giá vận chuyển ưu đãi, được free vào những dịp đặc biệt.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single-choose-item text-center mb-30">
                        <i class="fa fa-plane"></i>
                        <h4>Vận chuyển nhanh</h4>
                        <p>Thời gian vận chuyển nhanh, từ 3-7 ngày.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single-choose-item text-center mb-30">
                        <i class="fa fa-comments"></i>
                        <h4>Dịch vụ chăm sóc khách hàng</h4>
                        <p>Sẵn sàng hỗ trợ, giải đáp thắc mắc, hoàn tiền và bảo hành.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- choosing area end -->

</main>

<?php require_once "layout/footer.php" ?>