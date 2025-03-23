<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light layout-top-nav">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
