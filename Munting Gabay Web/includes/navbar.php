<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <?php if (isset($_SESSION['verified_user_id'])) : ?>
            <a class="navbar-brand" href="home.php">
                <img src="assets/images/icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-1">
                <span class="fw-bold text-light">Munting Gabay</span>
            </a>
        <?php else : ?>
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-1">
                <span class="fw-bold text-light">Munting Gabay</span>
            </a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['verified_user_id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="user-list.php">User List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="doctor_approval.php">Pending Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="login.php">Login</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
