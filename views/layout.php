<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Norbus - Réservation de trajets en bus</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">

</head>
<body>
    <div id="page">
        <?= require_once VIEWS . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "navbar.php";?>

        <div class="content">
            <?= $content ?>
        </div>
        <footer>
            Copyright 2022 Victor Krupka
            <a href="<?= ROOT . '/database/faker.php' ?>">Faker</a>
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