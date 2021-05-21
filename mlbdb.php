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

<h1><center>Sports Betting Truth Major League Baseball Model Outputs</center></h1>

<br>
<table id="navbar">
<tr>
<th><a href="mlbdb.php">All Model Plays</a></th>
<th><a href="mymlb.php">SBT's Plays</th>
<th><a href="/blog/">Blog</th>
</tr>
</table>
<br>

<?php
$link = mysqli_connect("localhost", "wcleiss", "Horacebroadnax", "Travis");
//$link = mysqli_connect("localhost", "root", "", "csv_db 13");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_GET['year'])) {
  $tbl_year = $_GET["year"];
  $tbl_month = $_GET["month"];
  $tbl_day = $_GET["day"];
  $tbl_season = $_GET["season"];
  $tbl_season_back = $tbl_season - 1;
}

else {
  $top_sql = "SELECT Month, Day, Year FROM webdb ORDER BY Year, Month DESC LIMIT 1";
  $top_sql_query = mysqli_query($link, $top_sql);
  $row = mysqli_fetch_array($top_sql_query);
  $tbl_year = $row['Year'];
  $tbl_month = $row['Month'];
  $tbl_day = $row['Day'];

  $tbl_season = $tbl_year;
}

//Calendar Boxes
echo "<table id='datebar'>";

//March
$dec_sql = "SELECT Month, Day, Year FROM webdb WHERE Month = 3 AND Year = $tbl_year GROUP BY Day";
$dec_result = mysqli_query($link, $dec_sql);
if(mysqli_num_rows($dec_result) > 0){
  echo "<tr>";
  echo "<th>March</th>";
  while($row = mysqli_fetch_array($dec_result)){
    echo "<th><b><a href=mlbdb.php?year=" . $tbl_season . "&month=3&day=" . $row['Day'] . "&season=" . $tbl_season . ">" . $row['Day'] . "</b></a></th>";
  }
  echo "</th>";
  echo "</tr>";
}

//April
$dec_sql = "SELECT Month, Day, Year FROM webdb WHERE Month = 4 AND Year = $tbl_year GROUP BY Day";
$dec_result = mysqli_query($link, $dec_sql);
if(mysqli_num_rows($dec_result) > 0){
  echo "<tr>";
  echo "<th>April</th>";
  while($row = mysqli_fetch_array($dec_result)){
    echo "<th><b><a href=mlbdb.php?year=" . $tbl_season . "&month=4&day=" . $row['Day'] . "&season=" . $tbl_season . ">" . $row['Day'] . "</b></a></th>";
  }
  echo "</th>";
  echo "</tr>";
}

//May
$dec_sql = "SELECT Month, Day, Year FROM webdb WHERE Month = 5 AND Year = $tbl_year GROUP BY Day";
$dec_result = mysqli_query($link, $dec_sql);
if(mysqli_num_rows($dec_result) > 0){
  echo "<tr>";
  echo "<th>May</th>";
  while($row = mysqli_fetch_array($dec_result)){
    echo "<th><b><a href=mlbdb.php?year=" . $tbl_season . "&month=5&day=" . $row['Day'] . "&season=" . $tbl_season . ">" . $row['Day'] . "</b></a></th>";
  }
  echo "</th>";
  echo "</tr>";
}

//June
$dec_sql = "SELECT Month, Day, Year FROM webdb WHERE Month = 6 AND Year = $tbl_year GROUP BY Day";
$dec_result = mysqli_query($link, $dec_sql);
if(mysqli_num_rows($dec_result) > 0){
  echo "<tr>";
  echo "<th>June</th>";
  while($row = mysqli_fetch_array($dec_result)){
    echo "<th><b><a href=mlbdb.php?year=" . $tbl_season . "&month=6&day=" . $row['Day'] . "&season=" . $tbl_season . ">" . $row['Day'] . "</b></a></th>";
  }
  echo "</th>";
  echo "</tr>";
}

//July
$dec_sql = "SELECT Month, Day, Year FROM webdb WHERE Month = 7 AND Year = $tbl_year GROUP BY Day";
$dec_result = mysqli_query($link, $dec_sql);
if(mysqli_num_rows($dec_result) > 0){
  echo "<tr>";
  echo "<th>July</th>";
  while($row = mysqli_fetch_array($dec_result)){
    echo "<th><b><a href=mlbdb.php?year=" . $tbl_season . "&month=7&day=" . $row['Day'] . "&season=" . $tbl_season . ">" . $row['Day'] . "</b></a></th>";
  }
  echo "</th>";
  echo "</tr>";
}

