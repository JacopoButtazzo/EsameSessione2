<?php 
require_once 'utility.php';
use MyProject\Utilities\utility;

// Percorso del file CSV
$csv_file = 'richieste_collaborazione.csv';

// Inizializza variabili di errore e di successo
$errors = [];
$success_message = "";

// Funzione di validazione lato server
function validateInput($data) {
    $errors = [];

    // Validazione nome (campo obbligatorio e minimo 2 caratteri)
    if (empty($data['name']) || strlen($data['name']) < 2) {
        $errors['name'] = "Il nome è obbligatorio e deve contenere almeno 2 caratteri.";
    }

    // Validazione cognome (campo obbligatorio e minimo 2 caratteri)
    if (empty($data['surname']) || strlen($data['surname']) < 2) {
        $errors['surname'] = "Il cognome è obbligatorio e deve contenere almeno 2 caratteri.";
    }

    // Validazione email (campo obbligatorio e formato valido)
    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'indirizzo email non è valido.";
    }

    // Validazione residenza (campo facoltativo ma con massimo 50 caratteri)
    if (!empty($data['residence']) && strlen($data['residence']) > 50) {
        $errors['residence'] = "L'indirizzo di residenza non può superare i 50 caratteri.";
    }

    // Validazione del messaggio (campo obbligatorio)
    if (empty($data['text']) || strlen($data['text']) < 10) {
        $errors['text'] = "Il campo del testo deve contenere almeno 10 caratteri.";
    }

    return $errors;
}

// Controlla se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Raccogle i dati del form
    $data = [
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'birthday' => $_POST['birthday'],
        'residence' => $_POST['residence'],
        'email' => $_POST['email'],
        'text' => $_POST['text'],
    ];

    // Validazione dati
    $errors = validateInput($data);

    // Se non ci sono errori, salva i dati nel file CSV
    if (empty($errors)) {
        utility::saveToCSV($csv_file, $data);
        $success_message = "La tua richiesta è stata inviata con successo!";
        
        // Resetta i valori del form in caso di successo
        $data = [];
    }
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
    <link rel="stylesheet" href="./css/form.min.css">
    <title>Jacopo Buttazzo - Hire me</title>
    <link rel="icon" type="image/x-icon" href="./img/my_logo/icona.png">
</head>

<body>
    <?php
    // Include il menu
    utility::includeMenu();
    ?>
    <main>
        <div class="container">
            <h3>Invia i tuoi dati per collaborare con me!</h3>

            <!-- Messaggio di successo -->
            <?php if (!empty($success_message)): ?>
                <p class="success"><?php echo $success_message; ?></p>
            <?php endif; ?>

            <!-- Visualizzazione errori -->
            <?php if (!empty($errors)): ?>
                <div class="error-messages">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="form">
                <form action="#" method="post">
                    <div class="row main-row">
                        <div class="col col1">
                            <fieldset>
                                <legend>Your infos</legend>
                                <label for="name">Name:<span>*</span></label>
                                <input type="text" id="name" name="name" placeholder="Text here your name.." required="required" value="<?php echo isset($data['name']) ? htmlspecialchars($data['name'], ENT_QUOTES) : ''; ?>">
                                <label for="surname">Surname:<span>*</span></label>
                                <input type="text" id="surname" name="surname" placeholder="Text here your surname.." required="required" value="<?php echo isset($data['surname']) ? htmlspecialchars($data['surname'], ENT_QUOTES) : ''; ?>">
                                <label for="birthday">Day of birth:</label>
                                <input type="date" id="birthday" name="birthday" value="<?php echo isset($data['birthday']) ? htmlspecialchars($data['birthday'], ENT_QUOTES) : ''; ?>">
                            </fieldset>
                        </div>
                        <div class="col col2">
                            <div class="row">
                                <fieldset>
                                    <legend>Contact</legend>
                                    <label for="residence">Residence:</label>
                                    <input type="text" id="residence" name="residence" placeholder="Text here your address.." maxlength="50" size="55" value="<?php echo isset($data['residence']) ? htmlspecialchars($data['residence'], ENT_QUOTES) : ''; ?>">
                                    <label for="email">E-mail:<span>*</span></label>
                                    <input type="email" id="email" name="email" required="required" placeholder="Text here your e-mail.." value="<?php echo isset($data['email']) ? htmlspecialchars($data['email'], ENT_QUOTES) : ''; ?>">
                                </fieldset>
                            </div>
                            <div class="row">
                                <fieldset>
                                    <legend>More</legend>
                                    <label for="text">Summarize your proposal here<span>*</span></label>
                                    <textarea name="text" id="text" placeholder="Be as brief as possible :)" required="required"><?php echo isset($data['text']) ? htmlspecialchars($data['text'], ENT_QUOTES) : ''; ?></textarea>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="buttons">
                        <button type="reset">Reset</button>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- Include footer -->
    <?php utility::includeFooter(); ?>
</body>
</html>
