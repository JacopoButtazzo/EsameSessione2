<?php
require_once 'utility.php';

// Leggi il file JSON con controllo errori
$footerData = file_get_contents('footer.json');
if ($footerData === false) {
    echo "Errore nel caricamento del file JSON.";
    exit;
}

$footer = json_decode($footerData, true);
if ($footer === null) {
    echo "Errore nella decodifica del file JSON.";
    exit;
}
?>

<footer>
    <div class="cols">
        <!-- Colonna "About" -->
        <div class="about-col">
            <h3><?php echo htmlspecialchars($footer['about']['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <p><?php echo htmlspecialchars($footer['about']['description'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="vat"><?php echo htmlspecialchars($footer['about']['vat'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="cr"><?php echo htmlspecialchars($footer['about']['copyright'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>

        <!-- Colonna "Useful Links" -->
        <div class="links-col">
            <h4>Useful Links</h4>
            <?php foreach ($footer['useful_links'] as $link): ?>
                <a href="<?php echo htmlspecialchars($link['href'], ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($link['title'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8'); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Colonna "Social Media" -->
        <div class="links-col">
            <h4>Social Media</h4>
            <?php foreach ($footer['social_links'] as $link): ?>
                <a href="<?php echo htmlspecialchars($link['href'], ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($link['title'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8'); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Pulsante "Hire Me" -->
        <a href="<?php echo htmlspecialchars($footer['hire_me']['href'], ENT_QUOTES, 'UTF-8'); ?>" class="btn" title="<?php echo htmlspecialchars($footer['hire_me']['title'], ENT_QUOTES, 'UTF-8'); ?>">
            <?php echo htmlspecialchars($footer['hire_me']['label'], ENT_QUOTES, 'UTF-8'); ?>
        </a>
    </div>
</footer>
