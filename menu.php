<?php
require_once 'utility.php';
// Leggi il file JSON
$menuData = file_get_contents('menu.json');

// Decodifica il file JSON in un array PHP
$menu = json_decode($menuData, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css">
    <link rel="stylesheet" href="./css/header.min.css">
    <link rel="stylesheet" href="./css/footer.min.css">
    <link rel="stylesheet" href="./css/home.min.css">
    <title>Jacopo Buttazzo - Home</title>
    <link rel="icon" type="image/x-icon" href="./img/my_logo/icona.png">
</head>

<body>
    <header>
        <div class="nav">
            <nav>
                <!-- Logo -->
                <div class="nav-logo">
                    <a href="<?php echo $menu['items'][0]['href']; ?>" title="Home">
                        <img src="<?php echo $menu['logo']; ?>" alt="logo-home" class="logo">
                    </a>
                </div>

                <!-- Links del menu -->
                <div class="nav-button">
                    <?php foreach ($menu['items'] as $item): ?>
                        <div class="links">
                            <a href="<?php echo $item['href']; ?>" title="<?php echo $item['title']; ?>"><?php echo $item['label']; ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pulsante "Hire Me" -->
                <div class="nav-hire-me">
                    <a href="<?php echo $menu['hire_me']['href']; ?>" class="btn" title="<?php echo $menu['hire_me']['title']; ?>">
                        <?php echo $menu['hire_me']['label']; ?>
                    </a>
                </div>
            </nav>

            <!-- Versione mobile del menu -->
            <nav class="hm">
                <input id="control" type="checkbox">
                <label class="label-control" for="control">
                    <span></span>
                </label>
                <a href="<?php echo $menu['items'][0]['href']; ?>" title="Home" class="logo_space">
                    <img src="<?php echo $menu['logo']; ?>" alt="logo-home" class="logo">
                </a>
                <ul id="menu">
                    <?php foreach ($menu['items'] as $item): ?>
                        <li><a href="<?php echo $item['href']; ?>" class="menuvoices" title="<?php echo $item['title']; ?>"><?php echo $item['label']; ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="<?php echo $menu['hire_me']['href']; ?>" class="menuvoices" title="<?php echo $menu['hire_me']['title']; ?>">
                            <?php echo $menu['hire_me']['label']; ?>
                        </a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>