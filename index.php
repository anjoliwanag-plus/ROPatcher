<html>
<head>
<style>
body {
	font-family: Calibri;
	overflow: hidden;
	color: #fff;
	background: url(bg.png);
}
.left {
	float: left;
	width: 70%
}

.right {
	float: right;
	width: 30%
}
.nav {
	padding: 0px 0px 10px;
}

table {
  width: 100%;
}

a:link {
  text-decoration: none;
  color: #fff;
}

a:visited {
  text-decoration: none;
  color: #fff;
}


</style>
</head>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "!)@(EPTITIAISKSMCN";
$dbname = "ragnarok";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, gist, date FROM newschangelogs ORDER BY date DESC LIMIT 2";
$news = $conn->query($sql);

// --

$sql = "SELECT COUNT(char_id) AS players_online FROM `char` WHERE online > 0";
$currentOnline = $conn->query($sql);

$row = $currentOnline->fetch_assoc();
$playersOnline = $row['players_online'];

// --

$sql = "SELECT users FROM cp_onlinepeak ORDER BY users LIMIT 1";
$onlinePeak = $conn->query($sql);

$row = $onlinePeak->fetch_assoc();
$onlinePeak = $row['users'];

// --

$conn->close();
?>


<div class="nav">
<center>
<table>
<tr>
<?php
echo "<td>";
echo "Char "; if (@fsockopen("35.220.244.50", 6121)){echo "<font color = 'green'>●";fclose($connection);}else{echo "<font color = 'red'>●";} echo "</font> ";
echo "Login "; if (@fsockopen("35.220.244.50", 6900)){echo "<font color = 'green'>●";fclose($connection);}else{echo "<font color = 'red'>●";} echo "</font> ";
echo "Map "; if (@fsockopen("35.220.244.50", 5121)){echo "<font color = 'green'>●";fclose($connection);}else{echo "<font color = 'red'>●";} echo "</font>";
echo "</td>";
?>
<td align="right">Players Online: <?php echo $playersOnline; ?> | Peak Players: <?php echo $onlinePeak; ?></td>
</tr>
</table>
</center>
</div>

<hr>

<div class="left">
<h2>News and Changelogs</h2>
<?php
if ($news->num_rows > 0) {
echo "<ul style='list-style-type:none;'>";
	while($row = $news->fetch_assoc()) {
		echo "<li style='list-style-type:none;'><b>" . $row["title"] . "</b> - <font size='2'><i>" . $row["date"] . "</i></font></li>";
		echo "<ul>";
		echo "<li style='list-style-type:none;'>" . mb_strimwidth($row['gist'], 0, 200, "...");
		echo "<li style='list-style-type:none;'><span align='right'><a href ='https://www.google.com?id=".$row["id"]."' target='_blank'><u><font color ='sky blue'>Read more</font></u></a></span></ul><br>";
	}
echo "</ul>";
echo "</ul>";
} else {
  echo "0 results";
}

?>

</div>

<div class="right">

<ul>
<li style="list-style-type:none;">External Links:</li>
<ul>
<li style="list-style-type:none;"><a href ="https://www.google.com" target="_blank">Main Website   </a>
<li style="list-style-type:none;"><a href ="https://www.google.com" target="_blank">Register       </a>
<li style="list-style-type:none;"><a href ="https://www.google.com" target="_blank">Facebook Page  </a>
<li style="list-style-type:none;"><a href ="https://www.google.com" target="_blank">Facebook Group </a>
<li style="list-style-type:none;"><a href ="https://www.google.com" target="_blank">Discord        </a>
</ul>
</ul>
</div>

</body>
</html>