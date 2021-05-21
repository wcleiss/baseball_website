#MLBPlayers is a PHP page that ranks each batter and pitcher based on their adjusted "WOBA" rating.

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

<h1><center>Sports Betting Truth Major League Baseball Player Ratings</center></h1>

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
$link = mysqli_connect("localhost", "wcleiss", "Horacebroadnax", "Travis");

echo "<br>";
echo "<h1><center>MLB Player Power Ratings</center></h1>";

echo "<div id='mear'>";
echo "<table id='mlb'>";

echo "<tr>";
echo "<th colspan='5' class='bat'>Batters</th>";
echo "</tr>";

echo "<tr>";
echo "<th class='bat2'>Rank</th>";
echo "<th class='bat2'>PA</th>";
echo "<th colspan='2' class='bat2'>Batter</th>";
echo "<th class='bat2'>SBTPV</th>";
echo "</tr>";

$sql = "SELECT * FROM woba WHERE Split = 'B' ORDER BY woba DESC";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      $row_count = 0;
      while($row = mysqli_fetch_array($result)){
        echo "<tr class='odd'>";
        $row_count = $row_count + 1;

        $_team = $row['team'];
        $_pa = $row['pa'];
        $_pid = $row['player_id'];
        $_name = $row['name'];
        $_woba = $row['woba'];
        $_tcol = color_team($_team);

        echo "<td class='no'><b>" . $row_count . "</b></td>";
        echo "<td class='no'>" . number_format(round($_pa, 0),0) . "</td>";
        echo "<td class=" . $_tcol . "><b>" . $_team . "</b></td>";
        echo "<td>" . $_name . "</td>";
        echo "<td class='no'><b>" . number_format(round($_woba, 4),4) . "</b></td>";
        echo "</tr>";

    }
  }
}

echo "</table>";

echo "<table id='mlb'>";

echo "<tr>";
echo "<th colspan='5' class='pit'>Pitchers</th>";
echo "</tr>";

echo "<tr>";
echo "<th class='pit2'>Rank</th>";
echo "<th class='pit2'>PA</th>";
echo "<th colspan='2' class='pit2'>Pitcher</th>";
echo "<th class='pit2'>SBTPV</th>";
echo "</tr>";

$sql = "SELECT * FROM woba WHERE Split = 'P' ORDER BY woba";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      $row_count = 0;
      while($row = mysqli_fetch_array($result)){
        echo "<tr class='odd'>";
        $row_count = $row_count + 1;

        $_team = $row['team'];
        $_pa = $row['pa'];
        $_pid = $row['player_id'];
        $_name = $row['name'];
        $_woba = $row['woba'];
        $_tcol = color_team($_team);

        echo "<td class='no'><b>" . $row_count . "</b></td>";
        echo "<td class='no'>" . number_format(round($_pa, 0),0) . "</td>";
        echo "<td class=" . $_tcol . "><b>" . $_team . "</b></td>";
        echo "<td>" . $_name . "</td>";
        echo "<td class='no'><b>" . number_format(round($_woba, 4),4) . "</b></td>";
        echo "</tr>";

    }
  }
}

echo "</table>";



function color_team($_value)
{
  if ($_value == 'SEA') {
    return 'sea';
  }
  else if ($_value == 'BAL') {
    return 'bal';
  }
  else if ($_value == 'BOS') {
    return 'bos';
  }
  else if ($_value == 'NYY') {
    return 'nyy';
  }
  else if ($_value == 'TB') {
    return 'tb';
  }
  else if ($_value == 'TOR') {
    return 'tor';
  }
  else if ($_value == 'CLE') {
    return 'cle';
  }
  else if ($_value == 'CWS') {
    return 'cws';
  }
  else if ($_value == 'DET') {
    return 'det';
  }
  else if ($_value == 'KC') {
    return 'kc';
  }
  else if ($_value == 'MIN') {
    return 'min';
  }
  else if ($_value == 'HOU') {
    return 'hou';
  }
  else if ($_value == 'LAA') {
    return 'laa';
  }
  else if ($_value == 'OAK') {
    return 'oak';
  }
  else if ($_value == 'TEX') {
    return 'tex';
  }
  else if ($_value == 'ARI') {
    return 'ari';
  }
  else if ($_value == 'COL') {
    return 'col';
  }
  else if ($_value == 'LAD') {
    return 'lad';
  }
  else if ($_value == 'SD') {
    return 'sd';
  }
  else if ($_value == 'SF') {
    return 'sf';
  }
  else if ($_value == 'CHC') {
    return 'chc';
  }
  else if ($_value == 'CIN') {
    return 'cin';
  }
  else if ($_value == 'MIL') {
    return 'mil';
  }
  else if ($_value == 'PIT') {
    return 'pit';
  }
  else if ($_value == 'STL') {
    return 'stl';
  }
  else if ($_value == 'ATL') {
    return 'atl';
  }
  else if ($_value == 'MIA') {
    return 'mia';
  }
  else if ($_value == 'PHI') {
    return 'phi';
  }
  else if ($_value == 'NYM') {
    return 'nym';
  }
  else if ($_value == 'WSH') {
    return 'wsh';
  }
  else {
    return 'no';
  }
}
