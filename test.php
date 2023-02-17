<?php
    if(isset($_GET['year'])) {
        $url_year = $_GET['year'];
        $num_year = (int)$url_year;
        if($num_year < 2017 || $num_year > 2021) {
            header("Location: /test.php?year=2021");
        } 
    } else {
        header("Location: /test.php?year=2021");
    }      
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Nascar</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link href="css/HSFM.css" rel="stylesheet">
    <link href="css/fantasy_nascar.css" rel="stylesheet">
    <link rel="shortcut icon" type="image" href="img/favicon.ico">
    <style type="text/css">
        .year_pick {
            margin-top: 20px;
            margin-left: 100px;
            width: 80px;
        }

        .next_race {
            color: #fff;
            border: 3px solid #fff;
            background-color: #333;
            margin: 0 auto;
            width:50%;
        }
        
        .champ_container {
            text-align: center;
            color: #fff;
        }

        @media screen and (max-width: 767px) {
            .year_pick {
                margin-top: 20px;
                margin-left: 0px;
                width: 80px;
            }

            .next_race {
                color: #fff;
                border: 3px solid #fff;
                background-color: #333;
                margin: 0 auto;
                width:100%;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse" style="margin-bottom: 0;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" data-toggle="tab" href="#tab1" style="font-style: italic; color: #4286f4;"><span style="color: yellow;">Fantasy</span><span style="color: red;">Nascar</span>League</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a data-toggle="tab" href="#tab1">Home</a></li>
            <li><a data-toggle="tab" href="#tab2">Schedule/Results</a></li>
            <li><a data-toggle="tab" href="#tab3">Standings</a></li>
            <li><a data-toggle="tab" href="#tab4">Teams</a></li>
			<li><a data-toggle="tab" href="#tab5">All-Time Stats</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="col-lg-1 col-lg-offset-10">
        <select id="league_year" class="form-control year_pick" onchange="putYearInURL()">
            <option value="2017" <?php if($_GET['year'] == '2017') echo "selected='selected'"; ?> >2017</option>
            <option value="2018" <?php if($_GET['year'] == '2018') echo "selected='selected'"; ?> >2018</option>
            <option value="2019" <?php if($_GET['year'] == '2019') echo "selected='selected'"; ?> >2019</option>
            <option value="2020" <?php if($_GET['year'] == '2020') echo "selected='selected'"; ?> >2020</option>
            <option value="2021" <?php if($_GET['year'] == '2021') echo "selected='selected'"; ?> >2021</option>
        </select>
    </div>

    <?php 
    include 'db_credentials.php';
    include 'nascar_objects_methods.php';
    if($_GET['year'] == '2017') {
        include 'nascar_drivers_teams_2017.php';
        include 'nascar_results_2017.php';
    }
    if($_GET['year'] == '2018') {
        include 'nascar_drivers_teams_2018.php';
        include 'nascar_results_2018.php';
    }
    if($_GET['year'] == '2019') {
        include 'nascar_drivers_teams_2019.php';
        include 'nascar_results_2019.php';
    }
    if($_GET['year'] == '2020') {
        include 'nascar_drivers_teams_2020.php';
        include 'nascar_results_2020.php';
    }
    if($_GET['year'] == '2021') {
        include 'nascar_drivers_teams_2021.php';
        include 'nascar_results_2021.php';
    }
    ?>

    <div class="container-fluid">
        <div class="tab-content">
            <div id="tab1" class="tab-pane fade in active">
                <div class="row top_margin">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1 style="color: #fff;text-align: center;">Next Cup Race:</h1>
                        <?php show_next_race($U_NAME, $P_WORD, $DATABASE); ?>
                    </div>  
                </div>  
            </div>
            
            <div id="tab2" class="tab-pane fade">
                <div class="row top_margin">
                    <div class="col-lg-2 col-lg-offset-5">
                        <select class="form-control" data-target=".my-scoreboard" id="theSelect">
                            <option value="one" data-show=".week1">Week 1 (Daytona)</option>
                            <option value="two" data-show=".week2">Week 2 (Daytona Road)</option>
                            <option value="three" data-show=".week3">Week 3 (Homestead-Miami)</option>
                            <option value="four" data-show=".week4">Week 4 (Las Vegas)</option>
                            <option value="five" data-show=".week5">Week 5 (Phoenix)</option>
                            <option value="six" data-show=".week6">Week 6 (Atlanta)</option>
                            <option value="seven" data-show=".week7">Week 7 (Bristol)</option>
                            <option value="eight" data-show=".week8">Week 8 (Martinsville)</option>
                            <option value="nine" data-show=".week9">Week 9 (Richmond)</option>
                            <option value="ten" data-show=".week10">Week 10 (Talladega)</option>
                            <option value="eleven" data-show=".week11">Week 11 (Kansas)</option>
                            <option value="twelve" data-show=".week12">Week 12 (Darlington)</option>
                            <option value="thirteen" data-show=".week13">Week 13 (Dover)</option>
                            <option value="fourteen" data-show=".week14">Week 14 (Austin)</option>
                            <option value="fifteen" data-show=".week15">Week 15 (Charlotte)</option>
                            <option value="sixteen" data-show=".week16">Week 16 (Sonoma)</option>
                            <option value="seventeen" data-show=".week17">Week 17 (Nashville)</option>
                            <option value="eighteen" data-show=".week18">Week 18 (Pocono)</option>
                            <option value="nineteen" data-show=".week19">Week 19 (Pocono)</option>
                            <option value="twenty" data-show=".week20">Week 20 (Wisconsin)</option>
                            <option value="twenty-one" data-show=".week21">Week 21 (Atlanta)</option>
                            <option value="twenty-two" data-show=".week22">Week 22 (New Hampshire)</option>
                            <option value="twenty-three" data-show=".week23">Week 23 (Watkins Glen)</option>
                            <option value="twenty-four" data-show=".week24">Week 24 (Indianapolis)</option>
                            <option value="twenty-five" data-show=".week25">Week 25 (Michigan)</option>
                            <option value="twenty-six" data-show=".week26">Week 26 (Daytona)</option>
                            
                            <?php 
                            if($_GET['year'] == '2017') {
                                echo '<option value="twenty-seven" data-show=".week27">Wild Card Round (Darlington)</option>';
                                echo '<option value="twenty-eight" data-show=".week28">Semi-Final Round (Weeks 28-31)</option>';
                                echo '<option value="twenty-nine" data-show=".week29">Championship (Weeks 32-36)</option>';
                            }
                            if($_GET['year'] == '2018' || $_GET['year'] == '2019' || $_GET['year'] == '2020' || $_GET['year'] == '2021') {
                                echo '<option value="twenty-seven" data-show=".week27">Week 27 (Darlington)</option>';
                                if($_GET['year'] == '2018' || $_GET['year'] == '2019' || $_GET['year'] == '2020') {
                                    echo '<option value="twenty-eight" data-show=".week28">Wild Card Round (Richmond)</option>';
                                    echo '<option value="twenty-nine" data-show=".week29">Semi-Final Round (Weeks 29-32)</option>';
                                    echo '<option value="thirty" data-show=".week30">Championship (Weeks 33-36)</option>';
                                }
                            }
                            ?>
                            
                        </select>
                        <h3 style="color: #fff;text-align: center;">Scoreboard</h3>
                    </div>
                </div>

                <div class="row">
                    <?php                    
                        $i = 1;
                        $w = ($_GET['year'] == '2017') ? 26 : 27;
                        while ($i <= $w) {
                            $j = ($i - 1) % 9;                       
                            get_matchups($teams_week, $i, $num_pairs[$j], $team_standings);
                            $i++;
                        }
                        if($_GET['year'] == '2017') {
                            get_wildcard_matchup($wildcard_teams, 27, true); 
                            get_semifinal_matchups($semifinal_teams, 28, true);
                            get_championship_matchup($championship_teams, 29, true);
                        } else if ($_GET['year'] == '2018') {
                            get_wildcard_matchup($wildcard_teams, 28, true);
                            get_semifinal_matchups($semifinal_teams, 29, true);
                            get_championship_matchup($championship_teams, 30, true);
                        } else if ($_GET['year'] == '2019') {
                            get_wildcard_matchup($wildcard_teams, 28, true);
                            get_semifinal_matchups($semifinal_teams, 29, true);
                            get_championship_matchup($championship_teams, 30, true);
                        } else if ($_GET['year'] == '2020') {
                            get_wildcard_matchup($wildcard_teams, 28, true);
                            get_semifinal_matchups($semifinal_teams, 29, true);
                            get_championship_matchup($championship_teams, 30, true);
                        }     
                    ?>
                </div>
            </div>

            <div id="tab3" class="tab-pane fade">
                <div class="row top_margin">
                    <div class="standings col-lg-4">
                        <h3 style="color: #fff;text-align: center;">Standings</h3>
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                        
                                    <th width="50%" style="border-right: 1px solid white">Team</th>
                                    <th width="10%" style="border-right: 1px solid white">W</th>
                                    <th width="10%" style="border-right: 1px solid white">L</th>
                                    <th width="10%" style="border-right: 1px solid white">Points</th>
                                    <th width="10%" style="border-right: 1px solid white">Strk</th>
                                    <th width="10%" style="border-right: 1px solid white">PA</th>                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php get_team_standings($team_standings); ?>                                                 
                            </tbody>
                        </table>
                    </div>

                    <div class="fantasy_pts_leaderboard col-lg-4 col-lg-offset-1">
                        <h3 style="color: #fff;text-align: center;">Fantasy Points Leaderboard</h3>
                        <div style="height:500px; overflow-y: scroll; margin-bottom: 40px;border: 2px solid #fff;">
                            <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;margin-bottom: 0px;">
                                <thead>
                                    <tr>
                                        <th width="2%" style="border-right: 1px solid white">Rank</th>                                        
                                        <th width="56%" style="border-right: 1px solid white">Driver</th>
                                        <th width="20%" style="border-right: 1px solid white">Points</th>
                                        <th width="20%" style="border-right: 1px solid white">Avg per Start</th>
                                        <th width="2%">Starts</th>                     
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $driver_rank = get_driver_standings($season_drivers, $_GET['year']); ?>
                                </tbody>
                            </table>
                        </div>          
                    </div>               
                </div>
            </div>

            <div id="tab4" class="tab-pane fade">
                <div class="row">
                    <?php get_team_rosters(0, 4, $team_roster, $driver_rank, false); ?>                       
                </div>

                <div class="row">
                    <?php get_team_rosters(4, 8, $team_roster, $driver_rank, false); ?>                       
                </div>

                <div class="row">
                    <?php get_team_rosters(8, 10, $team_roster, $driver_rank, true); ?>                      
                </div>
            </div>

			<div id="tab5" class="tab-pane fade">
                <div class="row top_margin">
                    <div class="standings col-lg-4">
                        <h3 style="color: #fff;text-align: center;">All-Time Stats (Regular Season)*</h3>
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                        
                                    <th width="36%" style="border-right: 1px solid white">Team</th>
                                    <th width="10%" style="border-right: 1px solid white">W</th>
                                    <th width="10%" style="border-right: 1px solid white">L</th>
									<th width="20%" style="border-right: 1px solid white">Winning %</th>
                                    <th width="12%" style="border-right: 1px solid white">Points</th>
                                    <th width="12%" style="border-right: 1px solid white">PA</th>                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php get_all_time_standings($team_standings, $U_NAME, $P_WORD, $DATABASE); ?>                                                 
                            </tbody>
                        </table>
						<p style="color:silver;text-align:right;">*Website Era</p>
                    </div>

                    <div class="fantasy_pts_leaderboard col-lg-4 col-lg-offset-1">
                        <h3 style="color: #fff;text-align: center;">Fantasy Points Leaderboard</h3>
                        <div style="height:500px; overflow-y: scroll; margin-bottom: 40px;border: 2px solid #fff;">
                            <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;margin-bottom: 0px;">
                                <thead>
                                    <tr>
                                        <th width="2%" style="border-right: 1px solid white">Rank</th>                                        
                                        <th width="56%" style="border-right: 1px solid white">Driver</th>
                                        <th width="20%" style="border-right: 1px solid white">Points</th>
                                        <th width="20%" style="border-right: 1px solid white">Avg per Start</th>
                                        <th width="2%">Starts</th>                     
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $driver_rank = get_driver_standings($season_drivers, $_GET['year']); ?>
                                </tbody>
                            </table>
                        </div>          
                    </div>               
                </div>  
            </div>
        </div>   
    </div>    

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/toggle_nascar_scoreboard3.js"></script>
    <script>
        $(document).on('click','.navbar-collapse.in',function(e) {
            if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
                $(this).collapse('hide');
            }
        });  
    </script>

    <script> function putYearInURL() {
        var year = document.getElementById("league_year").value;
        var url = location.href;
        url = url.substring(0, url.length - 4);
        url += year;
        window.location = url;
    }
    </script>

    <script>
    $(function() {
        var optionValue  = "<?php get_current_week(); ?>";
        $("#theSelect").val(optionValue)
        .find("option[value=" + optionValue +"]").attr('selected', true);
    })
    </script>

    <script>
    function setWeek() {
        var value = $("#theSelect option:selected").val();
        var theDiv = $(".is_" + value);
        
        theDiv.siblings('[class*=is]').addClass("hidden");
        theDiv.removeClass("hidden");
    }
    window.onload = setWeek;
    </script>
</body>
</html>