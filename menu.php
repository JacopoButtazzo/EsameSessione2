<?php
require_once 'utility.php';

// Leggi il file JSON con controllo errori
$menuData = file_get_contents('menu.json');
if ($menuData === false) {
    echo "Errore nel caricamento del file JSON.";
    exit;
}

$menu = json_decode($menuData, true);
if ($menu === null) {
    echo "Errore nella decodifica del file JSON.";
    exit;
}
?>

<header>
    <div class="nav">
        <nav>
            <!-- Logo -->
            <div class="nav-logo">
                <a href="<?php echo htmlspecialchars($menu['items'][0]['href'], ENT_QUOTES, 'UTF-8'); ?>" title="Home">
                    <img src="<?php echo htmlspecialchars($menu['logo'], ENT_QUOTES, 'UTF-8'); ?>" alt="logo-home" class="logo">
                </a>
            </div>

            <!-- Links del menu -->
            <div class="nav-button">
                <?php foreach ($menu['items'] as $item): ?>
                    <div class="links">
                        <a href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pulsante "Hire Me" -->
            <div class="nav-hire-me">
                <a href="<?php echo htmlspecialchars($menu['hire_me']['href'], ENT_QUOTES, 'UTF-8'); ?>" class="btn" title="<?php echo htmlspecialchars($menu['hire_me']['title'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($menu['hire_me']['label'], ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </div>
        </nav>

        <!-- Versione mobile del menu -->
        <nav class="hm">
            <input id="control" type="checkbox">
            <label class="label-control" for="control">
                <span></span>
            </label>
            <a href="<?php echo htmlspecialchars($menu['items'][0]['href'], ENT_QUOTES, 'UTF-8'); ?>" title="Home" class="logo_space">
                <img src="<?php echo htmlspecialchars($menu['logo'], ENT_QUOTES, 'UTF-8'); ?>" alt="logo-home" class="logo">
            </a>
            <ul id="menu">
                <?php foreach ($menu['items'] as $item): ?>
                    <li>
                        <a href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>" class="menuvoices" title="<?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li>
                    <a href="<?php echo htmlspecialchars($menu['hire_me']['href'], ENT_QUOTES, 'UTF-8'); ?>" class="menuvoices" title="<?php echo htmlspecialchars($menu['hire_me']['title'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($menu['hire_me']['label'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
