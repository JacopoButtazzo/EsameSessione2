<?php
/**
 * @author Jacopo Buttazzo
 * @version 1.0.0
 */
namespace MyProject\Utilities;
class utility
{
    // Funzione per caricare dati da un file JSON
    public static function loadJSON($filepath)
    {
        if (file_exists($filepath)) {
            $json_data = file_get_contents($filepath);
            return json_decode($json_data, true);
        } else {
            return null;
        }
    }

    // Funzione per salvare i dati nel file JSON
    public static function saveToJSON($filepath, $data)
    {
        // Carica i dati esistenti
        $existing_data = self::loadJSON($filepath);

        // Aggiungi i nuovi dati a quelli esistenti
        $existing_data[] = $data;

        // Salva i dati nel file JSON
        file_put_contents($filepath, json_encode($existing_data, JSON_PRETTY_PRINT));
    }

    // Funzione per salvare i dati nel file CSV
    public static function saveToCSV($file, $data) {
        // Se il file non esiste, lo crea e aggiunge l'intestazione
        $is_new_file = !file_exists($file);

        // Apri il file in modalità "append"
        $handle = fopen($file, 'a');

        if ($handle === false) {
            throw new \Exception("Impossibile aprire il file CSV per scrivere.");
        }

        // Se il file è nuovo, scrivi l'intestazione
        if ($is_new_file) {
            fputcsv($handle, ['Name', 'Surname', 'Birthday', 'Residence', 'Email', 'Text']);
        }

        // Scrivi i dati nel file CSV
        fputcsv($handle, [
            $data['name'],
            $data['surname'],
            $data['birthday'] ?? '',
            $data['residence'] ?? '',
            $data['email'],
            $data['text']
        ]);

        // Chiudi il file
        fclose($handle);
    }

    // Funzione per includere il menu dinamicamente
    public static function includeMenu($menu_file = 'menu.php')
    {
        if (file_exists($menu_file)) {
            include $menu_file;
        } else {
            echo "<p>Menu non disponibile</p>";
        }
    }

    // Funzione per includere il footer dinamicamente
    public static function includeFooter($footer_file = 'footer.php')
    {
        if (file_exists($footer_file)) {
            include $footer_file;
        } else {
            echo "<p>Footer non disponibile</p>";
        }
    }

    // Funzione per generare i link social da un array
    public static function generateSocialLinks($social_links)
    {
        foreach ($social_links as $social) {
            echo "<li><a href='{$social['url']}' title='My{$social['name']}'>{$social['name']}</a></li>";
        }
    }

    // Funzione per generare i link delle policy da un array
    public static function generatePolicyLinks($policy_links)
    {
        foreach ($policy_links as $policy) {
            echo "<li><a href='{$policy['url']}' title='Go to {$policy['name']} page'>{$policy['name']}</a></li>";
        }
    }

    // Funzione per generare il link dei progetti con parametri dinamici
    public static function generateProjectLink($project_id, $project_name, $project_description)
    {
        echo "<h2>PROJECT.. ($project_id)</h2>";
        echo "<h3>$project_name</h3>";
        echo "<h4>$project_description</h4>";
    }

    // Funzione per creare l'elemento video per un progetto
    public static function createProjectVideo($video_src)
    {
        echo "<div class='video'>";
        echo "<video src='$video_src' autoplay loop muted controls></video>";
        echo "</div>";
    }

    // Funzione per generare il contatto email con soggetto e corpo dinamici
    public static function generateMailLink($email, $subject, $body)
    {
        $encoded_subject = urlencode($subject);
        $encoded_body = urlencode($body);
        echo "<p><a href='mailto:$email?subject=$encoded_subject&body=$encoded_body' title='Send Me A Mail'>$email</a></p>";
    }

}
