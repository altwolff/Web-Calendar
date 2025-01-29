<?php
$selected_lang = isset($_GET['lang']) ? $_GET['lang'] : 'de';
if ($selected_lang == 'en') {
    require 'english.php';
} elseif ($selected_lang == 'pl') {
    require 'polski.php';
} else {
    require 'deutsch.php';
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
<div class="calendar m-auto">
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
    <button id="languageButton" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
        <span id="selectedLanguage">
        <img src="at.png" alt="at_flag" class="me-2" style="height: 1em;"> Österreich
      </span>
    </button>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item d-flex align-items-center" href="?lang=pl">
                <img src="pl.png" alt="pl_flag" class="me-2" style="height: 1em;"> Polska
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="?lang=en">
                <img src="ie.png" alt="ie_flag" class="me-2" style="height: 1em;"> Ireland
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="?lang=de">
                <img src="at.png" alt="at_flag" class="me-2" style="height: 1em;"> Österreich
            </a>
        </li>
    </ul>
</div>
<div class="modal fade" id="holidayModal" tabindex="-1" aria-labelledby="holidayModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="holidayModalLabel"><?php echo $modal; ?> &#x1F3D6;</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="holidayInfo"></p>
            </div>
        </div>
    </div>
</div>
<script>
    const currentLanguage = '<?php echo $html_lang; ?>';
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="calendar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>