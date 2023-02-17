<?php

include 'db_credentials.php';

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

$michael_mcdowell = new Season_Driver("Michael McDowell");
$joey_logano = new Season_Driver("Joey Logano");
$kyle_larson = new Season_Driver("Kyle Larson");
$ty_dillon = new Season_Driver("Ty Dillon");
$austin_dillon = new Season_Driver("Austin Dillon");
$ricky_stenhouse = new Season_Driver("Ricky Stenhouse Jr");
$aric_almirola = new Season_Driver("Aric Almirola");
$denny_hamlin = new Season_Driver("Denny Hamlin");
$chris_buescher = new Season_Driver("Chris Buescher");
$alex_bowman = new Season_Driver("Alex Bowman");
$martin_truex = new Season_Driver("Martin Truex Jr");
$ryan_newman = new Season_Driver("Ryan Newman");
$brad_keselowski = new Season_Driver("Brad Keselowski");
$erik_jones = new Season_Driver("Erik Jones");
$corey_lajoie = new Season_Driver("Corey Lajoie");
$chase_elliott = new Season_Driver("Chase Elliott");
$kyle_busch = new Season_Driver("Kyle Busch");
$kevin_harvick = new Season_Driver("Kevin Harvick");
$daniel_suarez = new Season_Driver("Daniel Suarez");
$ryan_blaney = new Season_Driver("Ryan Blaney");
$jimmie_johnson = new Season_Driver("Jimmie Johnson");
$clint_bowyer = new Season_Driver("Clint Bowyer");
$kurt_busch = new Season_Driver("Kurt Busch");
$matt_DiBenedetto = new Season_Driver("Matt DiBenedetto");
$bubba_wallace = new Season_Driver("Bubba Wallace");
$william_byron = new Season_Driver("William Byron");
$ryan_preece = new Season_Driver("Ryan Preece");
$tyler_reddick = new Season_Driver("Tyler Reddick");
$cole_custer = new Season_Driver("Cole Custer");
$jh_nemechek = new Season_Driver("John H. Nemechek");
$harrison_burton = new Season_Driver("Harrison Burton");
$quinn_houff = new Season_Driver("Quin Houff");
$joey_gase = new Season_Driver("Joey Gase");
$timmy_hill = new Season_Driver("Timmy Hill");
$brennan_poole = new Season_Driver("Brennan Poole");
$christopher_bell = new Season_Driver("Christopher Bell");
$jj_yeley = new Season_Driver("JJ Yeley");
$ross_chastain = new Season_Driver("Ross Chastain");
$bj_mcleod = new Season_Driver("BJ McLeod");
$reed_sorenson = new Season_Driver("Reed Sorenson");
$brendan_gaughan = new Season_Driver("Brendan Gaughan");
$justin_haley = new Season_Driver("Justin Haley");
$david_ragan = new Season_Driver("David Ragan");
$matt_kenseth = new Season_Driver("Matt Kenseth");
$justin_allgaier = new Season_Driver("Justin Allgaier");

$season_drivers = array($tyler_reddick,
                        $michael_mcdowell,
                        $joey_logano,
                        $kyle_larson,
                        $ty_dillon,
                        $austin_dillon,
                        $ricky_stenhouse,
                        $aric_almirola,
                        $denny_hamlin,
                        $chris_buescher,
                        $alex_bowman,
                        $martin_truex,
                        $ryan_newman,
                        $brad_keselowski,
                        $erik_jones,
                        $corey_lajoie,
                        $chase_elliott,
                        $kyle_busch,
                        $kevin_harvick,
                        $daniel_suarez,
                        $ryan_blaney,
                        $jimmie_johnson,
                        $clint_bowyer,
                        $kurt_busch,
                        $matt_DiBenedetto,
                        $bubba_wallace,
                        $william_byron,
                        $ryan_preece,
                        $cole_custer,
                        $jh_nemechek,
                        $harrison_burton,
                        $quinn_houff,
                        $joey_gase,
                        $timmy_hill,
                        $brennan_poole,
                        $christopher_bell,
                        $jj_yeley,
                        $ross_chastain,
                        $bj_mcleod,
                        $reed_sorenson,
                        $brendan_gaughan,
                        $justin_haley,
                        $david_ragan,
                        $matt_kenseth,
                        $justin_allgaier);


