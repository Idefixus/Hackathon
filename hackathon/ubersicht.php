<!DOCTYPE html>
<html> 
<style>

body {
	background-image: url('Hackathonlogo.png');
	background-repeat: no-repeat;
	background-size: cover;
}

#questiontable td, #questiontable th {

	padding: 20px;
	border-bottom: 1px solid black;
}

#questiontable tr:hover {
	background-color: #ddd;
}

#questiontable th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
}
#questiontable {
	table-layout:auto;
	border-collapse: collapse;
	width: 80%;
	position: absolute;
	top: 22%;
	
}
	
h1 {
	position: absolute;
	top: 13%;
	left: 25%;
}

button {
	position: absolute;
	top: 70%;
	left: 20%;
	margin: 2em;
	padding: .5em 1em;
	width: 20em;
	background: transparent;
	color: black;
	border: 1px solid black;
	border-radius: 3px;
	cursor: pointer;
	transition: all ease 2s;
	font-size: 120%;
}

button:hover {
	background: darkblue;
	color: white;
}

p1 {
	position:absolute;
	top: 70%;
	left: 20%;
	font-size: 120%;
}

</style>

	

<head>
	<meta charset="UTF-8" />
	<title>Eure erster PHP-Script</title> 
</head>
 
<body>
<?php
if (isset($_GET['frage'])){
	$search_param = $_GET['frage'];
	//echo "Frage isset";
	// Connect to database
	$mysqli = new mysqli("localhost", "root", "", "wissensdatenbank2");

	/* check connection */
	if ($mysqli->connect_errno) {
		//printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
}
?>

<h1>Fragen zu deinen Stichwörtern</h1>
 
 <table id="questiontable">
  <tr>
    <th>ID</th>
    <th>Frage</th>
	<th>Reagenzglass</th>
  </tr>
	<?php //Table for all the results

	/* Select queries return a resultset */
	$query = "SELECT * FROM fragen JOIN `mapping key:frage` JOIN keywords WHERE Fragestellung LIKE '%$search_param%' AND keyword = '$search_param' AND ID_Frage = fragen.ID;";
	if ($result = $mysqli->query($query)) {
		//printf("Select returned %d rows.\n", $result->num_rows);
		//$row = $result->fetch_array(MYSQLI_ASSOC);
		while ($row = $result->fetch_assoc()) {
			//printf ("%s (%s)\n", $row["ID"], $row["Fragestellung"]);
			//print_r($row['Fragestellung']);
			$id = $row['ID_Frage'];
			$id2 = $row['Fragestellung'];
				//echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$id2</td>";
				echo "</tr>";
		}
		$result->close();
	}
	$mysqli->close();	

		?>
</table>
<p1> 
Hast du keine passende Frage gefunden? Stelle deine eigene!
</p1>
<form method="get" action="/hackathon/erstellen.php">
	<button type = "submit" id="search">Stelle deine eigene Frage</button>
</form>
	
</body>
</html>