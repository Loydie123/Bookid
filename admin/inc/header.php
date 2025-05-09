<style>
    :root {
        --resort-primary: #8B4513;
        --resort-secondary: #DEB887;
        --resort-accent: #F4A460;
        --resort-light: #FFEFD5;
        --resort-dark: #5C2E0B;
    }

    body {
        background: var(--resort-light);
        font-family: 'Poppins', sans-serif;
    }

    /* Header Styles */
    .admin-header {
        background: var(--resort-primary) !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-bottom: 3px solid var(--resort-accent);
    }

    .admin-header h3 {
        color: var(--resort-light);
        font-weight: 600;
        letter-spacing: 1px;
    }

    .logout-btn {
        background: var(--resort-accent) !important;
        color: var(--resort-dark) !important;
        border: none !important;
        padding: 8px 20px !important;
        border-radius: 25px !important;
        font-weight: 500 !important;
        transition: all 0.3s ease;
    }

    .logout-btn:hover {
        background: var(--resort-secondary) !important;
        transform: translateY(-2px);
    }

    /* Sidebar Styles */
    #dashboard-menu {
        background: var(--resort-primary) !important;
        border-right: 1px solid var(--resort-accent) !important;
        border-top: none !important;
    }

    #dashboard-menu h4 {
        color: var(--resort-light);
        font-size: 1.2rem;
        padding: 15px 0;
        border-bottom: 2px solid var(--resort-accent);
        margin-bottom: 15px;
    }

    .nav-pills .nav-link {
        color: var(--resort-light) !important;
        padding: 12px 20px;
        margin: 4px 0;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        font-weight: 500;
    }

    .nav-pills .nav-link:hover {
        background: rgba(255,255,255,0.1);
        color: var(--resort-accent) !important;
        transform: translateX(5px);
    }

    .nav-pills .nav-link.active {
        background: var(--resort-accent) !important;
        color: var(--resort-dark) !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .navbar-toggler {
        background: var(--resort-accent) !important;
        border: none !important;
        padding: 8px 12px;
    }

    .navbar-toggler:focus {
        box-shadow: none !important;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        #dashboard-menu {
            position: fixed;
            height: 100vh;
            z-index: 999;
        }
    }
</style>

<div class="container-fluid admin-header p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0">MINANGUN</h3>
    <a href="logout.php" class="btn logout-btn">LOG OUT</a>
</div>    

<div class="col-lg-2 border-top border-3" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2">ADMIN PANEL</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bookings.php">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_calendar.php">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Guests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_queries.php">Guest Queries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="features_facilities.php">Amenities & Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carousel.php">Wallpaper</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="audit.php">History</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
