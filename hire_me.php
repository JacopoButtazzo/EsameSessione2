<?php
require_once 'utility.php';

use MyProject\Utilities\utility;

// Percorso del file CSV
$csv_file = 'richieste_collaborazione.csv';

// Inizializza variabili di errore e di successo
$errors = [];
$success_message = "";

// Funzione di validazione lato server
function validateInput($data)
{
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
<html lang="it">

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

            <div class="form">
                <form id="collaboration-form" action="#" method="post">
                    <div class="row main-row">
                        <div class="col col1">
                            <fieldset>
                                <legend>Your infos</legend>
                                <label for="name">Name:<span>*</span></label>
                                <input type="text" id="name" name="name" placeholder="Text here your name.." required>

                                <label for="surname">Surname:<span>*</span></label>
                                <input type="text" id="surname" name="surname" placeholder="Text here your surname.." required>

                                <label for="birthday">Day of birth:</label>
                                <input type="date" id="birthday" name="birthday">
                            </fieldset>
                        </div>
                        <div class="col col2">
                            <fieldset>
                                <legend>Contact</legend>
                                <label for="residence">Residence:</label>
                                <input type="text" id="residence" name="residence" placeholder="Text here your address.." maxlength="50">

                                <label for="email">E-mail:<span>*</span></label>
                                <input type="email" id="email" name="email" placeholder="Text here your e-mail.." required>
                            </fieldset>

                            <fieldset>
                                <legend>More</legend>
                                <label for="text">Summarize your proposal here<span>*</span></label>
                                <textarea name="text" id="text" placeholder="Be as brief as possible :)" required></textarea>
                            </fieldset>
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

    <!-- Script JS per validazione lato client -->
    <script>
        document.getElementById("collaboration-form").addEventListener("submit", function(event) {
            // Prevenire l'invio del form finché non è validato
            let isValid = true;

            // Elementi del form
            const name = document.getElementById("name");
            const surname = document.getElementById("surname");
            const email = document.getElementById("email");
            const residence = document.getElementById("residence");
            const textArea = document.getElementById("text");

            // Rimuovi messaggi di errore precedenti
            document.querySelectorAll(".error-text").forEach(el => el.remove());

            // Funzione di aggiunta messaggi di errore
            function showError(input, message) {
                const errorElement = document.createElement("p");
                errorElement.className = "error-text";
                errorElement.style.color = "red";
                errorElement.textContent = message;
                input.insertAdjacentElement("afterend", errorElement);
                isValid = false;
            }

            // Validazione nome
            if (name.value.trim().length < 2) {
                showError(name, "Il nome deve contenere almeno 2 caratteri.");
            }

            // Validazione cognome
            if (surname.value.trim().length < 2) {
                showError(surname, "Il cognome deve contenere almeno 2 caratteri.");
            }

            // Validazione email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value.trim())) {
                showError(email, "Inserisci un indirizzo email valido.");
            }

            // Validazione residenza (se inserita)
            if (residence.value.trim().length > 50) {
                showError(residence, "L'indirizzo di residenza non può superare i 50 caratteri.");
            }

            // Validazione testo della proposta
            if (textArea.value.trim().length < 10) {
                showError(textArea, "Il campo deve contenere almeno 10 caratteri.");
            }

            // Blocca invio se ci sono errori
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>