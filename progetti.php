<?php 
require_once 'utility.php'; 
use MyProject\Utilities\utility;

// Carica i progetti dal file JSON
$progetti = utility::loadJSON('progetti.json');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css">
    <link rel="stylesheet" href="./css/header.min.css">
    <link rel="stylesheet" href="./css/footer.min.css">
    <link rel="stylesheet" href="./css/progetti.min.css">
    <title>Jacopo Buttazzo - Progetti</title>
    <link rel="icon" type="image/x-icon" href="./img/my_logo/icona.png">
</head>

<body>
    <!-- Include header/menu -->
    <?php include 'menu.php'; ?>

    <main>
        <div class="container">
            <?php
            // Cicla attraverso i progetti e li visualizza dinamicamente
            foreach ($progetti as $progetto) {
                ?>
                <div class="card">
                    <h2><?php echo $progetto['title']; ?></h2>
                    <h3><?php echo $progetto['subtitle']; ?></h3>
                    <a href="<?php echo $progetto['link']; ?>">
                        <img src="<?php echo $progetto['image']; ?>" alt="Project <?php echo $progetto['id']; ?>">
                    </a>
                    <div class="overlay">
                        <a href="<?php echo $progetto['link']; ?>">
                            <h3><?php echo $progetto['overlay_text']; ?></h3>
                        </a>
                    </div>
                    <p><?php echo $progetto['summary']; ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </main>

    <!-- Include footer -->
    <?php include 'footer.php'; ?>
</body>

</html>
