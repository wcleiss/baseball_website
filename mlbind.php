#MLBIND is a PHP file that lists each player's indivudal baseball stats among various stages of the adjustment waterfall.
#I plan on adding a play by play section soon.

<HEAD>
<link rel="stylesheet" type="text/css" href="cbb66.css">
<meta name="description" content="Advanced MLB predictions and betting picks">

<br>
<table id="navbare">
<tr>
<th><a href="mlbdb.php">Major League Baseball</a></th>
<th><a href="db5.php">College Basketball</th>
</tr>
</table>
<br>

<h1><center>Sports Betting Truth Major League Baseball Player Stats</center></h1>

<br>
<table id="navbar">
<tr>
<th><a href="mlbdb.php">All Model Plays</a></th>
<th><a href="mymlb.php">SBT's Plays</th>
<th><a href="mlbplayers.php">Players</th>
<th><a href="/blog/">Blog</th>
</tr>
</table>
<br>

<?php
$link = mysqli_connect("localhost", "root", "", "csv_db 13");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_GET["pid"])) {
  $tbl_year = $_GET["year"];
  $tbl_id = $_GET["pid"];
}

else {
  $tbl_year = 2021;
  $tbl_id = 545361;
}

$sql = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND `cascade` = 'final'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $player_name = $row['name'];
        $player_team = $row['team'];
        $player_type = $row['player_type'];

    }
  }
}

echo "<hr>";
echo "<h1><center>" . $player_team . " - " . $player_name . "</center></h1>";
echo "<hr>";

#Player Type is Batter

if ($player_type == "B") {

  split_out_web('B', 'ovr', $tbl_id);
  split_out_web('B', 'rvr', $tbl_id);
  split_out_web('B', 'rvl', $tbl_id);
  split_out_web('B', 'lvr', $tbl_id);
  split_out_web('B', 'lvl', $tbl_id);
  echo "<br>";
  echo "<hr>";
  split_out_web('P', 'ovr', $tbl_id);
  split_out_web('P', 'rvr', $tbl_id);
  split_out_web('P', 'rvl', $tbl_id);
  split_out_web('P', 'lvr', $tbl_id);
  split_out_web('P', 'lvl', $tbl_id);

}

else {

  split_out_web('P', 'ovr', $tbl_id);
  split_out_web('P', 'rvr', $tbl_id);
  split_out_web('P', 'rvl', $tbl_id);
  split_out_web('P', 'lvr', $tbl_id);
  split_out_web('P', 'lvl', $tbl_id);
  echo "<br>";
  echo "<hr>";
  split_out_web('B', 'ovr', $tbl_id);
  split_out_web('B', 'rvr', $tbl_id);
  split_out_web('B', 'rvl', $tbl_id);
  split_out_web('B', 'lvr', $tbl_id);
  split_out_web('B', 'lvl', $tbl_id);
}

