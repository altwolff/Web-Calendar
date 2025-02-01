<?php
$html_lang = 'pl';
$title = 'Kalendarz';
$modal = 'Dzień Wolny od Pracy';
$weekdays = [
    'Pn',
    'Wt',
    'Śr',
    'Cz',
    'Pt',
    'So',
    'Nd'
];
function getPublicHolidays($year)
{
    $holidays = [
        "Nowy Rok" => date("Y-m-d", strtotime("$year-01-01")),
        "Trzech Króli (Objawienie Pańskie)" => date("Y-m-d", strtotime("$year-01-06")),
        "Wielkanoc" => date("Y-m-d", strtotime("+1 days", easter_date($year))),
        "Poniedziałek Wielkanocny" => date("Y-m-d", strtotime("+2 days", easter_date($year))),
        "Święto Państwowe (Święto Pracy)" => date("Y-m-d", strtotime("$year-05-01")),
        "Święto Konstytucji 3 Maja" => date("Y-m-d", strtotime("$year-05-03")),
        "Zesłanie Ducha Świętego (Zielone Świątki)" => date("Y-m-d", strtotime("+50 days", easter_date($year))),
        "Boże Ciało" => date("Y-m-d", strtotime("+61 days", easter_date($year))),
        "Wniebowzięcie Najświętszej Maryi Panny (Święto Wojska Polskiego)" => date("Y-m-d", strtotime("$year-08-15")),
        "Wszystkich Świętych" => date("Y-m-d", strtotime("$year-11-01")),
        "Narodowe Święto Niepodległości" => date("Y-m-d", strtotime("$year-11-11")),
        "Wigilia Bożego Narodzenia" => date("Y-m-d", strtotime("$year-12-24")),
        "Pierwszy Dzień Bożego Narodzenia" => date("Y-m-d", strtotime("$year-12-25")),
        "Drugi Dzień Bożego Narodzenia" => date("Y-m-d", strtotime("$year-12-26"))
    ];
    $result = [];
    foreach ($holidays as $name => $date) {
        $result[] = ['name' => $name, 'date' => $date];
    }
    return $result;
}

$holidays = getPublicHolidays(date("Y"));
echo "<script>var holidays = " . json_encode($holidays) . ";</script>";