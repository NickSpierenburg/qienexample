<html>
<body>

<p id="state_1">Hoi</p>
<p id="state_2">Hoi</p>
<p id="state_3">Hoi</p>
<p id="state_4">Hoi</p>

</body>
</html>

<?php

session_start();

require_once('../credentials.php');
$conn = createconnect($host,$dbusername,$dbpassword,$db_name);

$players = [];

$result = $conn->query('SELECT * FROM games WHERE game_id = 1');
while($row = $result->fetch_assoc()) {
	$players[1] = $row['p1_id'];
	$players[2] = $row['p2_id'];
	$players[3] = $row['p3_id'];
	$players[4] = $row['p4_id'];
}

foreach($players as $playerid => $userid) {
	if($userid == 0) {
		// echo '<input type="button" value="Join '.$playerid.'">';
		$stateid = 'state_' . $playerid;
		echo '
			<script>
				document.getElementById("'.$stateid.'").innerHTML = "<input type=button value='.$playerid.'>"
			</script>
		';
	}
	
}

?>