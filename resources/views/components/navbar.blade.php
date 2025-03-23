<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light layout-top-nav">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-md-inline-block">
            <!-- Mobile Hidden -->
            <a href="{{ url('/') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-md-inline-block">
            <!-- Mobile Hidden -->
            <a href="{{ url('products') }}" class="nav-link">Products</a>
        </li>
        <li class="nav-item dropdown d-none d-md-inline-block">
            <!-- Mobile Hidden -->
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Customers
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <a class="dropdown-item" href="{{ url('customers/lists') }}">Lists</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('customers/services') }}">Services</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('customers/contacts') }}">Contacts</a>

            </div>
        </li>
    </ul>
    
    <ul class="navbar-nav ml-auto">
        <!-- in case if you want to add something on the left side of the navbar -->
    </ul>
    
    
</nav>
<!-- /.navbar -->


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbarMenuItems = document.querySelectorAll(".navbar-nav .nav-link"); // Sesuaikan class dengan navbar

        navbarMenuItems.forEach(item => {
            item.addEventListener("click", function () {
                const menuText = this.textContent.trim();
                
                // Simpan menu yang aktif di localStorage
                localStorage.setItem("activeMenu", menuText);
            });
        });
    });
</script>
