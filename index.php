<?php
$selected_lang = isset($_GET['lang']) ? $_GET['lang'] : 'pl';
if ($selected_lang == 'en') {
    require 'english.php';
} elseif ($selected_lang == 'de') {
    require 'deutsch.php';
} else {
    require 'polski.php';
}
?>

<!DOCTYPE html>
<html lang="<?php echo $html_lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="1F4C5_color.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title><?php echo $title; ?> | @altwolff</title>
</head>

<body>
<div class="calendar">
    <div class="header">
        <button id="prev">
            <i class="bi bi-arrow-left-square"></i>
        </button>
        <div class="monthYear" id="monthYear"></div>
        <button id="next">
            <i class="bi bi-arrow-right-square"></i>
        </button>
    </div>
    <div class="days">
        <?php foreach ($weekdays as $weekday): ?>
            <div class="day"><?php echo $weekday; ?></div>
        <?php endforeach; ?>
    </div>
    <div class="dates" id="dates"></div>
</div>

<div class="dropdown">
    <button id="languageButton" class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
        <?php echo $lang_menu; ?> <i class="bi bi-translate"></i>
    </button>
    <ul class="dropdown-menu w-100">
        <li>
            <a class="dropdown-item d-flex align-items-center" href="?lang=pl">
                <img src="pl.svg" alt="pl_flag" height="15px" class="me-2"> Polski
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="?lang=en">
                <img src="en.svg" alt="en_flag" height="15px" class="me-2"> English
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="?lang=de">
                <img src="at.svg" alt="at_flag" height="15px" class="me-2"> Deutsch
            </a>
        </li>
    </ul>
</div>
<script>
    const currentLanguage = '<?php echo $html_lang; ?>';
</script>
<script src="calendar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>