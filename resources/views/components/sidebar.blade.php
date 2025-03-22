<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Management Company</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Username</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        

        <div></div>
        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" id="sidebar-menu" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('admin')
                <li class="nav-item">
                    <a href="{{ url('users') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>Users</p>
                    </a>
                </li>    
                @endcan
                <li class="nav-item">
                    <a href="{{ url('products') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-box"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Customers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('customers/lists') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lists</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('customers/services') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('customers/contacts') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('agenda') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-calendar-days"></i>
                        <p>Agenda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('settings') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-gear"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item bg-danger">
                    <a class="nav-link" 
                    onclick="event.preventDefault(); document.getElementById('logging-out').submit();">
                      <i class="fa fa-sign-out nav-icon"></i>
                      <p>Logout</p>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" id="logging-out">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarMenuItems = document.querySelectorAll("#sidebar-menu .nav-link");

        // Ambil menu yang terakhir aktif dari localStorage
        let activeMenu = localStorage.getItem("activeMenu");

        // Fungsi untuk mengatur active menu di sidebar
        function updateSidebarActive(menuText) {
            sidebarMenuItems.forEach(item => {
                item.classList.remove("active");
                if (item.textContent.trim() === menuText) {
                    item.classList.add("active");
                }
            });
        }

        // Atur menu yang aktif di sidebar saat halaman dimuat
        if (activeMenu) {
            updateSidebarActive(activeMenu);
        }

        // Event listener untuk sidebar (jika diklik langsung)
        sidebarMenuItems.forEach(item => {
            item.addEventListener("click", function () {
                const menuText = this.textContent.trim();
                
                // Simpan ke localStorage agar navbar ikut berubah
                localStorage.setItem("activeMenu", menuText);
            });
        });
    });
    
</script>
