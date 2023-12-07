<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="./adminhome.php">AdminHome.</a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">

                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                        <label class="form-check-label"></label>
                    </div>

                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <?php
       
        $current_page = basename($_SERVER['PHP_SELF']);

        function isMenuActive($menuPage, $currentPage) {
            return ($menuPage === $currentPage) ? 'active' : '';
        }
        ?>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?php echo isMenuActive('adminhome.php', $current_page); ?>">
                    <a href="./adminhome.php" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo isMenuActive('datauser.php', $current_page); ?>">
                    <a href="./datauser.php" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Data user</span>
                    </a>
                </li>

                <li class="sidebar-item  <?php echo isMenuActive('datagenre.php', $current_page); ?>">
                    <a href="./datagenre.php" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Data Genre</span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo isMenuActive('datafilm.php', $current_page); ?>">
                    <a href="./datafilm.php" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Data Film</span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo isMenuActive('dataaktor.php', $current_page); ?>">
                    <a href="./dataaktor.php" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Data Aktor</span>
                    </a>
                </li>

                <div class="sidebar-item  has-sub"></div>
                <a href="./logout.php" class='sidebar-link'>
                    <i class="bi bi-hexagon-fill"></i>
                    <span>Logout</span>
                </a>
        </div>
    </div>
</div>