$team_names = array();
$drivers1 = array();
$drivers2 = array();
$drivers3 = array();
$drivers4 = array();

$getRaceData = "SELECT * FROM teams_2020";
$res = mysqli_query($con, $getRaceData);

while ($row = mysqli_fetch_array($res)) {
    $team_names[] = $row["team_name"];
    $drivers1[] = $row["driver1"];
    $drivers2[] = $row["driver2"];
    $drivers3[] = $row["driver3"];
    $drivers4[] = $row["driver4"];
}

$teams = array();
$teams_week = array();
$week_0_teams = array(); // DUMMY TEAM TO COVER INDEX 0 //
array_push($teams_week, $week_0_teams);
for ($i = 0; $i < 270; $i++) {
    if ($i != 0 && fmod($i,10) == 0) {
        array_push($teams_week, $teams);
        $teams = array();
    }
    array_push($teams, new Team($team_names[$i], $drivers1[$i], $drivers2[$i], $drivers3[$i], $drivers4[$i]));
}
array_push($teams_week, $teams);

$team_rachel = new Team($team_names[260],$drivers1[260],$drivers2[260],$drivers3[260],$drivers4[260]);
$team_donna = new Team($team_names[261],$drivers1[261],$drivers2[261],$drivers3[261],$drivers4[261]);
$team_jim = new Team($team_names[262],$drivers1[262],$drivers2[262],$drivers3[262],$drivers4[262]);
$team_chives = new Team($team_names[263],$drivers1[263],$drivers2[263],$drivers3[263],$drivers4[263]);
$team_joey = new Team($team_names[264],$drivers1[264],$drivers2[264],$drivers3[264],$drivers4[264]);
$team_docks = new Team($team_names[265],$drivers1[265],$drivers2[265],$drivers3[265],$drivers4[265]);
$team_mike = new Team($team_names[266],$drivers1[266],$drivers2[266],$drivers3[266],$drivers4[266]);
$team_jru = new Team($team_names[267],$drivers1[267],$drivers2[267],$drivers3[267],$drivers4[267]);
$team_nick = new Team($team_names[268],$drivers1[268],$drivers2[268],$drivers3[268],$drivers4[268]);
$team_matt = new Team($team_names[269],$drivers1[269],$drivers2[269],$drivers3[269],$drivers4[269]);

$team_standings = array($team_rachel,$team_donna,$team_jim,$team_chives,$team_joey,$team_docks,$team_mike,$team_jru,$team_nick,$team_matt);
$team_roster = $team_standings;
$driver_rank = array();

$team_joey = new Team("#4 Team Joey","Joey Logano","Brad Keselowski","Daniel Suarez","Brennan Poole");
$team_mike = new Team("#5 Team Mike","Ryan Blaney","Alex Bowman","John H. Nemechek","JJ Yeley");

$wildcard_teams = array($team_joey, $team_mike);

$team_chives = new Team("#1 Team Chives","Denny Hamlin","Austin Dillon","Cole Custer","Richard Petty");
$team_joey = new Team("#4 Team Joey","Joey Logano","Brad Keselowski","Daniel Suarez","Brennan Poole");
$team_jru = new Team("#2 Team Jru","Chase Elliott","Jimmie Johnson","Bubba Wallace","Greg Bifle");
$team_donna = new Team("#3 Team Donna","Kevin Harvick","Ryan Newman","Ryan Preece","Joey Gase");

$semifinal_teams = array($team_chives, $team_joey, $team_jru, $team_donna);

$team_chives = new Team("#1 Team Chives","Denny Hamlin","Austin Dillon","Cole Custer","Richard Petty");
$team_donna = new Team("#3 Team Donna","Kevin Harvick","Ryan Newman","Ryan Preece","Joey Gase");

$championship_teams = array($team_chives, $team_donna);

?>