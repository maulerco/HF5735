<?php
    session_start();

    $anchorText = "Go back to fill the data in";
    $anchorLink = "index.php";
    include "../includes/header.php";

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
    <?php if ($firstName): ?>
        <div class="welcomeContent">
            <h1>Welcome back, <?php echo htmlspecialchars($lastName); ?> <?php echo htmlspecialchars($firstName); ?>!</h1>
            <p>We are about to send you an email to your address <?php echo htmlspecialchars($email) ?> with tickets to your favourite film - <?php echo htmlspecialchars($favFilm) ?></p>
            <p>Remember to wear your favourite <?php echo htmlspecialchars($favColour) ?> colour!</p>
            <p>We've got your favourite Ice Cream - <?php echo htmlspecialchars($favIceCream) ?> in our buffett along with the <?php echo htmlspecialchars($popcornPreference) ?> popcorn!</p>
        </div>
    <?php else: ?>
        <p>No name found in session. Please go back and enter your data.</p>
    <?php endif; ?> 
</main>

<?php
    include "../includes/footer.php";
?> 