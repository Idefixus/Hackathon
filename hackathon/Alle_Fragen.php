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
	position: block;
}
#questiontable tbody{
	display: block;
	height: 350px;
	overflow-y: scroll;
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

<h1>Alle verfügbaren Fragen</h1>
 
 <table id="questiontable">
  <tr>
    <th>Frage</th>
    <th>Anzahl der Antworten</th>
	<th>Durchschnittliche Bewertung</th>
	<th></th>
  </tr>
 <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  <tr>
	<td> Hilft Schweiger Bier gegen Corona? </td>
	<td> 5 </td>
	<td> sehr gut </td>
	<td> antworte hier </td>
  </tr>
  
</table>
<p1> 
Hast du keine passende Frage gefunden? Stelle deine eigene!
</p1>
<form method="get" action="/hackathon/erstellen.php">
	<button type = "submit" id="search">Stelle deine eigene Frage</button>
</form>
	
</body>
</html>