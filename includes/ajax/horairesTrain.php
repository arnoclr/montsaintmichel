<?php

$date = $_GET["date"];
$response = [];

if (isset($date)) {
    $table = array();
    // get the day and the month from $date
    $month = substr($date, 0, 2);
    $month = (int) $month;
    $day = substr($date, 3, 2);
    $day = (int) $day;
    $schedule = "Fermé";
   

    // get the month name
    $dateObj = DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F'); // June for example

    // get schedule in the schedules.json file
    $schedules = json_decode(file_get_contents("src/scripts/horaires.json"), true);

    if (isset($schedules[$monthName])) {
        foreach ($schedules[$monthName] as $key => $values) {
            if ($values['day'] == $day) {
                $schedule = $values['schedule'];
                break;
            }
        }
    }

    // check if $schedule is empty or not
    if ($schedule != null) {
        $response = [
            "success" => true,
            "horaires" => $schedule,
            "isOpen" => true
        ];
    } else {
        $response = [
            "success" => false,
            "horaires" => "Fermé",
            "isOpen" => false
        ];
    }

}

header('Content-Type: application/json');
echo json_encode($response);

?>