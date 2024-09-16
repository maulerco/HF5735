<?php 

include_once '../config/dbConfig.php';

include_once "../includes/header.php";

?>

    <main class="login">
        <h2 class="header">LOGIN</h2>
        <p>
        <?php
                if (isset($_SESSION['status_message'])) {
                    echo '<div class="status-message">' . $_SESSION['status_message'] . '</div>';
                    unset($_SESSION['status_message']);
                }
            ?>
        </p>
        <section class="login-form">
            <form action="<?= ROOT_DIR ?>login/authenticate.php" method="post">
                <label for="username">Username</label>
                <input type="text"
                       class=""
                       name="username"
                       id="username"
                       value="<?php  if (isset($_COOKIE["username"])) {
                        echo $_COOKIE["username"];
                        }
                        else{
                        echo "";
                        } ?>">
                <label for="pswd">Password</label>
                <input type="password" class="" name="password" id="pswd" placeholder="">
                <input type="submit" class="submit">
            </form> 
            <div class="login-options">
                <div>
                    <a href="../register">Don't have an account? <span>REGISTER</span></a>
                </div>
            </div>
        </section>
    </main>
    <div class="msg"></div>
 
    


