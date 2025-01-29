<?php
$html_lang = 'de';
$title = 'Kalender';
$modal = 'Feiertag';
$weekdays = [
    'Mo',
    'Di',
    'Mi',
    'Do',
    'Fr',
    'Sa',
    'So'
];
function getPublicHolidays($year)
{
    $holidays = [
        "Neujahr" => date("Y-m-d", strtotime("$year-01-01")),
        "Heilige Drei Könige" => date("Y-m-d", strtotime("$year-01-06")),
        "Ostermontag" => date("Y-m-d", strtotime("+2 days", easter_date($year))),
        "Staatsfeiertag" => date("Y-m-d", strtotime("$year-05-01")),
        "Christi Himmelfahrt" => date("Y-m-d", strtotime("+40 days", easter_date($year))),
        "Pfingstmontag" => date("Y-m-d", strtotime("+51 days", easter_date($year))),
        "Fronleichnam" => date("Y-m-d", strtotime("+61 days", easter_date($year))),
        "Mariä Himmelfahrt" => date("Y-m-d", strtotime("$year-08-15")),
        "Nationalfeiertag" => date("Y-m-d", strtotime("$year-10-26")),
        "Allerheiligen" => date("Y-m-d", strtotime("$year-11-01")),
        "Mariä Empfängnis" => date("Y-m-d", strtotime("$year-12-08")),
        "Christtag" => date("Y-m-d", strtotime("$year-12-25")),
        "Stefanitag" => date("Y-m-d", strtotime("$year-12-26"))
    ];
    $result = [];
    foreach ($holidays as $name => $date) {
        $result[] = ['name' => $name, 'date' => $date];
    }
    return $result;
}

$holidays = getPublicHolidays(date("Y"));
echo "<script>var holidays = " . json_encode($holidays) . ";</script>";