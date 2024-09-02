<?php
    session_start();

    $anchorText = "Jump straight to our Welcome page!";
    $anchorLink = "welcome.php";
    include "../includes/header.php";

    $cookie_expiration = time() + (60 * 2);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Store the name in the session
        $_SESSION["firstName"] = $_POST["firstName"];
        setcookie("firstName", $_POST["firstName"], $cookie_expiration, "/");

        $_SESSION["lastName"] = $_POST["lastName"];
        setcookie("lastName", $_POST["lastName"], $cookie_expiration, "/");

        $_SESSION["email"] = $_POST["email"];
        setcookie("email", $_POST["email"], $cookie_expiration, "/");

        $_SESSION["favColour"] = $_POST["favColour"];
        setcookie("favColour", $_POST["favColour"], $cookie_expiration, "/");

        $_SESSION["favFilm"] = $_POST["favFilm"];
        setcookie("favFilm", $_POST["favFilm"], $cookie_expiration, "/");

        $_SESSION["favIceCream"] = $_POST["favIceCream"];
        setcookie("favIceCream", $_POST["favIceCream"], $cookie_expiration, "/");

        $_SESSION["popcornPreference"] = $_POST["popcornPreference"];
        setcookie("popcornPreference", $_POST["popcornPreference"], $cookie_expiration, "/");
    }
    
    // // Check if the name is set in the session
    // $firstName = isset($_SESSION["firstName"]) ? $_SESSION["firstName"] : "";
    // $lastName = isset($_SESSION["lastName"]) ? $_SESSION["lastName"] : "";
    // $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
    // $favColour = isset($_SESSION["favColour"]) ? $_SESSION["favColour"] : "";
    // $favFilm = isset($_SESSION["favFilm"]) ? $_SESSION["favFilm"] : "";
    // $favIceCream = isset($_SESSION["favIceCream"]) ? $_SESSION["favIceCream"] : "";
    // $popcornPreference = isset($_SESSION["popcornPreference"]) ? $_SESSION["popcornPreference"] : "";

    if (isset($_SESSION["firstName"])) {
        $firstName = $_SESSION["firstName"];
    } elseif (isset($_COOKIE["firstName"])) {
        // If session is not set but the cookie exists, restore the session
        $firstName = $_COOKIE["firstName"];
        $_SESSION["firstName"] = $firstName; // Reinitialize the session with the cookie value
    } else {
        $firstName = "";
    }

    if (isset($_SESSION["lastName"])) {
        $lastName = $_SESSION["lastName"];
    } elseif (isset($_COOKIE["lastName"])) {
        // If session is not set but the cookie exists, restore the session
        $lastName = $_COOKIE["lastName"];
        $_SESSION["lastName"] = $lastName; // Reinitialize the session with the cookie value
    } else {
        $lastName = "";
    }

    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];
    } elseif (isset($_COOKIE["email"])) {
        // If session is not set but the cookie exists, restore the session
        $email = $_COOKIE["email"];
        $_SESSION["email"] = $email; // Reinitialize the session with the cookie value
    } else {
        $email = "";
    }

    if (isset($_SESSION["favColour"])) {
        $favColour = $_SESSION["favColour"];
    } elseif (isset($_COOKIE["favColour"])) {
        // If session is not set but the cookie exists, restore the session
        $favColour = $_COOKIE["favColour"];
        $_SESSION["favColour"] = $favColour; // Reinitialize the session with the cookie value
    } else {
        $favColour = "";
    }

    if (isset($_SESSION["favFilm"])) {
        $favFilm = $_SESSION["favFilm"];
    } elseif (isset($_COOKIE["favFilm"])) {
        // If session is not set but the cookie exists, restore the session
        $favFilm = $_COOKIE["favFilm"];
        $_SESSION["favFilm"] = $favFilm; // Reinitialize the session with the cookie value
    } else {
        $favFilm = "";
    }

    if (isset($_SESSION["favIceCream"])) {
        $favIceCream = $_SESSION["favIceCream"];
    } elseif (isset($_COOKIE["favIceCream"])) {
        // If session is not set but the cookie exists, restore the session
        $favIceCream = $_COOKIE["favIceCream"];
        $_SESSION["favIceCream"] = $favIceCream; // Reinitialize the session with the cookie value
    } else {
        $favIceCream = "";
    }

    if (isset($_SESSION["popcornPreference"])) {
        $popcornPreference = $_SESSION["popcornPreference"];
    } elseif (isset($_COOKIE["popcornPreference"])) {
        // If session is not set but the cookie exists, restore the session
        $popcornPreference = $_COOKIE["popcornPreference"];
        $_SESSION["popcornPreference"] = $popcornPreference; // Reinitialize the session with the cookie value
    } else {
        $popcornPreference = "";
    }
?> 
<main>
    <form action="" method="POST">
        <!-- first name input -->
        <div class="form__element">
            <label for="firstName">Enter your name:</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>
        <!-- second name input -->
        <div class="form__element">
            <label for="lastName">Enter your last name:</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>
        <!-- email input -->
        <div class="form__element">
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <!-- password input -->
        <div class="form__element">
            <label for="password">Enter your password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <!-- favourite colour input -->
        <div class="form__element">
            <label for="favColour">Let us know your favourite colour:</label>
            <input type="text" id="favColour" name="favColour" required>
        </div>
        <!-- favourite film input -->
        <div class="form__element">
            <label for="favFilm">Tell us what is your favourite film:</label>
            <input type="text" id="favFilm" name="favFilm" required>
        </div>
        <!-- favourite ice cream input -->
        <div class="form__element">
            <label for="favIceCream">Tell us what is your favourite ice cream:</label>
            <input type="text" id="favIceCream" name="favIceCream" required>
        </div>
        <!-- sweet or salty popcorn input -->
        <div class="form__element">
            <fieldset>
                <legend>Do you prefer sweet or salty popcorn?</legend>

                <div>
                    <input type="radio" id="sweetPopcorn" name="popcornPreference" value="sweet" checked>
                    <label for="sweetPopcorn">Sweet</label>
                </div>

                <div>
                    <input type="radio" id="saltyPopcorn" name="popcornPreference" value="salty">
                    <label for="saltyPopcorn">Salty</label>
                </div>
            </fieldset>
        </div>
        <button type="submit">Submit</button>
    </form>
</main>

<?php
    include "../includes/footer.php";
?> 