<?php
$page = "home page";
$background = "https://placehold.co/400";
include '../includes/header.php';
include '../includes/heading.php';
$name = "Peter";
$age = 21;
$bool = TRUE;

?>

<header>
    <p>Hi my name is <?= $name ?> and I am <?= $age ?></p>
</header>

<?php
include '../includes/footer.php';
?>