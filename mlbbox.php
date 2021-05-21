#MLB Box is a PHP File that displays the projected box score for baseball games.

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
$link = mysqli_connect("localhost", "root", "", "csv_db 13");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_GET['year'])) {
  $tbl_year = $_GET["year"];
  $tbl_month = $_GET["month"];
  $tbl_day = $_GET["day"];
  $tbl_gameno = $_GET["gameno"];
  $tbl_ateam = $_GET["ateam"];
  $tbl_hteam = $_GET["hteam"];
}
else {
  $tbl_year = 2021;
  $tbl_month = 4;
  $tbl_day = 9;
  $tbl_gameno = 1;
  $tbl_ateam = 'NYY';
  $tbl_hteam = 'TB';
}

echo "<br>";

//Line Score

echo "<h1><center>" . $tbl_ateam . " vs. " . $tbl_hteam . " Projected Box Score</center></h1>";
echo "<br>";
echo "<table id='cbb'>";
echo "<tr>";
echo "<th>Team</th>";
echo "<th>1</th>";
echo "<th>2</th>";
echo "<th>3</th>";
echo "<th>4</th>";
echo "<th>5</th>";
echo "<th>6</th>";
echo "<th>7</th>";
echo "<th>8</th>";
echo "<th>9</th>";
echo "<th>X</th>";
echo "<th>R</th>";
echo "<th>H</th>";
echo "<th>E</th>";
echo "<th>Win %</th>";
echo "</tr>";
$sql = "SELECT * FROM webrhe WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Team ='". $tbl_ateam. "' AND GameNo = $tbl_gameno";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

      $i1 = $row['I1'];
      $i2 = $row['I2'];
      $i3 = $row['I3'];
      $i4 = $row['I4'];
      $i5 = $row['I5'];
      $i6 = $row['I6'];
      $i7 = $row['I7'];
      $i8 = $row['I8'];
      $i9 = $row['I9'];
      $ix = $row['I10'];
      $_ar = $row['R'];
      $_h = $row['H'];
      $_e = $row['E'];
      $_w = $row['W'];

      echo "<tr class='even'>";
      echo "<td class='bl1'><b>" . $tbl_ateam . "</b></td>";
      echo "<td class='no'>" . number_format(round($i1, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i2, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i3, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i4, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i5, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i6, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i7, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i8, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i9, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($ix, 2),2) . "</td>";
      echo "<td class='te1'><b>" . number_format(round($_ar, 2),2) . "</b></td>";
      echo "<td class='te1'><b>" . number_format(round($_h, 2),2) . "</b></td>";
      echo "<td class='te1'><b>" . number_format(round($_e, 2),2) . "</b></td>";
      echo "<td class='at1'><b>" . number_format(round($_w * 100, 1),1) . "</b></td>";
      echo "</tr>";
    }
  }
}

$sql = "SELECT * FROM webrhe WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Team ='". $tbl_hteam. "' AND GameNo = $tbl_gameno";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

      $i1 = $row['I1'];
      $i2 = $row['I2'];
      $i3 = $row['I3'];
      $i4 = $row['I4'];
      $i5 = $row['I5'];
      $i6 = $row['I6'];
      $i7 = $row['I7'];
      $i8 = $row['I8'];
      $i9 = $row['I9'];
      $ix = $row['I10'];
      $_rh = $row['R'];
      $_h = $row['H'];
      $_e = $row['E'];
      $_w = $row['W'];

      echo "<tr class='odd'>";
      echo "<td class='bl1'><b>" . $tbl_hteam . "</b></td>";
      echo "<td class='no'>" . number_format(round($i1, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i2, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i3, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i4, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i5, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i6, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i7, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i8, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($i9, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($ix, 2),2) . "</td>";
      echo "<td class='te1'><b>" . number_format(round($_rh, 2),2) . "</b></td>";
      echo "<td class='te1'><b>" . number_format(round($_h, 2),2) . "</b></td>";
      echo "<td class='te1'><b>" . number_format(round($_e, 2),2) . "</b></td>";
      echo "<td class='at1'><b>" . number_format(round($_w * 100, 1),1) . "</b></td>";
      echo "</tr>";
    }
  }
}

//Away Box

