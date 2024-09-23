<nav class="navbar">
    <div class="logo">
        <a href="<?= ROOT_DIR ?>">MyLogo</a>
    </div>
    <ul class="nav-links">
        <?php if (!isset($_SESSION['loggedin'])) : ?>
            <!-- For non-logged-in users -->
            <li><a href="<?= ROOT_DIR ?>">Home</a></li>
            <li><a href="<?= ROOT_DIR ?>vinyl">Vinyl</a></li>
            <li><a href="<?= ROOT_DIR ?>login">Login</a></li>
            <li><a href="<?= ROOT_DIR ?>register">Register</a></li>
        <?php else: ?>
            <!-- For logged-in users -->
            <li><a href="<?= ROOT_DIR ?>">Home</a></li>
            <li><a href="<?= ROOT_DIR ?>vinyl">Vinyl</a></li>
            <?php if ($_SESSION['is_admin'] == 1) : ?>
                <li><a href="<?= ROOT_DIR ?>admin">Admin Dash</a></li>
                <li><a href="<?= ROOT_DIR ?>pending">Pending Uploads</a></li>
                <li><a href="<?= ROOT_DIR ?>allUsers">Users</a></li>
            <?php else : ?>
                <li><a href="<?= ROOT_DIR ?>user">User Dash</a></li>
                <li><a href="<?= ROOT_DIR ?>uploads">Upload Vinyl</a></li>
                <li><a href="<?= ROOT_DIR ?>account">Account Details</a></li>
            <?php endif; ?>
            <li><a href="<?= ROOT_DIR ?>logout">Logout</a></li>
        <?php endif; ?>
    </ul>
    <div class="menu-toggle" id="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>