//August
$dec_sql = "SELECT Month, Day, Year FROM webdb WHERE Month = 8 AND Year = $tbl_year GROUP BY Day";
$dec_result = mysqli_query($link, $dec_sql);
if(mysqli_num_rows($dec_result) > 0){
  echo "<tr>";
  echo "<th>August</th>";
  while($row = mysqli_fetch_array($dec_result)){
    echo "<th><b><a href=mlbdb.php?year=" . $tbl_season . "&month=8&day=" . $row['Day'] . "&season=" . $tbl_season . ">" . $row['Day'] . "</b></a></th>";
  }
  echo "</th>";
  echo "</tr>";
}

//September
$dec_sql = "SELECT Month, Day, Year FROM webdb WHERE Month = 9 AND Year = $tbl_year GROUP BY Day";
$dec_result = mysqli_query($link, $dec_sql);
if(mysqli_num_rows($dec_result) > 0){
  echo "<tr>";
  echo "<th>September</th>";
  while($row = mysqli_fetch_array($dec_result)){
    echo "<th><b><a href=mlbdb.php?year=" . $tbl_season . "&month=9&day=" . $row['Day'] . "&season=" . $tbl_season . ">" . $row['Day'] . "</b></a></th>";
  }
  echo "</th>";
  echo "</tr>";
}
//October
$dec_sql = "SELECT Month, Day, Year FROM webdb WHERE Month = 10 AND Year = $tbl_year GROUP BY Day";
$dec_result = mysqli_query($link, $dec_sql);
if(mysqli_num_rows($dec_result) > 0){
  echo "<tr>";
  echo "<th>October</th>";
  while($row = mysqli_fetch_array($dec_result)){
    echo "<th><b><a href=mlbdb.php?year=" . $tbl_season . "&month=10&day=" . $row['Day'] . "&season=" . $tbl_season . ">" . $row['Day'] . "</b></a></th>";
  }
  echo "</th>";
  echo "</tr>";
}
//November
$dec_sql = "SELECT Month, Day, Year FROM webdb WHERE Month = 11 AND Year = $tbl_year GROUP BY Day";
$dec_result = mysqli_query($link, $dec_sql);
if(mysqli_num_rows($dec_result) > 0){
  echo "<tr>";
  echo "<th>November</th>";
  while($row = mysqli_fetch_array($dec_result)){
    echo "<th><b><a href=mlbdb.php?year=" . $tbl_season . "&month=11&day=" . $row['Day'] . "&season=" . $tbl_season . ">" . $row['Day'] . "</b></a></th>";
  }
  echo "</th>";
  echo "</tr>";
}
echo "</table>";

//Results
echo "<br>";
echo "<h1><center>Results</center></h1>";
echo "<table id='bears'>";
echo "<tr>";
echo "<th class='blank'></th>";
echo "<th colspan='10' class='bl'>Moneyline</th>";
echo "<th class='blank'></th>";
echo "<th colspan='10' class='te'>Run Line(1.5)</th>";
echo "<th class='blank'></th>";
echo "<th colspan='10' class='co'>Overs</th>";
echo "<th class='blank'></th>";
echo "<th colspan='10' class='co'>Unders</th>";
echo "<th class='blank'></th>";
echo "</tr>";

