<?php 
require_once 'utility.php'; 
use MyProject\Utilities\utility;

// Carica i progetti dal file JSON
$progetti = utility::loadJSON('progetti.json');

// Ottiene l'ID del progetto dall'URL
$progetto_id = isset($_GET['id']) ? (int)$_GET['id'] : 1; // Default al progetto 1 se non specificato

// Trova il progetto con l'ID corrispondente
$progetto_scelto = null;
foreach ($progetti as $progetto) {
    if ($progetto['id'] === $progetto_id) {
        $progetto_scelto = $progetto;
        break;
    }
}

// Se non viene trovato un progetto con l'ID specificato, mostra un errore
if (!$progetto_scelto) {
    die("Progetto non trovato");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css">
    <link rel="stylesheet" href="./css/header.min.css">
    <link rel="stylesheet" href="./css/footer.min.css">
    <link rel="stylesheet" href="./css/singolo_progetto.min.css">
    <title>Jacopo Buttazzo - <?php echo $progetto_scelto['title']; ?></title>
    <link rel="icon" type="image/x-icon" href="./img/my_logo/icona.png">
</head>

<body>
    <?php
    // Include il menu
    include 'menu.php';
    ?>
    <main>
        <div class="card">
            <!-- h2 dinamico -->
            <h2><?php echo $progetto_scelto['title']; ?></h2>
            <!-- h3 dinamico -->
            <h3><?php echo $progetto_scelto['subtitle']; ?></h3>
            <!-- Video dinamico -->
            <div class="video">
                <video src="<?php echo $progetto_scelto['video']; ?>" autoplay loop muted controls></video>
            </div>
            <!-- h4 dinamico -->
            <h4><?php echo $progetto_scelto['header']; ?></h4>
            <!-- p dinamico (descrizione) -->
            <p><?php echo $progetto_scelto['description']; ?></p>
        </div>
    </main>
    <!-- Include footer -->
    <?php include 'footer.php'; ?>
</body>

</html>
