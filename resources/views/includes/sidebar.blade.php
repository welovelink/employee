<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="index3.html">
        <img alt="AdminLTE Logo" class="brand-image img-circleagement elevation-3" src="img/AdminLTELogo.png"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Employee App.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img alt="User Image" class="img-circle elevation-2" src="img/avatar5.png">
            </div>
            <div class="info">
                <a class="d-block" href="#">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview"
                role="menu">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a class="nav-link @if($current === 'dashboard') active @endif" href="backend">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            หน้าหลัก
                        </p>
                    </a>
                </li>
                @if(auth()->user()->role === 'manager')
                <li class="nav-item">
                    <a class="nav-link @if($current === 'approve') active @endif" href="approve">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                            อนุมัติข้อมูลการลา
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link @if($current === 'leave') active @endif" href="leave">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            จัดการข้อมูลการลา
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            ออกจากระบบ
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