echo "<tr>";
echo "<th class='blank'></th>";
echo "<th class='bl'>W</th>";
echo "<th class='bl'>L</th>";
echo "<th class='bl'>%</th>";
echo "<th class='bl'>U</th>";
echo "<th class='blank'></th>";
echo "<th class='bl'>Key W</th>";
echo "<th class='bl'>Key L</th>";
echo "<th class='bl'>Key %</th>";
echo "<th class='bl'>Key Value</th>";
echo "<th class='bl'>Key Unit</th>";
echo "<th class='blank'></th>";
echo "<th class='te'>W</th>";
echo "<th class='te'>L</th>";
echo "<th class='te'>%</th>";
echo "<th class='te'>U</th>";
echo "<th class='blank'></th>";
echo "<th class='te'>Key W</th>";
echo "<th class='te'>Key L</th>";
echo "<th class='te'>Key %</th>";
echo "<th class='te'>Key Value</th>";
echo "<th class='te'>Key Unit</th>";
echo "<th class='blank'></th>";
echo "<th class='co'>W</th>";
echo "<th class='co'>L</th>";
echo "<th class='co'>%</th>";
echo "<th class='co'>U</th>";
echo "<th class='blank'></th>";
echo "<th class='co'>Key W</th>";
echo "<th class='co'>Key L</th>";
echo "<th class='co'>Key %</th>";
echo "<th class='co'>Key Value</th>";
echo "<th class='co'>Key Unit</th>";
echo "<th class='blank'></th>";
echo "<th class='co'>W</th>";
echo "<th class='co'>L</th>";
echo "<th class='co'>%</th>";
echo "<th class='co'>U</th>";
echo "<th class='blank'></th>";
echo "<th class='co'>Key W</th>";
echo "<th class='co'>Key L</th>";
echo "<th class='co'>Key %</th>";
echo "<th class='co'>Key Value</th>";
echo "<th class='co'>Key Unit</th>";
echo "</tr>";

echo "<tr class='curr'>";
echo "<td>" . $tbl_month . "-" . $tbl_day . "-" . $tbl_year . "</td>";


$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Type = 'ML'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}

echo "<td class='blank'></td>";

$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Type = 'RL'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}

echo "<td class='blank'></td>";

$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Type = 'OVER'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}

echo "<td class='blank'></td>";

$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Type = 'UNDER'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}
echo "</tr>";

echo "<tr class='curr'>";
echo "<td>Last 14</td>";


$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = 14 AND Day = 14 AND Type = 'ML'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}

echo "<td class='blank'></td>";

$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = 14 AND Day = 14 AND Type = 'RL'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}

echo "<td class='blank'></td>";

$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = 14 AND Day = 14 AND Type = 'OVER'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}

echo "<td class='blank'></td>";

$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = 14 AND Day = 14 AND Type = 'UNDER'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}
echo "</tr>";

echo "<tr class='curr'>";
echo "<td>Year to Date</td>";


$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = 0 AND Day = 0 AND Type = 'ML'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}

echo "<td class='blank'></td>";

$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = 0 AND Day = 0 AND Type = 'RL'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}

echo "<td class='blank'></td>";

$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = 0 AND Day = 0 AND Type = 'OVER'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}

echo "<td class='blank'></td>";

$sql = "SELECT * FROM webresults WHERE Year = $tbl_year AND Month = 0 AND Day = 0 AND Type = 'UNDER'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $_win = $row['IsWin'];
        $_loss = $row['IsLoss'];
        $_unit = $row['Result'];

        $_keyw = $row['KeyWin'];
        $_keyl = $row['KeyLoss'];
        $_keyunit = $row['KeyUnit'];
        $_key = $row['KeyValue'];

        if ($_loss == 0 & $_win == 0) {
          $_winpct = 0;
        }
        elseif ($_loss == 0 & $_win > 0) {
          $_winpct = 1;
        }
        else {
          $_winpct = $_win / ($_win + $_loss);
        }


        if ($_keyw == 0 & $_keyl == 0) {
          $_kwinpct = 0;
        }
        elseif ($_keyl == 0 & $_keyw > 0) {
          $_kwinpct = 1;
        }
        else {
          $_kwinpct = $_keyw / ($_keyw + $_keyl);
        }

        echo "<td class='bl1'>" . $_win . "</td>";
        echo "<td class='bl1'>" . $_loss . "</td>";
        echo "<td class='bl1'>" . number_format(round($_winpct * 100, 1),1) . "</td>";
        if ($_unit > 0) { echo "<td class='win'>" . number_format(round($_unit, 2),2) . "</td>"; }
        else if ($_unit < 0) { echo "<td class='loss'>" . number_format(round($_unit, 2),2) . "</td>"; }
        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round($_keyw, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_keyl, 0),0) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_kwinpct * 100, 1),1) . "</td>";
        echo "<td class='bl1'>" . number_format(round($_key * 100, 2),2) . "</td>";
        if ($_keyunit > 0) { echo "<td class='win'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
        else if ($_keyunit < 0) { echo "<td class='loss'>" . number_format(round($_keyunit, 2),2) . "</td>"; }
    }
  }
  else {
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='blank'></td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
    echo "<td class='bl1'>0</td>";
  }
}
echo "</tr>";