echo "</table>";
echo "<h1><center>" . $tbl_ateam . " Batters</center></h1>";
echo "<br>";
echo "<table id='cbb'>";
echo "<tr>";
echo "<th>Batter</th>";
echo "<th>PA</th>";
echo "<th>R</th>";
echo "<th>H</th>";
echo "<th>RBI</th>";
echo "<th>K</th>";
echo "<th>BB</th>";
echo "<th>1B</th>";
echo "<th>2B</th>";
echo "<th>3B</th>";
echo "<th>HR</th>";
echo "<th>SACB</th>";
echo "<th>SACF</th>";
echo "<th class='blank'></th>";
echo "<th>AVG</th>";
echo "<th>OBP</th>";
echo "<th>SLG</th>";
echo "<th>OPS</th>";
echo "<th>DFS</th>";
echo "</tr>";

$_tpa = 0;
$_trun = 0;
$_thit = 0;
$_trbi = 0;
$_tk = 0;
$_tbb = 0;
$_t1b = 0;
$_t2b = 0;
$_t3b = 0;
$_thr = 0;
$_tsf = 0;
$_tsb = 0;
$_tdfs = 0;

$sql = "SELECT * FROM webbox WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Team ='". $tbl_ateam. "' AND GameNo = $tbl_gameno";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

      $_bid = $row['batter'];
      $_player = $row['player_name'];
      $_pa = $row['PA'];
      $_run = $row['R'];
      $_hit = $row['H'];
      $_rbi = $row['RBI'];
      $_k = $row['K'];
      $_bb = $row['BB'];
      $_1b = $row['1B'];
      $_2b = $row['2B'];
      $_3b = $row['3B'];
      $_hr = $row['HR'];
      $_sacb = $row['SACB'];
      $_sacf = $row['SF'];
      $_dfs = $row['DFS'];

      $_tpa = $_tpa + $_pa;
      $_trun = $_trun + $_run;
      $_thit = $_thit + $_hit;
      $_trbi = $_trbi + $_rbi;
      $_tk = $_tk + $_k;
      $_tbb = $_tbb + $_bb;
      $_t1b = $_t1b + $_1b;
      $_t2b = $_t2b + $_2b;
      $_t3b = $_t3b + $_3b;
      $_thr = $_thr + $_hr;
      $_tsb = $_tsb + $_sacb;
      $_tsf = $_tsf + $_sacf;
      $_tdfs = $_tdfs + $_dfs;


      $_avg = $_hit / ($_pa - $_bb - $_sacb - $_sacf);
      $_obp = ($_hit + $_bb) / ($_pa);
      $_slg = ($_1b + ($_2b * 2) + ($_3b * 3) + ($_hr * 4)) / ($_pa - $_bb - $_sacb - $_sacf);
      $_ops = $_obp + $_slg;

      echo "<tr class='odd'>";
      echo "<td><b>" . $_player . "</b></td>";
      echo "<td class='no'>" . number_format(round($_pa, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_run, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_hit, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_rbi, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_k, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_bb, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_1b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_2b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_3b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_hr, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_sacb, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_sacf, 2),2) . "</td>";
      echo "<td class='blank'></td>";
      echo "<td class='no'>" . number_format(round($_avg, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_obp, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_slg, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_ops, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_dfs, 2),2) . "</td>";

      echo "</tr>";
    }
  }
}

if ($_trbi > $_trun) { $_trbi = $_trun - 0.01; }
$_tavg = $_thit / ($_tpa - $_tbb - $_tsb - $_tsf);
$_tobp = ($_thit + $_tbb) / ($_tpa);
$_tslg = ($_t1b + ($_t2b * 2) + ($_t3b * 3) + ($_thr * 4)) / ($_tpa - $_tbb - $_tsb - $_tsf);
$_tops = $_tobp + $_tslg;

echo "<tr class='odd'>";
echo "<td class='bl1'><b>Cume</b></td>";
echo "<td class='bl1'><b>" . number_format(round($_tpa, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_ar, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_thit, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_trbi, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tk, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tbb, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t1b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t2b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t3b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_thr, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tsb, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tsf, 2),2) . "</td>";
echo "<td class='blank'></td>";
echo "<td class='te1'><b>" . number_format(round($_tavg, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tobp, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tslg, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tops, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tdfs / 9, 2),2) . "</b></td>";
echo "</tr>";

//Home Box

echo "</table>";


