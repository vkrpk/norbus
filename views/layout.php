<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Norbus - Réservation de trajets en bus</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
    <script defer src="<?= SCRIPTS . 'assets' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'main.js'?>"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div id="page">
        <?= require_once VIEWS . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "navbar.php";?>
        <div class="container">
            <div class="content">
                <?= $content ?>
            </div>
        </div>
            <footer>
                Copyright <?php echo date("Y"); ?>
            </footer>
            <script>
                $(window).scroll(function() {
                    if ($(document).scrollTop() > 50) {
                        $('.nav').addClass('affix');
                    } else {
                        $('.nav').removeClass('affix');
                    }
                });

                $(".navTrigger").click(function () {
                $(this).toggleClass("active");
                $("#mainListDiv").toggleClass("show_list");
                $("#mainListDiv").fadeIn();
            });
            </script>
    </div>
</body>
</html>