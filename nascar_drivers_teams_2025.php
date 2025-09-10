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
$austin_dillon = new Season_Driver("Austin Dillon");
$ricky_stenhouse = new Season_Driver("Ricky Stenhouse Jr");
$denny_hamlin = new Season_Driver("Denny Hamlin");
$chris_buescher = new Season_Driver("Chris Buescher");
$alex_bowman = new Season_Driver("Alex Bowman");
$martin_truex = new Season_Driver("Martin Truex Jr");
$brad_keselowski = new Season_Driver("Brad Keselowski");
$erik_jones = new Season_Driver("Erik Jones");
$corey_lajoie = new Season_Driver("Corey Lajoie");
$chase_elliott = new Season_Driver("Chase Elliott");
$kyle_busch = new Season_Driver("Kyle Busch");
$daniel_suarez = new Season_Driver("Daniel Suarez");
$ryan_blaney = new Season_Driver("Ryan Blaney");
$bubba_wallace = new Season_Driver("Bubba Wallace");
$william_byron = new Season_Driver("William Byron");
$ryan_preece = new Season_Driver("Ryan Preece");
$tyler_reddick = new Season_Driver("Tyler Reddick");
$christopher_bell = new Season_Driver("Christopher Bell");
$ross_chastain = new Season_Driver("Ross Chastain");
$bj_mcleod = new Season_Driver("BJ McLeod");
$justin_haley = new Season_Driver("Justin Haley");
$austin_cindric = new Season_Driver("Austin Cindric");
$chase_briscoe = new Season_Driver("Chase Briscoe");
$cody_ware = new Season_Driver("Cody Ware");
$noah_gragson = new Season_Driver("Noah Gragson");
$aj_allmendinger = new Season_Driver("AJ Allmendinger");
$todd_gilliland = new Season_Driver("Todd Gilliland");
$riley_herbst = new Season_Driver("Riley Herbst");
$zane_smith = new Season_Driver("Zane Smith");
$ty_gibbs = new Season_Driver("Ty Gibbs");
$jimmie_johnson = new Season_Driver("Jimmie Johnson");
$carson_hocevar = new Season_Driver("Carson Hocevar");
$jh_nemechek = new Season_Driver("John H. Nemechek");
$anthony_alfredo = new Season_Driver("Anthony Alfredo");
$josh_berry = new Season_Driver("Josh Berry");
$shane_van_gisbergen = new Season_Driver("Shane Van Gisbergen");
$connor_zilisch = new Season_Driver("Connor Zilisch");
$justin_allgaier = new Season_Driver("Justin Allgaier");
$ty_dillon = new Season_Driver("Ty Dillon");
$cole_custer = new Season_Driver("Cole Custer");

$season_drivers = array($tyler_reddick,
                        $michael_mcdowell,
                        $joey_logano,
                        $kyle_larson,
                        $austin_dillon,
                        $ricky_stenhouse,
                        $denny_hamlin,
                        $chris_buescher,
                        $alex_bowman,
                        $martin_truex,
                        $brad_keselowski,
                        $erik_jones,
                        $corey_lajoie,
                        $chase_elliott,
                        $kyle_busch,
                        $daniel_suarez,
                        $ryan_blaney,
                        $bubba_wallace,
                        $william_byron,
                        $ryan_preece,
                        $christopher_bell,
                        $ross_chastain,
                        $bj_mcleod,
                        $justin_haley,
                        $austin_cindric,
                        $chase_briscoe,
                        $cody_ware,
                        $noah_gragson,
                        $aj_allmendinger,
						$todd_gilliland,
                        $riley_herbst,
                        $zane_smith,
                        $ty_gibbs,
                        $jimmie_johnson,
                        $carson_hocevar,
                        $jh_nemechek,
                        $anthony_alfredo,
                        $josh_berry,
                        $shane_van_gisbergen,
                        $connor_zilisch,
                        $justin_allgaier,
                        $ty_dillon,
                        $cole_custer);
                        

$team_names = array();
$drivers1 = array();
$drivers2 = array();
$drivers3 = array();
$drivers4 = array();

$getRaceData = "SELECT * FROM teams_2025";
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
$team_mike = new Team($team_names[261],$drivers1[261],$drivers2[261],$drivers3[261],$drivers4[261]);
$team_donna = new Team($team_names[262],$drivers1[262],$drivers2[262],$drivers3[262],$drivers4[262]);
$team_jim = new Team($team_names[263],$drivers1[263],$drivers2[263],$drivers3[263],$drivers4[263]);
$team_joey = new Team($team_names[264],$drivers1[264],$drivers2[264],$drivers3[264],$drivers4[264]);
$team_steve = new Team($team_names[265],$drivers1[265],$drivers2[265],$drivers3[265],$drivers4[265]);
$team_nick = new Team($team_names[266],$drivers1[266],$drivers2[266],$drivers3[266],$drivers4[266]);
$team_matt = new Team($team_names[267],$drivers1[267],$drivers2[267],$drivers3[267],$drivers4[267]);
$team_chives = new Team($team_names[268],$drivers1[268],$drivers2[268],$drivers3[268],$drivers4[268]);
$team_jru = new Team($team_names[269],$drivers1[269],$drivers2[269],$drivers3[269],$drivers4[269]);

$team_standings = array($team_rachel,$team_mike,$team_donna,$team_jim,$team_joey,$team_steve,$team_nick,$team_matt,$team_chives,$team_jru);
$team_roster = $team_standings;
$driver_rank = array();

$team_rachel = new Team("#4 Team Steve","Kyle Larson","Michael McDowell","Shane Van Gisbergen","Cole Custer");
$team_mike = new Team("#5 Team Rachel","Denny Hamlin","Carson Hocevar","Ryan Preece","Zane Smith");

$wildcard_teams = array($team_rachel, $team_mike);

$team_nick = new Team("#1 Team Matt","Christopher Bell","Bubba Wallace","Josh Berry","Justin Allgaier");
$team_mike = new Team("#5 Team Rachel","Denny Hamlin","Carson Hocevar","Ryan Preece","Zane Smith");
$team_joey = new Team("#2 Team Chives","Chase Elliott","Ross Chastain","Ty Gibbs","Ty Dillon");
$team_jim = new Team("#3 Team Jim","William Byron","Austin Cindric","Justin Haley","Corey Lajoie");

$semifinal_teams = array($team_nick, $team_mike, $team_joey, $team_jim);

?>