<?php
include 'utility.php';
// Include il menu
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jacopo Buttazzo - Home</title>
    <link rel="stylesheet" href="./css/style.min.css">
    <link rel="stylesheet" href="./css/header.min.css">
    <link rel="stylesheet" href="./css/footer.min.css">
    <link rel="stylesheet" href="./css/home.min.css">
    
</head>

<body>
    <main>
        <div class="heading">
            <h4>Hi, I Am <span class="animate__animated animate__pulse">Jacopo Buttazzo</span> 👋</h4>
            <p class="title">Creative FullStack Web Developer</p>
            <p class="subtitle">I love Design And Code, come and find out!</p>
            <img src="./img/coding2.png" alt="coding-image">
        </div>
        <h5 class="separator">Who I Am</h5>
        <div class="about">
            <img src="./img/Me/me_color.png" alt="pic-of-me">
            <div class="info">
                <h3>About Me</h3>
                <p>My name is Jacopo and I am a 27 year old Italian boy. I have always loved both technology and
                    graphic arts since I was young: nowaday, I have finally fulfilled my dream of becoming a
                    programmer. Starting from now I want to be a winner!
                </p>
                <q cite="https://www.frasicelebri.it/frasi-di/nelson-mandela/">
                    A winner is a dreamer who has never given up.
                    - NELSON MANDELA
                </q>
                <div class="headingbutton">
                    <a href="./form.html" class="btn" title="Let's collaborate!">HIRE ME</a>
                </div>
            </div>
        </div>
        <h5 class="separator">My Skills</h5>
        <div class="skills">
            <div class="info">
                <h3>What My Programming Skills Include?</h3>
                <ul class="skill-list">
                    <li>
                        <h4>Design and development of websites/web applications.</h4>
                        <p>Creating code using programming languages ​​such as HTML, CSS and JavaScript for the
                            front end, and languages ​​such as PHP for the back end. All developed with various
                            frameworks such as Angular.</p>
                    </li>
                    <li>
                        <h4>Maintenance and updating of websites.</h4>
                        <p>Once a web application has been launched, I take care of ongoing maintenance and updates
                            to ensure it remains up to date, functional and secure.</p>
                    </li>
                    <li>
                        <h4>Test and debugging.</h4>
                        <p>Testing websites and applications to identify and fix any bugs or problems. SEO
                            optimization to improve visibility on search engines such as Google or Bing.</p>
                    </li>
                    <li>
                        <h4>User interface and user experience (UI/UX) design.</h4>
                        <p>I deal with user interface and user experience design, ensuring that the website or
                            application is easy to use and pleasant for the end user.</p>
                    </li>
                </ul>
            </div>
        </div>
    </main>

    <?php
    // Include il footer
    include 'footer.php';
    ?>
</body>

</html>