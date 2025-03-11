<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Company name</span>
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
                <li class="nav-item">
                    <a href="{{ url('users') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('products') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-box"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Customer
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
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-calendar-days"></i>
                        <p>Agenda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-gear"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item bg-white">
                    <a href="{{ url('login') }}" class="nav-link">
                        <i class="nav-icon fa-solid  fa-sign-in"></i>
                        <p>Login</p>
                    </a>
                </li>
                <li class="nav-item bg-white">
                    <a href="{{ url('register') }}" class="nav-link">
                        <i class="nav-icon fa fa-hand-pointer-o"></i>
                        <p>Register</p>
                    </a>
                </li>


                <!-- Sidebar Templates -->
                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuItems = document.querySelectorAll("#sidebar-menu .nav-link");

        // Ambil menu yang terakhir aktif dari localStorage
        let activeMenu = localStorage.getItem("activeMenu");

        // Jika belum ada menu yang tersimpan, set default ke "Dashboard"
        if (!activeMenu) {
            activeMenu = "Dashboard";
            localStorage.setItem("activeMenu", activeMenu);
        }

        // Atur menu yang aktif berdasarkan localStorage
        menuItems.forEach(item => {
            item.classList.remove("active"); // Reset semua menu
            if (item.textContent.trim() === activeMenu) {
                item.classList.add("active"); // Set menu yang sesuai dengan localStorage
            }
        });

        // Event listener untuk mengubah active menu saat diklik
        menuItems.forEach(item => {
            item.addEventListener("click", function () {
                // Hapus kelas active dari semua menu
                menuItems.forEach(link => link.classList.remove("active"));

                // Tambahkan kelas active ke menu yang diklik
                this.classList.add("active");

                // Simpan nama menu yang aktif di localStorage
                localStorage.setItem("activeMenu", this.textContent.trim());
            });
        });
    });
</script>