<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ADIDAS STORE ONLINE</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Khoa_PH54622</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
            <li class="nav-item">
        <a href="<?= BASE_URL_ADMIN . '?act=/' ?>" class="nav-link">
        <i class="fas fa-tachometer-alt"></i>
            <p>
             Thông Kê
      
            </p>
          </a>
        </li>      
             
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Danh Mục Sản Phẩm
      
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
            <i class="nav-icon fas fa-shoe-prints"></i>
            <p>
              Sản Phẩm
           
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=tai-khoan-admin' ?>" class="nav-link">
          <i class="fas fa-users"></i>
            <p>
               Tài Khoản Admin
            
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=tai-khoan-user' ?>" class="nav-link">
          <i class="fas fa-users"></i>
            <p>
               Tài Khoản User
            
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=binh-luan' ?>" class="nav-link">
          <i class="fas fa-comments"></i>
            <p>
               Bình Luận
            
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
          <i class="far fa-list-alt"></i>
            <p>
               Đơn Hàng
            
            </p>
          </a>
        </li>



      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>