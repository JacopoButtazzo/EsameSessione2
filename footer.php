<?php
require_once 'utility.php';
// Leggi il file JSON
$footerData = file_get_contents('footer.json');

// Decodifica il file JSON in un array PHP
$footer = json_decode($footerData, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css">
    <link rel="stylesheet" href="./css/header.min.css">
    <link rel="stylesheet" href="./css/footer.min.css">
    <title>Footer</title>
    <link rel="icon" type="image/x-icon" href="./img/my_logo/icona.png">
    
</head>

<body>
    <footer>
        <div class="cols">
            <!-- Colonna "About" -->
            <div class="about-col">
                <h3><?php echo $footer['about']['name']; ?></h3>
                <p><?php echo $footer['about']['description']; ?></p>
                <p class="vat"><?php echo $footer['about']['vat']; ?></p>
                <p class="cr"><?php echo $footer['about']['copyright']; ?></p>
            </div>

            <!-- Colonna "Useful Links" -->
            <div class="links-col">
                <h4>Useful Links</h4>
                <?php foreach ($footer['useful_links'] as $link): ?>
                    <a href="<?php echo $link['href']; ?>" title="<?php echo $link['title']; ?>">
                        <?php echo $link['label']; ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Colonna "Social Media" -->
            <div class="links-col">
                <h4>Social Media</h4>
                <?php foreach ($footer['social_links'] as $link): ?>
                    <a href="<?php echo $link['href']; ?>" title="<?php echo $link['title']; ?>">
                        <?php echo $link['label']; ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Pulsante "Hire Me" -->
            <a href="<?php echo $footer['hire_me']['href']; ?>" class="btn" title="<?php echo $footer['hire_me']['title']; ?>">
                <?php echo $footer['hire_me']['label']; ?>
            </a>
        </div>
    </footer>
</body>

</html>