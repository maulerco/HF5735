<?php
include 'config/dbConfig.php';
    include 'includes/header.php';

    $album = $conn->prepare("SELECT
    albName,
    albDescription,
    release_date,
    image
    FROM album");
    $album->execute();
    $album->store_result();
    $album->bind_result($albName, $albDesc, $release, $image);
?>
    <h1>Vinyl Page</h1>

<main class="vinyl">
    <?php while($album->fetch()) : ?>
    <div>
        <h2><?= $albName ?></h2>
        <img src="<?= ROOT_DIR ?>assets/img/<?= $image ?>" alt="" >
        <h2><?= $albDesc ?></h2>
        <span><?= $release ?></span>
    </div>
    <?php endwhile ?>
</main>

<?php
    include 'includes/footer.php';
?>