function split_out_web($branch, $split, $tbl_id) {

  $link = mysqli_connect("localhost", "root", "", "csv_db 13");
  $sql = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'sum'";

  if ($branch == 'B') {
    if ($split == 'ovr') { $_title = 'Overall Batting Stats'; }
    if ($split == 'rvr') { $_title = 'vs. Right Handed Pitchers'; }
    if ($split == 'rvl') { $_title = 'vs. Left Handed Pitchers'; }
    if ($split == 'lvr') { $_title = 'vs. Right Handed Pitchers'; }
    if ($split == 'lvl') { $_title = 'vs. Left Handed Pitchers'; }
  }

  if ($branch == 'P') {
    if ($split == 'ovr') { $_title = 'Overall Pitching Stats'; }
    if ($split == 'rvr') { $_title = 'vs. Right Handed Batters'; }
    if ($split == 'rvl') { $_title = 'vs. Left Handed Batters'; }
    if ($split == 'lvr') { $_title = 'vs. Right Handed Batters'; }
    if ($split == 'lvl') { $_title = 'vs. Left Handed Batters'; }
  }

  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){

            $_pa = $row['pa'];
            if ($split == 'ovr') { $_div = 250; }
            else { $_div = 125; }
            $_imp = number_format(round(($_pa / $_div) * 100, 1),1);
            $_imp2 = number_format(round((1 - ($_pa / $_div)) * 100, 1),1);

            $_title2 = "* Preseason Rating Influence: " . $_imp . "% of Final Percentage Row Apportionment is This Season's Stats, While " . $_imp2 . "% is Preseason Projection Imputation.";

            echo "<h1><center>" . $_title . "</center></h1>";
            echo "<h4><center>" . $_title2 . "</center></h4>";
            echo "<table id='bears'>";
            echo "<tr>";
            echo "<th class='blank'></th>";
            echo "<th>PA</th>";
            echo "<th class='blank'></th>";
            echo "<th>Single</th>";
            echo "<th>Double</th>";
            echo "<th>Triple</th>";
            echo "<th>Home Run</th>";
            echo "<th class='blank'></th>";
            echo "<th>Sac Bunt</th>";
            echo "<th>Walk</th>";
            echo "<th class='blank'></th>";
            echo "<th>Strikeout</th>";
            echo "<th>Ground Out</th>";
            echo "<th>Fly Out</th>";
            echo "<th>Line Out</th>";
            echo "<th>Pop Out</th>";
            echo "<th class='blank'></th>";
            echo "<th>SBTPV</th>";
            echo "</tr>";

            $_single = $row['single'];
            $_double = $row['double'];
            $_triple = $row['triple'];
            $_hr = $row['hr'];
            $_sacb = $row['sacb'];
            $_walk = $row['walk'];
            $_k = $row['strikeout'];
            $_gb = $row['ground_ball'];
            $_fb = $row['fly_ball'];
            $_ld = $row['line_drive'];
            $_po = $row['popup'];

            $_woba = '-';
            $_rowuse = 'Raw Sums';

            echo "<tr class='curr'>";
            echo "<td class='bl1'>" . $_rowuse . "</td>";
            echo "<td class='bl1'>" . number_format(round($_pa, 0),0) . "</td>";
            echo "<td class='blank'>";
            echo "<td class='bl1'>" . number_format(round($_single, 0),0) . "</td>";
            echo "<td class='bl1'>" . number_format(round($_double, 0),0) . "</td>";
            echo "<td class='bl1'>" . number_format(round($_triple, 0),0) . "</td>";
            echo "<td class='bl1'>" . number_format(round($_hr, 0),0) . "</td>";
            echo "<td class='blank'>";
            echo "<td class='bl1'>" . number_format(round($_sacb, 0),0) . "</td>";
            echo "<td class='bl1'>" . number_format(round($_walk, 0),0) . "</td>";
            echo "<td class='blank'>";
            echo "<td class='bl1'>" . number_format(round($_k, 0),0) . "</td>";
            echo "<td class='bl1'>" . number_format(round($_gb, 0),0) . "</td>";
            echo "<td class='bl1'>" . number_format(round($_fb, 0),0) . "</td>";
            echo "<td class='bl1'>" . number_format(round($_ld, 0),0) . "</td>";
            echo "<td class='bl1'>" . number_format(round($_po, 0),0) . "</td>";
            echo "<td class='blank'>";
            echo "<td class='bl1'>" . $_woba . "</td>";
            echo "</tr>";

          }

          #Raw Averages

          $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'avg'";

          if($result2 = mysqli_query($link, $sql2)){
              if(mysqli_num_rows($result2) > 0){
                while($row2 = mysqli_fetch_array($result2)){

                  $_single2 = $row2['single'];
                  $_double2 = $row2['double'];
                  $_triple2 = $row2['triple'];
                  $_hr2 = $row2['hr'];
                  $_sacb2 = $row2['sacb'];
                  $_walk2 = $row2['walk'];
                  $_k2 = $row2['strikeout'];
                  $_gb2 = $row2['ground_ball'];
                  $_fb2 = $row2['fly_ball'];
                  $_ld2 = $row2['line_drive'];
                  $_po2 = $row2['popup'];
                  $_pa2 = $row2['pa'];
                  $_woba2 = $row2['woba'];
                  $_rowuse2 = 'Raw Averages';

                    echo "<tr class='curr'>";
                    echo "<td class='bl1'>" . $_rowuse2 . "</td>";
                    echo "<td class='bl1'>" . number_format(round($_pa2, 0),0) . "</td>";
                    echo "<td class='blank'>";
                    echo "<td class='bl1'>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                    echo "<td class='bl1'>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                    echo "<td class='bl1'>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                    echo "<td class='bl1'>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                    echo "<td class='blank'>";
                    echo "<td class='bl1'>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                    echo "<td class='bl1'>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                    echo "<td class='blank'>";
                    echo "<td class='bl1'>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                    echo "<td class='bl1'>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                    echo "<td class='bl1'>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                    echo "<td class='bl1'>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                    echo "<td class='bl1'>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                    echo "<td class='blank'>";
                    echo "<td class='bl1'>" . number_format(round($_woba2 * 1, 3),3) . "</td>";
                    echo "</tr>";

                  }
                }
              }

              #Raw VLA

              $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'vlap'";

              if($result2 = mysqli_query($link, $sql2)){
                  if(mysqli_num_rows($result2) > 0){
                    while($row2 = mysqli_fetch_array($result2)){

                      $_single2 = $row2['single'];
                      $_double2 = $row2['double'];
                      $_triple2 = $row2['triple'];
                      $_hr2 = $row2['hr'];
                      $_sacb2 = $row2['sacb'];
                      $_walk2 = $row2['walk'];
                      $_k2 = $row2['strikeout'];
                      $_gb2 = $row2['ground_ball'];
                      $_fb2 = $row2['fly_ball'];
                      $_ld2 = $row2['line_drive'];
                      $_po2 = $row2['popup'];
                      $_pa2 = $row2['pa'];
                      $_woba2 = $row2['woba'];
                      $_rowuse2 = 'Raw vs. League Average';

                        echo "<tr class='curr'>";
                        echo "<td class='bl1'>" . $_rowuse2 . "</td>";
                        echo "<td class='bl1'>" . number_format(round($_pa2, 0),0) . "</td>";
                        echo "<td class='blank'>";
                        echo "<td class='bl1'>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                        echo "<td class='bl1'>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                        echo "<td class='bl1'>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                        echo "<td class='bl1'>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                        echo "<td class='blank'>";
                        echo "<td class='bl1'>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                        echo "<td class='bl1'>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                        echo "<td class='blank'>";
                        echo "<td class='bl1'>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                        echo "<td class='bl1'>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                        echo "<td class='bl1'>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                        echo "<td class='bl1'>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                        echo "<td class='bl1'>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                        echo "<td class='blank'>";
                        echo "<td class='bl1'>" . number_format(round($_woba2 * 1, 3),3) . "</td>";
                        echo "</tr>";

                      }
                    }
                  }

              #Imputed Raw VLA

              $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'vla'";

              if($result2 = mysqli_query($link, $sql2)){
                  if(mysqli_num_rows($result2) > 0){
                    while($row2 = mysqli_fetch_array($result2)){

                      $_single2 = $row2['single'];
                      $_double2 = $row2['double'];
                      $_triple2 = $row2['triple'];
                      $_hr2 = $row2['hr'];
                      $_sacb2 = $row2['sacb'];
                      $_walk2 = $row2['walk'];
                      $_k2 = $row2['strikeout'];
                      $_gb2 = $row2['ground_ball'];
                      $_fb2 = $row2['fly_ball'];
                      $_ld2 = $row2['line_drive'];
                      $_po2 = $row2['popup'];
                      $_pa2 = $row2['pa'];
                      $_woba2 = $row2['woba'];
                      $_rowuse2 = 'Imputed Raw vs. League Average *';

                        echo "<tr class='curr'>";
                        echo "<td class='bl2'><b>" . $_rowuse2 . "</td>";
                        echo "<td class='bl2'><b>" . number_format(round($_pa2, 0),0) . "</td>";
                        echo "<td class='blank'>";
                        echo "<td class='bl2'><b>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                        echo "<td class='bl2'><b>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                        echo "<td class='bl2'><b>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                        echo "<td class='bl2'><b>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                        echo "<td class='blank'>";
                        echo "<td class='bl2'><b>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                        echo "<td class='bl2'><b>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                        echo "<td class='blank'>";
                        echo "<td class='bl2'><b>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                        echo "<td class='bl2'><b>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                        echo "<td class='bl2'><b>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                        echo "<td class='bl2'><b>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                        echo "<td class='bl2'><b>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                        echo "<td class='blank'>";
                        echo "<td class='bl2'><b>" . number_format(round($_woba2 * 1, 3),3) . "</td>";
                        echo "</tr>";

                      }
                    }
                  }

                  #Weather Adjustments

                  $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'wnvla'";

                  if($result2 = mysqli_query($link, $sql2)){
                      if(mysqli_num_rows($result2) > 0){
                        while($row2 = mysqli_fetch_array($result2)){

                          $_single2 = $row2['single'] * -1;
                          $_double2 = $row2['double'] * -1;
                          $_triple2 = $row2['triple'] * -1;
                          $_hr2 = $row2['hr'] * -1;
                          $_sacb2 = $row2['sacb'] * -1;
                          $_walk2 = $row2['walk'] * -1;
                          $_k2 = $row2['strikeout'] * -1;
                          $_gb2 = $row2['ground_ball'] * -1;
                          $_fb2 = $row2['fly_ball'] * -1;
                          $_ld2 = $row2['line_drive'] * -1;
                          $_po2 = $row2['popup'] * -1;
                          $_pa2 = $row2['pa'];
                          $_woba2 = $row2['woba'] * -1;
                          $_rowuse2 = 'Weather Adjustments';

                            echo "<tr class='curr'>";
                            echo "<td class='in1'>" . $_rowuse2 . "</td>";
                            echo "<td class='in1'>-</td>";
                            echo "<td class='blank'>";
                            echo "<td class='in1'>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                            echo "<td class='in1'>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                            echo "<td class='in1'>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                            echo "<td class='in1'>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                            echo "<td class='blank'>";
                            echo "<td class='in1'>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                            echo "<td class='in1'>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                            echo "<td class='blank'>";
                            echo "<td class='in1'>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                            echo "<td class='in1'>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                            echo "<td class='in1'>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                            echo "<td class='in1'>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                            echo "<td class='in1'>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                            echo "<td class='blank'>";
                            echo "<td class='in1'>" . number_format(round($_woba2 * 1, 3),3) . "</td>";
                            echo "</tr>";

                          }
                        }
                      }

                      #Park Adjustments

                      $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'pkwnvla'";

                      if($result2 = mysqli_query($link, $sql2)){
                          if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_array($result2)){

                              $_single2 = $row2['single'] * -1;
                              $_double2 = $row2['double'] * -1;
                              $_triple2 = $row2['triple'] * -1;
                              $_hr2 = $row2['hr'] * -1;
                              $_sacb2 = $row2['sacb'] * -1;
                              $_walk2 = $row2['walk'] * -1;
                              $_k2 = $row2['strikeout'] * -1;
                              $_gb2 = $row2['ground_ball'] * -1;
                              $_fb2 = $row2['fly_ball'] * -1;
                              $_ld2 = $row2['line_drive'] * -1;
                              $_po2 = $row2['popup'] * -1;
                              $_pa2 = $row2['pa'];
                              $_woba2 = $row2['woba'] * -1;
                              $_rowuse2 = 'Park Adjustments';

                                echo "<tr class='curr'>";
                                echo "<td class='in1'>" . $_rowuse2 . "</td>";
                                echo "<td class='in1'>-</td>";
                                echo "<td class='blank'>";
                                echo "<td class='in1'>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                                echo "<td class='in1'>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                                echo "<td class='in1'>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                                echo "<td class='in1'>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                                echo "<td class='blank'>";
                                echo "<td class='in1'>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                                echo "<td class='in1'>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                                echo "<td class='blank'>";
                                echo "<td class='in1'>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                                echo "<td class='in1'>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                                echo "<td class='in1'>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                                echo "<td class='in1'>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                                echo "<td class='in1'>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                                echo "<td class='blank'>";
                                echo "<td class='in1'>" . number_format(round($_woba2 * 1, 3),3) . "</td>";
                                echo "</tr>";

                              }
                            }
                          }

                          #Home Adv Adjustments

                          $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'hapkwnvla'";

                          if($result2 = mysqli_query($link, $sql2)){
                              if(mysqli_num_rows($result2) > 0){
                                while($row2 = mysqli_fetch_array($result2)){

                                  $_single2 = $row2['single'] * -1;
                                  $_double2 = $row2['double'] * -1;
                                  $_triple2 = $row2['triple'] * -1;
                                  $_hr2 = $row2['hr'] * -1;
                                  $_sacb2 = $row2['sacb'] * -1;
                                  $_walk2 = $row2['walk'] * -1;
                                  $_k2 = $row2['strikeout'] * -1;
                                  $_gb2 = $row2['ground_ball'] * -1;
                                  $_fb2 = $row2['fly_ball'] * -1;
                                  $_ld2 = $row2['line_drive'] * -1;
                                  $_po2 = $row2['popup'] * -1;
                                  $_pa2 = $row2['pa'];
                                  $_woba2 = $row2['woba'] * -1;
                                  $_rowuse2 = 'Home Adv Adjustments';

                                    echo "<tr class='curr'>";
                                    echo "<td class='in1'>" . $_rowuse2 . "</td>";
                                    echo "<td class='in1'>-</td>";
                                    echo "<td class='blank'>";
                                    echo "<td class='in1'>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                                    echo "<td class='in1'>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                                    echo "<td class='in1'>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                                    echo "<td class='in1'>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                                    echo "<td class='blank'>";
                                    echo "<td class='in1'>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                                    echo "<td class='in1'>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                                    echo "<td class='blank'>";
                                    echo "<td class='in1'>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                                    echo "<td class='in1'>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                                    echo "<td class='in1'>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                                    echo "<td class='in1'>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                                    echo "<td class='in1'>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                                    echo "<td class='blank'>";
                                    echo "<td class='in1'>" . number_format(round($_woba2 * 1, 3),3) . "</td>";
                                    echo "</tr>";

                                  }
                                }
                              }

                              #Opponent Adjustments

                              $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'adj2'";

                              if($result2 = mysqli_query($link, $sql2)){
                                  if(mysqli_num_rows($result2) > 0){
                                    while($row2 = mysqli_fetch_array($result2)){

                                      $_single2 = $row2['single'] * -1;
                                      $_double2 = $row2['double'] * -1;
                                      $_triple2 = $row2['triple'] * -1;
                                      $_hr2 = $row2['hr'] * -1;
                                      $_sacb2 = $row2['sacb'] * -1;
                                      $_walk2 = $row2['walk'] * -1;
                                      $_k2 = $row2['strikeout'] * -1;
                                      $_gb2 = $row2['ground_ball'] * -1;
                                      $_fb2 = $row2['fly_ball'] * -1;
                                      $_ld2 = $row2['line_drive'] * -1;
                                      $_po2 = $row2['popup'] * -1;
                                      $_pa2 = $row2['pa'];
                                      $_woba2 = $row2['woba'] * -1;
                                      $_rowuse2 = 'Opponent Adjustments';

                                        echo "<tr class='curr'>";
                                        echo "<td class='in1'>" . $_rowuse2 . "</td>";
                                        echo "<td class='in1'>-</td>";
                                        echo "<td class='blank'>";
                                        echo "<td class='in1'>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                                        echo "<td class='in1'>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                                        echo "<td class='in1'>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                                        echo "<td class='in1'>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                                        echo "<td class='blank'>";
                                        echo "<td class='in1'>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                                        echo "<td class='in1'>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                                        echo "<td class='blank'>";
                                        echo "<td class='in1'>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                                        echo "<td class='in1'>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                                        echo "<td class='in1'>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                                        echo "<td class='in1'>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                                        echo "<td class='in1'>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                                        echo "<td class='blank'>";
                                        echo "<td class='in1'>" . number_format(round($_woba2 * 1, 3),3) . "</td>";
                                        echo "</tr>";

                                      }
                                    }
                                  }

                                  #Total Adjustments

                                  $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'totaladj'";

                                  if($result2 = mysqli_query($link, $sql2)){
                                      if(mysqli_num_rows($result2) > 0){
                                        while($row2 = mysqli_fetch_array($result2)){

                                          $_single2 = $row2['single'] * -1;
                                          $_double2 = $row2['double'] * -1;
                                          $_triple2 = $row2['triple'] * -1;
                                          $_hr2 = $row2['hr'] * -1;
                                          $_sacb2 = $row2['sacb'] * -1;
                                          $_walk2 = $row2['walk'] * -1;
                                          $_k2 = $row2['strikeout'] * -1;
                                          $_gb2 = $row2['ground_ball'] * -1;
                                          $_fb2 = $row2['fly_ball'] * -1;
                                          $_ld2 = $row2['line_drive'] * -1;
                                          $_po2 = $row2['popup'] * -1;
                                          $_pa2 = $row2['pa'];
                                          $_woba2 = $row2['woba'] * -1;
                                          $_rowuse2 = 'Total Adjustments';

                                            echo "<tr class='curr'>";
                                            echo "<td class='in2'><b>" . $_rowuse2 . "</td>";
                                            echo "<td class='in2'><b>-</td>";
                                            echo "<td class='blank'>";
                                            echo "<td class='in2'><b>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                                            echo "<td class='in2'><b>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                                            echo "<td class='in2'><b>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                                            echo "<td class='in2'><b>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                                            echo "<td class='blank'>";
                                            echo "<td class='in2'><b>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                                            echo "<td class='in2'><b>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                                            echo "<td class='blank'>";
                                            echo "<td class='in2'><b>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                                            echo "<td class='in2'><b>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                                            echo "<td class='in2'><b>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                                            echo "<td class='in2'><b>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                                            echo "<td class='in2'><b>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                                            echo "<td class='blank'>";
                                            echo "<td class='in2'><b>" . number_format(round($_woba2 * 1, 3),3) . "</b></td>";
                                            echo "</tr>";

                                          }
                                        }
                                      }



                                      #Final vs. Leage Average

                                      $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'vlafinal'";

                                      if($result2 = mysqli_query($link, $sql2)){
                                          if(mysqli_num_rows($result2) > 0){
                                            while($row2 = mysqli_fetch_array($result2)){

                                              $_single2 = $row2['single'];
                                              $_double2 = $row2['double'];
                                              $_triple2 = $row2['triple'];
                                              $_hr2 = $row2['hr'];
                                              $_sacb2 = $row2['sacb'];
                                              $_walk2 = $row2['walk'];
                                              $_k2 = $row2['strikeout'];
                                              $_gb2 = $row2['ground_ball'];
                                              $_fb2 = $row2['fly_ball'];
                                              $_ld2 = $row2['line_drive'];
                                              $_po2 = $row2['popup'];
                                              $_pa2 = $row2['pa'];
                                              $_woba2 = $row2['woba'];
                                              $_rowuse2 = 'Final vs. League Average';

                                                echo "<tr class='curr'>";
                                                echo "<td class='te1'>" . $_rowuse2 . "</td>";
                                                echo "<td class='te1'>" . number_format(round($_pa2, 0),0) . "</td>";
                                                echo "<td class='blank'>";
                                                echo "<td class='te1'>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                                                echo "<td class='te1'>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                                                echo "<td class='te1'>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                                                echo "<td class='te1'>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                                                echo "<td class='blank'>";
                                                echo "<td class='te1'>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                                                echo "<td class='te1'>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                                                echo "<td class='blank'>";
                                                echo "<td class='te1'>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                                                echo "<td class='te1'>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                                                echo "<td class='te1'>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                                                echo "<td class='te1'>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                                                echo "<td class='te1'>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                                                echo "<td class='blank'>";
                                                echo "<td class='te1'>" . number_format(round($_woba2 * 1, 3),3) . "</td>";
                                                echo "</tr>";

                                              }
                                            }
                                          }

                                          #Final Percentages

                                          $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'final'";

                                          if($result2 = mysqli_query($link, $sql2)){
                                              if(mysqli_num_rows($result2) > 0){
                                                while($row2 = mysqli_fetch_array($result2)){

                                                  $_single2 = $row2['single'];
                                                  $_double2 = $row2['double'];
                                                  $_triple2 = $row2['triple'];
                                                  $_hr2 = $row2['hr'];
                                                  $_sacb2 = $row2['sacb'];
                                                  $_walk2 = $row2['walk'];
                                                  $_k2 = $row2['strikeout'];
                                                  $_gb2 = $row2['ground_ball'];
                                                  $_fb2 = $row2['fly_ball'];
                                                  $_ld2 = $row2['line_drive'];
                                                  $_po2 = $row2['popup'];
                                                  $_pa2 = $row2['pa'];
                                                  $_woba2 = $row2['woba'];
                                                  $_rowuse2 = 'Final Percentages *';

                                                    echo "<tr class='curr'>";
                                                    echo "<td class='te2'><b>" . $_rowuse2 . "</td>";
                                                    echo "<td class='te2'><b>" . number_format(round($_pa2, 0),0) . "</td>";
                                                    echo "<td class='blank'>";
                                                    echo "<td class='te2'><b>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                                                    echo "<td class='te2'><b>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                                                    echo "<td class='te2'><b>" . number_format(round($_triple2 * 100, 2),2) . "</td>";
                                                    echo "<td class='te2'><b>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                                                    echo "<td class='blank'>";
                                                    echo "<td class='te2'><b>" . number_format(round($_sacb2 * 100, 2),2) . "</td>";
                                                    echo "<td class='te2'><b>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                                                    echo "<td class='blank'>";
                                                    echo "<td class='te2'><b>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                                                    echo "<td class='te2'><b>" . number_format(round($_gb2 * 100, 1), 1) . "</td>";
                                                    echo "<td class='te2'><b>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                                                    echo "<td class='te2'><b>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                                                    echo "<td class='te2'><b>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                                                    echo "<td class='blank'>";
                                                    echo "<td class='te2'><b>" . number_format(round($_woba2 * 1, 3),3) . "</td>";
                                                    echo "</tr>";

                                                  }
                                                }
                                              }

                                              #Total Adjustment Ranks

                                              $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'totaladj_rankp'";

                                              if($result2 = mysqli_query($link, $sql2)){
                                                  if(mysqli_num_rows($result2) > 0){
                                                    while($row2 = mysqli_fetch_array($result2)){

                                                      if ($branch == 'B') {
                                                        $_single2 = 1 - $row2['single'];
                                                        $_double2 = 1 - $row2['double'];
                                                        $_triple2 = 1 - $row2['triple'];
                                                        $_hr2 = 1 - $row2['hr'];
                                                        $_sacb2 = 1 - $row2['sacb'];
                                                        $_walk2 = 1 - $row2['walk'];
                                                        $_k2 = $row2['strikeout'];
                                                        $_gb2 = $row2['ground_ball'];
                                                        $_fb2 = $row2['fly_ball'];
                                                        $_ld2 = $row2['line_drive'];
                                                        $_po2 = $row2['popup'];
                                                        $_pa2 = $row2['pa'];
                                                        $_woba2 = 1 - $row2['woba'];
                                                      }
                                                      else {
                                                        $_single2 = 1 - $row2['single'];
                                                        $_double2 = 1 - $row2['double'];
                                                        $_triple2 = 1 - $row2['triple'];
                                                        $_hr2 = 1 - $row2['hr'];
                                                        $_sacb2 = 1 - $row2['sacb'];
                                                        $_walk2 = 1 - $row2['walk'];
                                                        $_k2 = $row2['strikeout'];
                                                        $_gb2 = $row2['ground_ball'];
                                                        $_fb2 = $row2['fly_ball'];
                                                        $_ld2 = $row2['line_drive'];
                                                        $_po2 = $row2['popup'];
                                                        $_pa2 = $row2['pa'];
                                                        $_woba2 = 1 - $row2['woba'];
                                                      }
                                                        $_rowuse2 = 'Degree of Difficulty Percentile Rank';

                                                      $_singlecol = color_brewer2($_single2);
                                                      $_doublecol = color_brewer2($_double2);
                                                      $_triplecol = color_brewer2($_triple2);
                                                      $_hrcol = color_brewer2($_hr2);
                                                      $_walkcol = color_brewer2($_walk2);

                                                      $_kcol = color_brewer2($_k2);
                                                      $_gbcol = color_brewer2($_gb2);
                                                      $_fbcol = color_brewer2($_fb2);
                                                      $_ldcol = color_brewer2($_ld2);
                                                      $_pocol = color_brewer2($_po2);

                                                      $_wobacol = color_brewer2($_woba2);

                                                        echo "<tr class='blank'>";
                                                        echo "</tr>";
                                                        echo "<tr class='blank'>";
                                                        echo "</tr>";
                                                        echo "<tr class='blank'>";
                                                        echo "</tr>";
                                                        echo "<tr class='curr'>";
                                                        echo "<td class='no'><b>" . $_rowuse2 . "</td>";
                                                        echo "<td class='no'><b>-</td>";
                                                        echo "<td class='blank'>";
                                                        echo "<td class='no' style='background-color:rgb(". $_singlecol . "'><b>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                                                        echo "<td class='no' style='background-color:rgb(". $_doublecol . "'><b>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                                                        echo "<td class='no' style='background-color:rgb(". $_triplecol . "'><b>" . number_format(round($_triple2 * 100, 1),1) . "</td>";
                                                        echo "<td class='no' style='background-color:rgb(". $_hrcol . "'><b>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                                                        echo "<td class='blank'>";
                                                        echo "<td class='no'><b>-</td>";
                                                        echo "<td class='no' style='background-color:rgb(". $_walkcol . "'><b>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                                                        echo "<td class='blank'>";
                                                        echo "<td class='no' style='background-color:rgb(". $_kcol . "'><b>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                                                        echo "<td class='no' style='background-color:rgb(". $_gbcol . "'><b>" . number_format(round($_gb2 * 100, 1),1) . "</td>";
                                                        echo "<td class='no' style='background-color:rgb(". $_fbcol . "'><b>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                                                        echo "<td class='no' style='background-color:rgb(". $_ldcol . "'><b>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                                                        echo "<td class='no' style='background-color:rgb(". $_pocol . "'><b>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                                                        echo "<td class='blank'>";
                                                        echo "<td class='no' style='background-color:rgb(". $_wobacol . "'><b>" . number_format(round($_woba2 * 100, 1),1) . "</td>";
                                                        echo "</tr>";


                                                      }
                                                    }
                                                  }

                                                  #Percentile Ranks

                                                  $sql2 = "SELECT * FROM wobasplit WHERE player_id = $tbl_id AND branch = '" . $branch . "' AND split = '" . $split . "' AND `cascade` = 'final_rankp'";

                                                  if($result2 = mysqli_query($link, $sql2)){
                                                      if(mysqli_num_rows($result2) > 0){
                                                        while($row2 = mysqli_fetch_array($result2)){

                                                          if ($branch == 'B') {
                                                            $_single2 = 1 - $row2['single'];
                                                            $_double2 = 1 - $row2['double'];
                                                            $_triple2 = 1 - $row2['triple'];
                                                            $_hr2 = 1 - $row2['hr'];
                                                            $_sacb2 = 1 - $row2['sacb'];
                                                            $_walk2 = 1 - $row2['walk'];
                                                            $_k2 = 1 - $row2['strikeout'];
                                                            $_gb2 = 1 - $row2['ground_ball'];
                                                            $_fb2 = 1 - $row2['fly_ball'];
                                                            $_ld2 = 1 - $row2['line_drive'];
                                                            $_po2 = 1 - $row2['popup'];
                                                            $_pa2 = 1 - $row2['pa'];
                                                            $_woba2 = 1 - $row2['woba'];
                                                          }
                                                          else {
                                                            $_single2 = 1 - $row2['single'];
                                                            $_double2 = 1 - $row2['double'];
                                                            $_triple2 = 1 - $row2['triple'];
                                                            $_hr2 = 1 - $row2['hr'];
                                                            $_sacb2 = 1 - $row2['sacb'];
                                                            $_walk2 = 1 - $row2['walk'];
                                                            $_k2 = $row2['strikeout'];
                                                            $_gb2 = $row2['ground_ball'];
                                                            $_fb2 = $row2['fly_ball'];
                                                            $_ld2 = $row2['line_drive'];
                                                            $_po2 = $row2['popup'];
                                                            $_pa2 = $row2['pa'];
                                                            $_woba2 = 1 - $row2['woba'];
                                                          }
                                                          $_rowuse2 = 'MLB Percentile Ranks';

                                                          $_singlecol = color_brewer($_single2);
                                                          $_doublecol = color_brewer($_double2);
                                                          $_triplecol = color_brewer($_triple2);
                                                          $_hrcol = color_brewer($_hr2);
                                                          $_walkcol = color_brewer($_walk2);

                                                          $_kcol = color_brewer($_k2);
                                                          $_gbcol = color_brewer($_gb2);
                                                          $_fbcol = color_brewer($_fb2);
                                                          $_ldcol = color_brewer($_ld2);
                                                          $_pocol = color_brewer($_po2);

                                                          $_wobacol = color_brewer($_woba2);

                                                          $_pacol = color_brewer($_pa2);

                                                            echo "<tr class='blank'>";
                                                            echo "</tr>";
                                                            echo "<tr class='blank'>";
                                                            echo "</tr>";
                                                            echo "<tr class='blank'>";
                                                            echo "</tr>";
                                                            echo "<tr class='curr'>";
                                                            echo "<td class='no'><b>" . $_rowuse2 . "</td>";
                                                            echo "<td class='no' style='background-color:rgb(". $_pacol . "'><b>" . number_format(round($_pa2 * 100, 1),1) . "</td>";
                                                            echo "<td class='blank'>";
                                                            echo "<td class='no' style='background-color:rgb(". $_singlecol . "'><b>" . number_format(round($_single2 * 100, 1),1) . "</td>";
                                                            echo "<td class='no' style='background-color:rgb(". $_doublecol . "'><b>" . number_format(round($_double2 * 100, 1),1) . "</td>";
                                                            echo "<td class='no' style='background-color:rgb(". $_triplecol . "'><b>" . number_format(round($_triple2 * 100, 1),1) . "</td>";
                                                            echo "<td class='no' style='background-color:rgb(". $_hrcol . "'><b>" . number_format(round($_hr2 * 100, 1),1) . "</td>";
                                                            echo "<td class='blank'>";
                                                            echo "<td class='no'><b>-</td>";
                                                            echo "<td class='no' style='background-color:rgb(". $_walkcol . "'><b>" . number_format(round($_walk2 * 100, 1),1) . "</td>";
                                                            echo "<td class='blank'>";
                                                            echo "<td class='no' style='background-color:rgb(". $_kcol . "'><b>" . number_format(round($_k2 * 100, 1),1) . "</td>";
                                                            echo "<td class='no' style='background-color:rgb(". $_gbcol . "'><b>" . number_format(round($_gb2 * 100, 1),1) . "</td>";
                                                            echo "<td class='no' style='background-color:rgb(". $_fbcol . "'><b>" . number_format(round($_fb2 * 100, 1),1) . "</td>";
                                                            echo "<td class='no' style='background-color:rgb(". $_ldcol . "'><b>" . number_format(round($_ld2 * 100, 1),1) . "</td>";
                                                            echo "<td class='no' style='background-color:rgb(". $_pocol . "'><b>" . number_format(round($_po2 * 100, 1),1) . "</td>";
                                                            echo "<td class='blank'>";
                                                            echo "<td class='no' style='background-color:rgb(". $_wobacol . "'><b>" . number_format(round($_woba2 * 100, 1),1) . "</td>";
                                                            echo "</tr>";
                                                            echo "</table>";

                                                          }
                                                        }
                                                      }





    }
  }
}

