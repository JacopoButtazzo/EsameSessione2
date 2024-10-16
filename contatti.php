<?php require_once 'utility.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css">
    <link rel="stylesheet" href="./css/header.min.css">
    <link rel="stylesheet" href="./css/footer.min.css">
    <link rel="stylesheet" href="./css/contatti.min.css">
    <title>Jacopo Buttazzo - Contatti</title>
    <link rel="icon" type="image/x-icon" href="./img/my_logo/icona.png">
</head>

<body>
    <?php
    // Include il menu
    include 'menu.php';

    // Leggi i dati da contatti.json
    $json_data = file_get_contents('contatti.json');
    $contatti = json_decode($json_data, true);
    ?>
    <main>
        <div class="riga-main">
            <div class="colonna-main">
                <section class="indirizzo">
                    <h4><?php echo $contatti['address']['label']; ?></h4>
                    <a href="<?php echo $contatti['address']['maps_link']; ?>" title="MyAddress">
                        <?php echo $contatti['address']['location']; ?>
                    </a>
                </section>
            </div>
            <div class="colonna-main">
                <section class="contatti">
                    <h4><?php echo $contatti['contacts']['label']; ?></h4>
                    <p>
                        <a href="mailto:<?php echo $contatti['contacts']['email']; ?>?subject=<?php echo urlencode($contatti['contacts']['email_subject']); ?>&body=<?php echo urlencode($contatti['contacts']['email_body']); ?>"
                            title="Send Me A Mail">
                            <?php echo $contatti['contacts']['email']; ?>
                        </a>
                    </p>
                    <p><?php echo $contatti['contacts']['phone']; ?></p>
                </section>
            </div>
            <div class="colonna-main">
                <section class="social">
                    <h4><?php echo $contatti['social']['label']; ?></h4>
                    <ul class="socialnetwork">
                        <?php foreach ($contatti['social']['links'] as $social): ?>
                            <li><a href="<?php echo $social['url']; ?>" title="My<?php echo $social['name']; ?>"><?php echo $social['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            </div>
            <div class="colonna-main">
                <section class="policy">
                    <h4><?php echo $contatti['policy']['label']; ?></h4>
                    <ul class="policy-link">
                        <?php foreach ($contatti['policy']['links'] as $policy): ?>
                            <li><a href="<?php echo $policy['url']; ?>" title="Go to <?php echo $policy['name']; ?> page"><?php echo $policy['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            </div>
        </div>
    </main>
    <!-- Include footer -->
    <?php include 'footer.php'; ?>
</body>

</html>