<?php include 'credentials.php';?>

<!DOCTYPE html>
<html> 
<head>
	<meta charset="UTF-8" />
	<title>Wir gegen Corona - Deine Fragenübersicht!</title> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>

body {
	background-image: url('Pics/Hackathonlogo.png');
	background-repeat: no-repeat;
	background-size: cover;
}

#questiontable td, #questiontable th {

	padding: 20px;
	
}

#questiontable tr:hover {
	background-color: #ddd;
}

#questiontable {
	

	display: block;
	max-height: 425px;
	overflow-y: scroll;
	border-collapse: collapse;
	table-layout: fixed;
	width: 1200px;
	position:absolute;
	left: 5%;
	top: 22%
	
	
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
	top: -46px;
	left: -46px;
	font-size: 28px;
	
}

.homebutton button:hover {
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	background-color: Yellow;
}

#link {
	padding = 2px;
	border-color: black;
	border-width: 1px;
	border-style: solid;
	border-radius: 3px;
}

</style>

</head>
 
<body>
<?php
if (isset($_GET['frage'])){
	$search_param = $_GET['frage'];
	//echo "Frage isset";
	// Connect to database
	$mysqli = new mysqli($GLOBAL_HOST, $GLOBAL_USER, $GLOBAL_PW, $GLOBAL_DB_NAME);
	$mysqli->set_charset("utf8");
	/* check connection */
	if ($mysqli->connect_errno) {
		exit();
	}
}
?>

<h1>Alle beantworteten Fragen</h1>
 
 <table id="questiontable">
  <tr>
    <th>Frage</th>
    <th>Anzahl der Antworten</th>
	<!--<th>Durchschnittliche Bewertung</th>-->
	<th></th>
  </tr>

  <?php
 // Lies alle Fragen aus der DB aus

 // Connect to database
 $mysqli = new mysqli($GLOBAL_HOST, $GLOBAL_USER, $GLOBAL_PW, $GLOBAL_DB_NAME);

 /* check connection */
 if ($mysqli->connect_errno) {
	 exit();
 }
/* Select queries return a resultset */
$query = "SELECT fragen.ID as ID_Frage, Fragestellung, COUNT(fragen.ID) as Anzahl_Antwort FROM fragen JOIN antworten WHERE fragen.ID = antworten.Frage_ID GROUP BY fragen.ID;";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {

			$fragen_id = $row['ID_Frage'];
			$fragestellung = $row['Fragestellung'];
			$anzahl_antworten = $row['Anzahl_Antwort'];

			echo "<tr>";	
			echo "<td> $fragestellung </td>";
			echo "<td> $anzahl_antworten </td>";
			echo "<td onclick='window.location=\"/hackathon/answers.php?fragen_id=$fragen_id\"'> <b underline=true id=link>Beantworten<b> </td>";
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
