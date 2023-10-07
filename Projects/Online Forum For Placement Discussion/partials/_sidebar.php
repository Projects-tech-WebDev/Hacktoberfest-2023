<?php
if (!isset($_SESSION['loggin']) || $_SESSION['loggin'] == false) {
    $loggin = false;
} else {
    $loggin = true;
}
echo '<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;
height:100%; ">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span width="40" height="32" class="fs-4 me-2 ">Career Buddy </span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link text-white" aria-current="page">
                Home
            </a>
        </li>
        <li>
            <a href="categories.php" class="nav-link text-white">
                Categories
            </a>
        </li>
        <li>
            <a href="about.php" class="nav-link text-white">
                About Us
            </a>
        </li>
        <li>
            <a href="contact.php" class="nav-link text-white">
                Contact
            </a>
        </li>
        <li>
        <form class="d-flex" role="search" method="get" action="search.php?query=">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user rounded-circle me-2" width="32" height="32"></i>
            <strong>Account</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow " aria-labelledby=" dropdownUser1" style="width:250px; ">';
if (!$loggin) {
    echo '
        <li><a class="dropdown-item" href="LoginPage.php">Login</a></li>
        <li><a class="dropdown-item" href="Signup.php">Sign Up</a></li>';
} else if ($loggin) {
    echo '
        <li style="margin-left:10px";>Hello <span >'.$_SESSION['username'].'</span></li>
        <li>
            <hr class="dropdown-divider">
        </li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>';
        }
        echo'</ul>
    </div>
</div>
<div class="b-example-divider"></div>';
?>