function color_brewer($_value)
{

  $_greenset_r = 0;
  $_greenset_g = 255;
  $_greenset_b = 0;

  $_redset_r = 255;
  $_redset_g = 59;
  $_redset_b = 59;

  if ($_value > .5) {

    $_r = $_greenset_r + ((255 - $_greenset_r) *(2*(0.5-($_value - 0.5))));
    $_g = $_greenset_g + ((255 - $_greenset_g) *(2*(0.5-($_value - 0.5))));
    $_b = $_greenset_b + ((255 - $_greenset_b) *(2*(0.5-($_value - 0.5))));

  }

  else if ($_value == .5) {

    $_r = 255;
    $_g = 255;
    $_b = 255;

  }

  else {

    $_r = $_redset_r + ((255 - $_redset_r) *(2*(0.5-(0.5 - $_value))));
    $_g = $_redset_g + ((255 - $_redset_g) *(2*(0.5-(0.5 - $_value))));
    $_b = $_redset_b + ((255 - $_redset_b) *(2*(0.5-(0.5 - $_value))));

  }

  $_rgb = $_r . ", " . $_g . ", " . $_b;
  return $_rgb;
}

function color_brewer2($_value)
{

  $_greenset_r = 237;
  $_greenset_g = 125;
  $_greenset_b = 49;

  $_redset_r = 0;
  $_redset_g = 112;
  $_redset_b = 192;

  if ($_value > .5) {

    $_r = $_greenset_r + ((255 - $_greenset_r) *(2*(0.5-($_value - 0.5))));
    $_g = $_greenset_g + ((255 - $_greenset_g) *(2*(0.5-($_value - 0.5))));
    $_b = $_greenset_b + ((255 - $_greenset_b) *(2*(0.5-($_value - 0.5))));

  }

  else if ($_value == .5) {

    $_r = 255;
    $_g = 255;
    $_b = 255;

  }

  else {

    $_r = $_redset_r + ((255 - $_redset_r) *(2*(0.5-(0.5 - $_value))));
    $_g = $_redset_g + ((255 - $_redset_g) *(2*(0.5-(0.5 - $_value))));
    $_b = $_redset_b + ((255 - $_redset_b) *(2*(0.5-(0.5 - $_value))));

  }

  $_rgb = $_r . ", " . $_g . ", " . $_b;
  return $_rgb;
}
