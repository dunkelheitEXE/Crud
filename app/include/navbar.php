<div class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">COMPANY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(isset($_SESSION['user-id'])): ?>
                        <li class="nav-item">
                            <a href="Home.php?user=<?=$_SESSION['user-id']?>" class="nav-link">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a href="Logout.php" class="nav-link text-danger">Log out</a>
                        </li>
                    <?php else:?>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">SIGN UP</a>
                        </li>
                        <li class="nav-item">
                            <a href="Login.php" class="nav-link">LOG IN</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>