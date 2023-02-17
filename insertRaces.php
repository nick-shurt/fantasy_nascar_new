<?php
include 'db_credentials.php';

echo "Inserting Races...";
echo "<br>";
echo "<br>";

$servername = "localhost";
$username = $U_NAME;
$password = $P_WORD;
$db = $DATABASE;

$con = new mysqli($servername, $username, $password);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
if (!mysqli_select_db($con, $db))  {  
    echo "Unable to locate the database";   
    exit();  
}

$xml=simplexml_load_file("2023_cup_schedule.xml");

$k = 1;
$error = false;
foreach ($xml->season->event as $event) {
    foreach ($event->race as $race) {
        if (isset($race["number"])) {
            $race_id = $race["id"];
            $track = $event->track["name"];
            $name = $race["name"];
            $date = $race["scheduled"];
            $laps = $race["laps"];
            $distance = $race["distance"];
            $broadcast = $race->broadcast["network"];
            $prev_winner = $race->prior_winner["full_name"];
            $number = $race["number"];
            $closed = 0;


            $sql = "INSERT INTO races_2023 (race_id, track, name, date, laps, distance, broadcast, prev_winner, number, closed) VALUES ";
            $sql .= "('" . $race_id . "', '" . $track . "', '" . $name . "', '" . $date . "', '" . $laps . "', '" . $distance . "', '" . $broadcast . "', '" . $prev_winner . "', '" . $number . "', '" . $closed . "')";

            if (mysqli_query($con, $sql)) {
                echo "Race " . $k . " uploaded successfully!<br>";
            } else {
                echo "Race " . $k . " did not upload successfully.<br>" . mysqli_error($con) . "<br>";
                $error = true;
            }
            $k++;
        }
    }
}

if (!$error) {
    echo "<br>All races uploaded successfully!!";
} else {
    echo "<br>SHIT";
}

?>