<nav class="navbar">
    <div class="logo">
        <a href="#">MyLogo</a>
    </div>
    <ul class="nav-links">
        <?php if(!isset($_SESSION['loggedin'])) : ?>
        <li><a href="<?= ROOT_DIR ?>">Home</a></li>
        <li><a href="<?= ROOT_DIR ?>login">Login</a></li>
        <li><a href="<?= ROOT_DIR ?>register">Register</a></li>
        <?php elseif($_SESSION['is_admin']===true): ?>
        <li><a href="<?= ROOT_DIR ?>admin">Admin Dash</a></li>
        <li><a href="<?= ROOT_DIR ?>logout.php">Logout</a></li>
        <?php else: ?>
        <li><a href="<?= ROOT_DIR ?>user">User Dash</a></li>
        <li><a href="<?= ROOT_DIR ?>logout.php">Logout</a></li>
        <?php endif ?>
    </ul>
    <div class="menu-toggle" id="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>

