<?php

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

$getRaceData = "SELECT race_id, date FROM races_2025 WHERE closed = 0 LIMIT 1";
$res = mysqli_query($con, $getRaceData);
$raceData = mysqli_fetch_array($res);
$raceId = $raceData[0];

$req = "https://cf.nascar.com/live/feeds/live-feed.json";

$cSession = curl_init();
curl_setopt($cSession,CURLOPT_URL,$req);
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);
$raceRes=curl_exec($cSession);
curl_close($cSession);

$raceData = json_decode($raceRes);
$isRaceOver = false;
if ($raceData->race_id == $raceId && ($raceData->laps_to_go == '0' || $raceData->flag_state == '9')) {
    $isRaceOver = true;
}

if ($isRaceOver) {
    $request = "https://cf.nascar.com/cacher/2025/1/" . $raceId . "/weekend-feed.json";

    $cSession = curl_init();
    curl_setopt($cSession,CURLOPT_URL,$request);
    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cSession,CURLOPT_HEADER, false);
    $result=curl_exec($cSession);
    curl_close($cSession);

    upload_results_new($result, $con);
}

$race_ids = array();
$wildcard = false;
$semis = false;
$finals = false;

$getRaces = "SELECT * FROM races_2025 WHERE closed = 1";
$res = mysqli_query($con, $getRaces);
$race_count = mysqli_num_rows($res);
$playoff_count = 0;

if ($race_count > 27) {
    $wildcard = true;
    if ($race_count > 28) {
        $semis = true;
    }
    if ($race_count > 32) {
        $finals = true;
    }
    $playoff_count = $race_count - 27;
    $race_count = 27;
}

while($row = mysqli_fetch_array($res)) {
    $race_ids[] = $row["race_id"];
}

$k = 0;
while ($k < 10) {
    for ($i = 0; $i < $race_count; $i++) {
        get_results_new($teams_week[$i+1][$k], $race_ids[$i], $con);
    }
    $k++;
}

for ($i = 0; $i < $race_count; $i++) {
    get_season_points_new($season_drivers, $race_ids[$i], $con);
}

if ($wildcard) {
    get_results_new($wildcard_teams[0], $race_ids[$i], $con);
    get_results_new($wildcard_teams[1], $race_ids[$i], $con);
}

if ($semis) {
    $semis_count = ($playoff_count < 5) ? $playoff_count - 1 : 4;
    for ($s = 0; $s < $semis_count; $s++) {
        get_playoff_results_new($semifinal_teams[0], $race_ids[$s + 28], $con);
        get_playoff_results_new($semifinal_teams[1], $race_ids[$s + 28], $con);
        get_playoff_results_new($semifinal_teams[2], $race_ids[$s + 28], $con);
        get_playoff_results_new($semifinal_teams[3], $race_ids[$s + 28], $con);
    }
}

if ($finals) {
    $finals_count = $playoff_count - 5;
    for ($f = 0; $f < $finals_count; $f++) {
        get_playoff_results_new($championship_teams[0], $race_ids[$f + 32], $con);
        get_playoff_results_new($championship_teams[1], $race_ids[$f + 32], $con);
    }
}

?>