echo "</table>";
echo "<br>";

//Game Lineup

echo "<h1><center>Games Of " . $tbl_month . "-" . $tbl_day . "-" . $tbl_year . "</center></h1>";
$sql = "SELECT * FROM webdb WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day";
$tab_count = 15;
$row_count = 0;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      echo "<table id='cbb'>";
      while($row = mysqli_fetch_array($result)){
        if($tab_count >= 10) {
          echo "<tr>";
          echo "<th>Box</th>";
          echo "<th class='blank'></th>";
          echo "<th colspan='2'>RL</th>";
          echo "<th colspan='2'>O/U</th>";
          echo "<th>ML</th>";
          echo "<th class='blank'></th>";
          echo "<th colspan='2'>WX</th>";
          echo "<th class='blank'></th>";
          echo "<th colspan='4'>Matchup</th>";
          echo "<th class='blank'></th>";
          echo "<th>R</th>";
          echo "<th>H</th>";
          echo "<th>E</th>";
          echo "<th class='blank'></th>";
          echo "<th>Win %</th>";
          echo "<th>RL %</th>";
          echo "<th>O/U %</th>";
          echo "<th class='blank'></th>";
          echo "<th class>F5</th>";
          echo "<th>F5 Win%</th>";
          echo "<th>F5 Runs</th>";
          echo "<th class='blank'></th>";
          echo "<th>ML Value</th>";
          echo "<th>RL Value</th>";
          echo "<th>O/U Value</th>";
          echo "<th class='blank'></th>";
          echo "<th>ML Play</th>";
          echo "<th>RL Play</th>";
          echo "<th>O/U Play</th>";
          echo "<th class='blank'></th>";
          echo "<th>ML Res</th>";
          echo "<th>RL Res</th>";
          echo "<th>O/U Res</th>";
          echo "</tr>";
          $tab_count = 0;
        }
        $tab_count = $tab_count + 1;

        //Away Team

        $a_rl = $row['ARL'];
        $a_rlj = $row['ARLJ'];
        $_tot = $row['TOT'];
        $_oj = $row['TOJ'];
        $a_ml = $row['AML'];
        $_temp = $row['TEMP'];
        $_windspd = $row['WINDSPD'];
        $a_team = $row['Away'];
        $h_team = $row['Home'];
        $a_actscore = $row['ACTASCORE'];
        $h_actscore = $row['ACTHSCORE'];
        $a_pithand = $row['AHAND'];
        $a_starter = $row['ASTARTER'];
        $a_runs = $row['ASCORE'];
        $a_hits = $row['AHIT'];
        $a_errors = $row['AERROR'];
        $a_winpct = $row['AWINPCT'];
        $a_rlpct = $row['ARLPCT'];
        $o_pct = $row['OPCT'];
        $a_f5winpct = $row['AF5WIN'];
        $a_f5runs = $row['AF5SCORE'];
        $a_mlvalue = $row['AMLVALUE'];
        $a_rlvalue = $row['ARLVALUE'];
        $o_value = $row['OPCTVALUE'];
        $ml_play = $row['MLPLAY'];
        $rl_play = $row['RLPLAY'];
        $tot_play = $row['TOTPLAY'];
        $ml_res = $row['MLRES'];
        $rl_res = $row['RLRES'];
        $tot_res = $row['TOTRES'];
        $a_f5actscore = $row['AF5ACTSCORE'];
        $h_f5actscore = $row['HF5ACTSCORE'];
        $_gameno = $row['DHNo'];


        echo "<tr class='even'>";
        echo "<td class='no'><b><a href=mlbbox.php?year=" . $tbl_year . "&month=" . $tbl_month . "&day=" . $tbl_day . "&gameno=" . $_gameno . "&ateam=" . $a_team . "&hteam=" . $h_team . ">Box</b></a></th>";
        echo "<td class='blank'></td>";
        echo "<td class='te1'>" . $a_rl . "</td>";
        echo "<td class='te1'>" . $a_rlj . "</td>";
        echo "<td class='co1'>O " . $_tot . "</td>";
        echo "<td class='co1'>" . $_oj . "</td>";
        echo "<td class='bl1'>" . $a_ml . "</td>";
        echo "<td class='blank'></td>";
        echo "<td class='no'>" . $_temp . "</td>";
        echo "<td class='no'>" . $_windspd . "</td>";
        echo "<td class='blank'></td>";
        if ($a_actscore > $h_actscore) { echo "<td class='top'><b>" . $a_actscore . "<b></td>"; }
        else { echo "<td class='no'><b>" . $a_actscore . "<b></td>"; }
        echo "<td class='at1'><b>" . $a_team . "</b></td>";
        echo "<td class='no'>" . $a_pithand . "</td>";
        echo "<td class='no'>" . $a_starter . "</td>";
        echo "<td class='blank'></td>";
        echo "<td class='no'>" . number_format(round($a_runs, 1),1) . "</td>";
        echo "<td class='no'>" . number_format(round($a_hits, 1),1) . "</td>";
        echo "<td class='no'>" . number_format(round($a_errors, 1),1) . "</td>";

        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round(($a_winpct * 100), 1),1) . "</td>";
        echo "<td class='te1'>" . number_format(round(($a_rlpct * 100), 1),1) . "</td>";
        echo "<td class='co1'>" . number_format(round(($o_pct * 100), 1),1) . "</td>";

        echo "<td class='blank'></td>";
        if ($a_f5actscore > $h_f5actscore) { echo "<td class='top'><b>" . $a_f5actscore . "<b></td>"; }
        else { echo "<td class='no'><b>" . $a_f5actscore . "<b></td>"; }
        echo "<td class='no'>" . number_format(round(($a_f5winpct * 100), 1),1) . "</td>";
        echo "<td class='no'>" . number_format(round($a_f5runs, 1),1) . "</td>";

        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round(($a_mlvalue * 100), 1),1) . "</td>";
        echo "<td class='te1'>" . number_format(round(($a_rlvalue * 100), 1),1) . "</td>";
        echo "<td class='co1'>" . number_format(round(($o_value * 100), 1),1) . "</td>";

        echo "<td class='blank'></td>";
        if ($ml_play == 'A') { echo "<td class='bl1'>●</td>"; }
        else { echo "<td class='bl1'></td>"; }

        if ($rl_play == 'A') { echo "<td class='te1'>●</td>"; }
        else { echo "<td class='te1'></td>"; }

        if ($tot_play == 'O') { echo "<td class='co1'>●</td>"; }
        else { echo "<td class='co1'></td>"; }

        echo "<td class='blank'></td>";

        if ($ml_play == "A") {
          if ($ml_res < 0) { echo "<td class='loss'>-1</td>"; }
          else if ($ml_res > 0) { echo "<td class='win'>" . number_format(round($ml_res, 2),2) . "</td>"; }
          else { echo "<td class='bl1'>" . number_format(round($ml_res, 2),2) . "</td>"; }
        }
        else { echo "<td class='bl1'></td>"; }

        if ($rl_play == "A") {
          if ($rl_res < 0) { echo "<td class='loss'>-1</td>"; }
          else if ($rl_res > 0) { echo "<td class='win'>" . number_format(round($rl_res, 2),2) . "</td>"; }
          else { echo "<td class='te1'>" . number_format(round($rl_res, 2),2) . "</td>"; }
        }
        else { echo "<td class='te1'></td>"; }

        if ($tot_play == "O") {
          if ($tot_res < 0) { echo "<td class='loss'>-1</td>"; }
          else if ($tot_res > 0) { echo "<td class='win'>" . number_format(round($tot_res, 2),2) . "</td>"; }
          else { echo "<td class='co1'>" . number_format(round($tot_res, 2),2) . "</td>"; }
        }
        else { echo "<td class='co1'></td>"; }

        //Home Team

        $h_rl = $row['HRL'];
        $h_rlj = $row['HRLJ'];
        $_uj = $row['TUJ'];
        $h_ml = $row['HML'];
        $_winddir = $row['WINDDIR'];
        $h_team = $row['Home'];

        $h_pithand = $row['HHAND'];
        $h_starter = $row['HSTARTER'];
        $h_runs = $row['HSCORE'];
        $h_hits = $row['HHIT'];
        $h_errors = $row['HERROR'];
        $h_winpct = $row['HWINPCT'];
        $h_rlpct = $row['HRLPCT'];
        $u_pct = $row['UPCT'];
        $h_f5winpct = $row['HF5WIN'];
        $h_f5runs = $row['HF5SCORE'];
        $h_mlvalue = $row['HMLVALUE'];
        $h_rlvalue = $row['HRLVALUE'];
        $u_value = $row['UPCTVALUE'];



        echo "<tr class='odd'>";
        echo "<td class='blank'></td>";
        echo "<td class='blank'></td>";
        echo "<td class='te1'>" . $h_rl . "</td>";
        echo "<td class='te1'>" . $h_rlj . "</td>";
        echo "<td class='co1'>U " . $_tot . "</td>";
        echo "<td class='co1'>" . $_uj . "</td>";
        echo "<td class='bl1'>" . $h_ml . "</td>";
        echo "<td class='blank'></td>";
        echo "<td class='blank'></td>";
        echo "<td class='no'>" . $_winddir . "</td>";
        echo "<td class='blank'></td>";
        if ($a_actscore < $h_actscore) { echo "<td class='top'><b>" . $h_actscore . "<b></td>"; }
        else { echo "<td class='no'><b>" . $h_actscore . "<b></td>"; }
        echo "<td class='at1'><b>" . $h_team . "</b></td>";
        echo "<td class='no'>" . $h_pithand . "</td>";
        echo "<td class='no'>" . $h_starter . "</td>";
        echo "<td class='blank'></td>";
        echo "<td class='no'>" . number_format(round($h_runs, 1),1) . "</td>";
        echo "<td class='no'>" . number_format(round($h_hits, 1),1) . "</td>";
        echo "<td class='no'>" . number_format(round($h_errors, 1),1) . "</td>";

        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round(($h_winpct * 100), 1),1) . "</td>";
        echo "<td class='te1'>" . number_format(round(($h_rlpct * 100), 1),1) . "</td>";
        echo "<td class='co1'>" . number_format(round(($u_pct * 100), 1),1) . "</td>";

        echo "<td class='blank'></td>";
        if ($a_f5actscore < $h_f5actscore) { echo "<td class='top'><b>" . $h_f5actscore . "<b></td>"; }
        else { echo "<td class='no'><b>" . $h_f5actscore . "<b></td>"; }
        echo "<td class='no'>" . number_format(round(($h_f5winpct * 100), 1),1) . "</td>";
        echo "<td class='no'>" . number_format(round($h_f5runs, 1),1) . "</td>";

        echo "<td class='blank'></td>";
        echo "<td class='bl1'>" . number_format(round(($h_mlvalue * 100), 1),1) . "</td>";
        echo "<td class='te1'>" . number_format(round(($h_rlvalue * 100), 1),1) . "</td>";
        echo "<td class='co1'>" . number_format(round(($u_value * 100), 1),1) . "</td>";

        echo "<td class='blank'></td>";
        if ($ml_play == 'H') { echo "<td class='bl1'>●</td>"; }
        else { echo "<td class='bl1'></td>"; }

        if ($rl_play == 'H') { echo "<td class='te1'>●</td>"; }
        else { echo "<td class='te1'></td>"; }

        if ($tot_play == 'U') { echo "<td class='co1'>●</td>"; }
        else { echo "<td class='co1'></td>"; }

        echo "<td class='blank'></td>";

        if ($ml_play == "H") {
          if ($ml_res < 0) { echo "<td class='loss'>-1</td>"; }
          else if ($ml_res > 0) { echo "<td class='win'>" . number_format(round($ml_res, 2),2) . "</td>"; }
          else { echo "<td class='bl1'>" . number_format(round($ml_res, 2),2) . "</td>"; }
        }
        else { echo "<td class='bl1'></td>"; }

        if ($rl_play == "H") {
          if ($rl_res < 0) { echo "<td class='loss'>-1</td>"; }
          else if ($rl_res > 0) { echo "<td class='win'>" . number_format(round($rl_res, 2),2) . "</td>"; }
          else { echo "<td class='te1'>" . number_format(round($rl_res, 2),2) . "</td>"; }
        }
        else { echo "<td class='te1'></td>"; }

        if ($tot_play == "U") {
          if ($tot_res < 0) { echo "<td class='loss'>-1</td>"; }
          else if ($tot_res > 0) { echo "<td class='win'>" . number_format(round($tot_res, 2),2) . "</td>"; }
          else { echo "<td class='co1'>" . number_format(round($tot_res, 2),2) . "</td>"; }
        }
        else { echo "<td class='co1'></td>"; }

        echo "</tr>";
        echo "<tr></tr>";
        echo "<tr></tr>";
        echo "<tr></tr>";

      }
    }
  }
