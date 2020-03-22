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

.homebutton button {
	padding-left: 9px;
	padding-right: 8px;
	width:45px;
	padding-top:1px;
	padding-bottom: 5px;
	height: 36px;
	background: transparent;
	color: black;
	border: 1px solid black;
	border-radius: 3px;
	cursor: pointer;
	transition: all ease 2s;
	font-size: 120%;
	position: absolute;
	top: 50px;
	left:50px;
	font-size: 28px;
	
}

.homebutton button:hover {
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	background-color: Yellow;
}
</style>

	

<head>
	<meta charset="UTF-8" />
	<title>Wir gegen Corona - Deine Übersicht!</title> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<div class="homebutton">  
  <form method="get" action="/hackathon/index.php">
	<button type = "btn"><i class="fa fa-home"></i></button>
  </form>
</div>
	
</body>
</html>