echo "<h1><center>" . $tbl_hteam . " Batters</center></h1>";
echo "<br>";
echo "<table id='cbb'>";
echo "<tr>";
echo "<th>Batter</th>";
echo "<th>PA</th>";
echo "<th>R</th>";
echo "<th>H</th>";
echo "<th>RBI</th>";
echo "<th>K</th>";
echo "<th>BB</th>";
echo "<th>1B</th>";
echo "<th>2B</th>";
echo "<th>3B</th>";
echo "<th>HR</th>";
echo "<th>SACB</th>";
echo "<th>SACF</th>";
echo "<th class='blank'></th>";
echo "<th>AVG</th>";
echo "<th>OBP</th>";
echo "<th>SLG</th>";
echo "<th>OPS</th>";
echo "<th>DFS</th>";
echo "</tr>";

$_tpa = 0;
$_trun = 0;
$_thit = 0;
$_trbi = 0;
$_tk = 0;
$_tbb = 0;
$_t1b = 0;
$_t2b = 0;
$_t3b = 0;
$_thr = 0;
$_tsf = 0;
$_tsb = 0;
$_tdfs = 0;

$sql = "SELECT * FROM webbox WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Team ='". $tbl_hteam. "' AND GameNo = $tbl_gameno";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

      $_bid = $row['batter'];
      $_player = $row['player_name'];
      $_pa = $row['PA'];
      $_run = $row['R'];
      $_hit = $row['H'];
      $_rbi = $row['RBI'];
      $_k = $row['K'];
      $_bb = $row['BB'];
      $_1b = $row['1B'];
      $_2b = $row['2B'];
      $_3b = $row['3B'];
      $_hr = $row['HR'];
      $_sacb = $row['SACB'];
      $_sacf = $row['SF'];
      $_dfs = $row['DFS'];

      $_tpa = $_tpa + $_pa;
      $_trun = $_trun + $_run;
      $_thit = $_thit + $_hit;
      $_trbi = $_trbi + $_rbi;
      $_tk = $_tk + $_k;
      $_tbb = $_tbb + $_bb;
      $_t1b = $_t1b + $_1b;
      $_t2b = $_t2b + $_2b;
      $_t3b = $_t3b + $_3b;
      $_thr = $_thr + $_hr;
      $_tsb = $_tsb + $_sacb;
      $_tsf = $_tsf + $_sacf;
      $_tdfs = $_tdfs + $_dfs;

      $_avg = $_hit / ($_pa - $_bb - $_sacb - $_sacf);
      $_obp = ($_hit + $_bb) / ($_pa);
      $_slg = ($_1b + ($_2b * 2) + ($_3b * 3) + ($_hr * 4)) / ($_pa - $_bb - $_sacb - $_sacf);
      $_ops = $_obp + $_slg;

      echo "<tr class='odd'>";
      echo "<td><b>" . $_player . "</b></td>";
      echo "<td class='no'>" . number_format(round($_pa, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_run, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_hit, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_rbi, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_k, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_bb, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_1b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_2b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_3b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_hr, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_sacb, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_sacf, 2),2) . "</td>";
      echo "<td class='blank'></td>";
      echo "<td class='no'>" . number_format(round($_avg, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_obp, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_slg, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_ops, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_dfs, 2),2) . "</td>";

      echo "</tr>";
    }
  }
}

if ($_trbi > $_trun) { $_trbi = $_trun - 0.01; }
$_tavg = $_thit / ($_tpa - $_tbb - $_tsb - $_tsf);
$_tobp = ($_thit + $_tbb) / ($_tpa);
$_tslg = ($_t1b + ($_t2b * 2) + ($_t3b * 3) + ($_thr * 4)) / ($_tpa - $_tbb - $_tsb - $_tsf);
$_tops = $_tobp + $_tslg;

echo "<tr class='odd'>";
echo "<td class='bl1'><b>Cume</b></td>";
echo "<td class='bl1'><b>" . number_format(round($_tpa, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_rh, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_thit, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_trbi, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tk, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tbb, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t1b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t2b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t3b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_thr, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tsb, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tsf, 2),2) . "</td>";
echo "<td class='blank'></td>";
echo "<td class='te1'><b>" . number_format(round($_tavg, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tobp, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tslg, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tops, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tdfs / 9, 2),2) . "</b></td>";
echo "</tr>";

//Away Pox

