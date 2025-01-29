<?php
$html_lang = 'en';
$title = 'Calendar';
$modal = 'Public Holiday';
$weekdays = [
    'Mo',
    'Tu',
    'We',
    'Th',
    'Fr',
    'Sa',
    'Su'
];
function getPublicHolidays($year)
{
    $holidays = [
        "New Year's Day" => date("Y-m-d", strtotime("$year-01-01")),
        "St. Patrick's Day" => date("Y-m-d", strtotime("$year-03-17")),
        "Easter Monday" => date("Y-m-d", strtotime("+2 days", easter_date($year))),
        "May Bank Holiday" => date("Y-m-d", strtotime("first monday of may $year")),
        "June Bank Holiday" => date("Y-m-d", strtotime("first monday of june $year")),
        "August Bank Holiday" => date("Y-m-d", strtotime("first monday of august $year")),
        "October Bank Holiday" => date("Y-m-d", strtotime("last monday of october $year")),
        "Christmas Day" => date("Y-m-d", strtotime("$year-12-25")),
        "St. Stephen's Day" => date("Y-m-d", strtotime("$year-12-26"))
    ];
    $stBrigidsDay = date("Y-m-d", strtotime("first monday of february $year"));
    if (date("w", strtotime("$year-02-01")) == 5) { // If Feb 1st is a Friday
        $stBrigidsDay = "$year-02-01";
    }
    $holidays["St. Brigid's Day"] = $stBrigidsDay;

    $result = [];
    foreach ($holidays as $name => $date) {
        $result[] = ['name' => $name, 'date' => $date];
    }
    return $result;
}

$holidays = getPublicHolidays(date("Y"));
echo "<script>var holidays = " . json_encode($holidays) . ";</script>";