  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/index3.html" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class=" getbrand font-weight-light-600 "> One Click</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="https://nafezly-production.s3.eu-west-3.amazonaws.com/uploads/avatars/small/18986_1637229275_619622dbd6dfe.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"></a>
            </div>
          </div>
      <!-- SidebarSearch Form -->
      <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="padding-bottom: 60px">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/home" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                الصفحه الرئيسه
              </p>
            </a>

          </li>
          <!--
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->




           @can('ادره اصدار التراخيص')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                 ادره اصدار التراخيص
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اداره التراخيص</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link ">

                  <i class="far fa-circle nav-icon"></i>
                  <p>تقارير</p>
                </a>
              </li>



            </ul>
          </li>
        @endcan
        @can('النماذج')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               النماذج
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>انشاء نموذج</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> تقارير</p>
                </a>
              </li>



            </ul>
          </li>
         @endcan
         @can('الموظفين والصلاحيات')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                المستخدمين والصلاحيات
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('اداره المستخدمين')
                   <li class="nav-item">
                <a href="{{route('getuser')}}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>اداره المستخدمين </p>
                </a>
              </li>
                @endcan
               @can('الوظائف')
               <li class="nav-item">
                <a href="{{route('role')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>الوظائف </p>
                </a>
              </li>
               @endcan





            </ul>
          </li>
         @endcan
         @can('الاعدادت')

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-cogs nav-icon"></i>
              <p>
                الاعدادت
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اداره البرنامج</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>تقارير</p>
                </a>
              </li>



            </ul>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