echo "</table>";
echo "<h1><center>" . $tbl_ateam . " Pitchers</center></h1>";
echo "<br>";
echo "<table id='cbb'>";
echo "<tr>";
echo "<th>Pitcher</th>";
echo "<th>IP</th>";
echo "<th>R</th>";
echo "<th>H</th>";
echo "<th>BB</th>";
echo "<th>K</th>";
echo "<th>1B</th>";
echo "<th>2B</th>";
echo "<th>3B</th>";
echo "<th>HR</th>";
echo "<th>BF</th>";
echo "<th>NP</th>";
echo "<th>Win</th>";
echo "<td class='blank'></td>";
echo "<th>AVG</th>";
echo "<th>OBP</th>";
echo "<th>SLG</th>";
echo "<th>OPS</th>";
echo "<th>DFS</th>";

echo "</tr>";

$_tpa = 0;
$_trun = 0;
$_thit = 0;
$_tk = 0;
$_tbb = 0;
$_t1b = 0;
$_t2b = 0;
$_t3b = 0;
$_thr = 0;
$_tip = 0;
$_tbf = 0;
$_tnp = 0;
$_twin = 0;
$_tdfs = 0;

$sql = "SELECT * FROM webpox WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Team ='". $tbl_ateam. "' AND GameNo = $tbl_gameno";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

      $_pid = $row['pitcher'];
      $_player = $row['player_name'];
      $_pa = $row['BF'];
      $_run = $row['R'];
      $_hit = $row['H'];
      $_np = $row['NP'];
      $_k = $row['K'];
      $_bb = $row['BB'];
      $_1b = $row['1B'];
      $_2b = $row['2B'];
      $_3b = $row['3B'];
      $_hr = $row['HR'];
      $_win = $row['W'];
      $_ip = $row['IP'];
      $_dfs = $row['DFS'];

      $_tpa = $_tpa + $_pa;
      $_trun = $_trun + $_run;
      $_thit = $_thit + $_hit;
      $_tnp = $_tnp + $_np;
      $_tk = $_tk + $_k;
      $_tbb = $_tbb + $_bb;
      $_t1b = $_t1b + $_1b;
      $_t2b = $_t2b + $_2b;
      $_t3b = $_t3b + $_3b;
      $_thr = $_thr + $_hr;
      $_twin = $_twin + $_win;
      $_tip = $_tip + $_ip;
      $_tdfs = $_tdfs + $_dfs;

      $_avg = $_hit / ($_pa - $_bb - $_sacb - $_sacf);
      $_obp = ($_hit + $_bb) / ($_pa);
      $_slg = ($_1b + ($_2b * 2) + ($_3b * 3) + ($_hr * 4)) / ($_pa - $_bb - $_sacb - $_sacf);
      $_ops = $_obp + $_slg;

      echo "<tr class='odd'>";
      echo "<td><b>" . $_player . "</b></td>";
      echo "<td class='no'>" . number_format(round($_ip, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_run, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_hit, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_bb, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_k, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_1b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_2b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_3b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_hr, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_pa, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_np, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_win, 2),2) . "</td>";
      echo "<td class='blank'></td>";
      echo "<td class='no'>" . number_format(round($_avg, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_obp, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_slg, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_ops, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_dfs, 2),2) . "</td>";

      echo "</tr>";
    }
  }
}

$_tavg = $_thit / ($_tpa - $_tbb - $_tsb - $_tsf);
$_tobp = ($_thit + $_tbb) / ($_tpa);
$_tslg = ($_t1b + ($_t2b * 2) + ($_t3b * 3) + ($_thr * 4)) / ($_tpa - $_tbb - $_tsb - $_tsf);
$_tops = $_tobp + $_tslg;

echo "<tr class='odd'>";
echo "<td class='bl1'><b>Cume</b></td>";
echo "<td class='bl1'><b>" . number_format(round($_tip, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_ar, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_thit, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tbb, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tk, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t1b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t2b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t3b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_thr, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tpa, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tnp, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_twin, 3),3) . "</td>";
echo "<td class='blank'></td>";
echo "<td class='te1'><b>" . number_format(round($_tavg, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tobp, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tslg, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tops, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tdfs / 9, 2),2) . "</b></td>";
echo "</tr>";

//Home Pox

