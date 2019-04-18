<?php function_exists('current_user') || require_once __DIR__ . '/../functions.php'; ?>

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a href="#" class="navbar-left"><img src="./Logo.png" alt="LOGO"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="mr-auto navbar-nav ml-auto">
               <li class="nav-item <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>">
                   <a class="nav-link" href="./index.php">Home</a>
               </li>
                <li class="nav-item <?php if ($CURRENT_PAGE == "About") {?>active<?php }?>">
                    <a class="nav-link" href="./about.php">About Us</a>
                </li>
                <li class="nav-item <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>">
                    <a class="nav-link" href="./contact.php">Contact</a>
                </li>
                <li class="nav-item <?php if ($CURRENT_PAGE == "Gallery") {?>active<?php }?>">
                    <a class="nav-link" href="./gallery.php">Photo Gallery</a>
                </li>
            </ul>
        </div>

        <?php if ( ! current_user() ) : ?>
            <form class="form-inline" action="./includes/login.inc.php" method="post">
                <input class="mr-1 form-control-sm" aria-label="emailHelp" type="text" name="mailuid" placeholder="Username/E-mail">
                <input class="mr-1 form-control-sm" type="password" name="pwd" placeholder="Password">
                <button class="mr-1 btn-small btn-success" type="submit" name="login-submit">Login</button>
                <button class="mr-1 btn-small btn-primary" type="button" onclick="location.href='./signup.php';">Signup</button>
            </form>
        <?php else : ?>
            <form class="form-inline" action="./includes/logout.inc.php" method="post">
                <button class="mr-1 btn-small btn-outline-danger" type="submit" name="logout-submit">Logout</button>
            </form>
        <?php endif; ?>

    </div>
</nav>