echo "</table>";
echo "<h1><center>" . $tbl_hteam . " Pitchers</center></h1>";
echo "<br>";
echo "<table id='cbb'>";
echo "<tr>";
echo "<th>Pitcher</th>";
echo "<th>IP</th>";
echo "<th>R</th>";
echo "<th>H</th>";
echo "<th>BB</th>";
echo "<th>K</th>";
echo "<th>1B</th>";
echo "<th>2B</th>";
echo "<th>3B</th>";
echo "<th>HR</th>";
echo "<th>BF</th>";
echo "<th>NP</th>";
echo "<th>Win</th>";
echo "<td class='blank'></td>";
echo "<th>AVG</th>";
echo "<th>OBP</th>";
echo "<th>SLG</th>";
echo "<th>OPS</th>";
echo "<th>DFS</th>";

echo "</tr>";

$_tpa = 0;
$_trun = 0;
$_thit = 0;
$_tk = 0;
$_tbb = 0;
$_t1b = 0;
$_t2b = 0;
$_t3b = 0;
$_thr = 0;
$_tip = 0;
$_tbf = 0;
$_tnp = 0;
$_twin = 0;
$_tdfs = 0;

$sql = "SELECT * FROM webpox WHERE Year = $tbl_year AND Month = $tbl_month AND Day = $tbl_day AND Team ='". $tbl_hteam. "' AND GameNo = $tbl_gameno";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){

      $_pid = $row['pitcher'];
      $_player = $row['player_name'];
      $_pa = $row['BF'];
      $_run = $row['R'];
      $_hit = $row['H'];
      $_np = $row['NP'];
      $_k = $row['K'];
      $_bb = $row['BB'];
      $_1b = $row['1B'];
      $_2b = $row['2B'];
      $_3b = $row['3B'];
      $_hr = $row['HR'];
      $_win = $row['W'];
      $_ip = $row['IP'];
      $_dfs = $row['DFS'];

      $_tpa = $_tpa + $_pa;
      $_trun = $_trun + $_run;
      $_thit = $_thit + $_hit;
      $_tnp = $_tnp + $_np;
      $_tk = $_tk + $_k;
      $_tbb = $_tbb + $_bb;
      $_t1b = $_t1b + $_1b;
      $_t2b = $_t2b + $_2b;
      $_t3b = $_t3b + $_3b;
      $_thr = $_thr + $_hr;
      $_twin = $_twin + $_win;
      $_tip = $_tip + $_ip;
      $_tdfs = $_tdfs + $_dfs;

      $_avg = $_hit / ($_pa - $_bb - $_sacb - $_sacf);
      $_obp = ($_hit + $_bb) / ($_pa);
      $_slg = ($_1b + ($_2b * 2) + ($_3b * 3) + ($_hr * 4)) / ($_pa - $_bb - $_sacb - $_sacf);
      $_ops = $_obp + $_slg;

      echo "<tr class='odd'>";
      echo "<td><b>" . $_player . "</b></td>";
      echo "<td class='no'>" . number_format(round($_ip, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_run, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_hit, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_bb, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_k, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_1b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_2b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_3b, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_hr, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_pa, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_np, 2),2) . "</td>";
      echo "<td class='no'>" . number_format(round($_win, 2),2) . "</td>";
      echo "<td class='blank'></td>";
      echo "<td class='no'>" . number_format(round($_avg, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_obp, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_slg, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_ops, 3),3) . "</td>";
      echo "<td class='no'>" . number_format(round($_dfs, 2),2) . "</td>";

      echo "</tr>";
    }
  }
}

$_tavg = $_thit / ($_tpa - $_tbb - $_tsb - $_tsf);
$_tobp = ($_thit + $_tbb) / ($_tpa);
$_tslg = ($_t1b + ($_t2b * 2) + ($_t3b * 3) + ($_thr * 4)) / ($_tpa - $_tbb - $_tsb - $_tsf);
$_tops = $_tobp + $_tslg;

echo "<tr class='odd'>";
echo "<td class='bl1'><b>Cume</b></td>";
echo "<td class='bl1'><b>" . number_format(round($_tip, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_rh, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_thit, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tbb, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tk, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t1b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t2b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_t3b, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_thr, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tpa, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_tnp, 2),2) . "</td>";
echo "<td class='bl1'><b>" . number_format(round($_twin, 3),3) . "</td>";
echo "<td class='blank'></td>";
echo "<td class='te1'><b>" . number_format(round($_tavg, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tobp, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tslg, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tops, 3),3) . "</td>";
echo "<td class='te1'><b>" . number_format(round($_tdfs / 9, 2),2) . "</b></td>";
echo "</tr>";
